import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';
import { stripUploadFields } from '../lib/validations';

export type About = Database['public']['Tables']['abouts']['Row'];
export type AboutInsert = Database['public']['Tables']['abouts']['Insert'];
export type AboutUpdate = Database['public']['Tables']['abouts']['Update'];

export function useAbout() {
  const [abouts, setAbouts] = useState<About[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchAbouts = useCallback(async () => {
    setLoading(true);
    const { data, error: err } = await supabase
      .from('abouts')
      .select('*')
      .order('created_at', { ascending: false });
    if (err) setError(err.message);
    else setAbouts(data ?? []);
    setLoading(false);
  }, []);

  useEffect(() => {
    fetchAbouts();
  }, [fetchAbouts]);

  const createAbout = useCallback(
    async (payload: AboutInsert & { photoFile?: File }) => {
      const { photoFile, ...dbPayload } = stripUploadFields(payload);

      let photoPath = dbPayload.photo as string | undefined;
      if (photoFile) {
        const fileName = `${Date.now()}-${photoFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`abouts/${fileName}`, photoFile);
        if (uploadErr) return { error: uploadErr.message };
        photoPath = `abouts/${fileName}`;
      }

      const { data, error } = await supabase
        .from('abouts')
        .insert({ ...dbPayload, photo: photoPath })
        .select()
        .single();
      if (!error) await fetchAbouts();
      return { data, error };
    },
    [fetchAbouts],
  );

  const updateAbout = useCallback(
    async (
      id: string,
      payload: AboutUpdate & { photoFile?: File; removeImage?: boolean },
    ) => {
      const { photoFile, removeImage, ...dbPayload } = stripUploadFields(payload);

      let photoPath = dbPayload.photo as string | undefined;
      if (removeImage && dbPayload.photo) {
        await supabase.storage.from('public').remove([dbPayload.photo]);
        photoPath = undefined;
      }
      if (photoFile) {
        if (dbPayload.photo) {
          await supabase.storage.from('public').remove([dbPayload.photo]);
        }
        const fileName = `${Date.now()}-${photoFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`abouts/${fileName}`, photoFile);
        if (uploadErr) return { error: uploadErr.message };
        photoPath = `abouts/${fileName}`;
      }

      const { data, error } = await supabase
        .from('abouts')
        .update({ ...dbPayload, photo: photoPath })
        .eq('id', id)
        .select()
        .single();
      if (!error) await fetchAbouts();
      return { data, error };
    },
    [fetchAbouts],
  );

  const deleteAbout = useCallback(
    async (id: string, photo?: string) => {
      if (photo) {
        await supabase.storage.from('public').remove([photo]);
      }
      const { error } = await supabase.from('abouts').delete().eq('id', id);
      if (!error) await fetchAbouts();
      return { error };
    },
    [fetchAbouts],
  );

  return { abouts, loading, error, refetch: fetchAbouts, createAbout, updateAbout, deleteAbout };
}
