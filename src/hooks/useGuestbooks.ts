
import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';

export type Guestbook = Database['public']['Tables']['guestbooks']['Row'];
export type GuestbookInsert = Database['public']['Tables']['guestbooks']['Insert'];

export function useGuestbooks() {
  const [guestbooks, setGuestbooks] = useState<Guestbook[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  // Mengambil semua pesan yang boleh diakses oleh pengguna
  const fetchGuestbooks = useCallback(async () => {
    setLoading(true);
    setError(null);

    const { data, error: err } = await supabase
      .from('guestbooks')
      .select('*')
      .order('created_at', { ascending: false });

    if (err) {
      setError(err.message);
    } else {
      setGuestbooks(data ?? []);
    }

    setLoading(false);
  }, []);

  useEffect(() => {
    fetchGuestbooks();
  }, [fetchGuestbooks]);

  // Mengambil pesan yang sudah disetujui untuk halaman publik
  const fetchApprovedGuestbooks = useCallback(async () => {
    setLoading(true);
    setError(null);

    const { data, error: err } = await supabase
      .from('guestbooks')
      .select('*')
      .eq('is_approved', true)
      .order('created_at', { ascending: false });

    if (err) {
      setError(err.message);
    } else {
      setGuestbooks(data ?? []);
    }

    setLoading(false);
  }, []);

  // Pengunjung mengirim pesan baru
  // Pesan selalu dibuat dengan status belum disetujui
  const createGuestbook = useCallback(
    async (payload: GuestbookInsert) => {
      const { error } = await supabase
        .from('guestbooks')
        .insert({
          name: payload.name,
          email: payload.email ?? null,
          message: payload.message,
          is_approved: false,
        });

      if (!error) {
        await fetchApprovedGuestbooks();
      }

      return { error };
    },
    [fetchApprovedGuestbooks],
  );

  // Admin menyetujui pesan
  const approveGuestbook = useCallback(
    async (id: string) => {
      const { error } = await supabase
        .from('guestbooks')
        .update({ is_approved: true })
        .eq('id', id);

      if (!error) {
        await fetchGuestbooks();
      }

      return { error };
    },
    [fetchGuestbooks],
  );

  // Admin menghapus pesan
  const deleteGuestbook = useCallback(
    async (id: string) => {
      const { error } = await supabase
        .from('guestbooks')
        .delete()
        .eq('id', id);

      if (!error) {
        await fetchGuestbooks();
      }

      return { error };
    },
    [fetchGuestbooks],
  );

  return {
    guestbooks,
    loading,
    error,
    refetch: fetchGuestbooks,
    fetchApprovedGuestbooks,
    createGuestbook,
    approveGuestbook,
    deleteGuestbook,
  };
}