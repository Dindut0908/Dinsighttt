import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';

export type Education = Database['public']['Tables']['education']['Row'];
export type EducationInsert = Database['public']['Tables']['education']['Insert'];
export type EducationUpdate = Database['public']['Tables']['education']['Update'];

export function useEducation() {
  const [education, setEducation] = useState<Education[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchEducation = useCallback(async () => {
    setLoading(true);
    const { data, error: err } = await supabase
      .from('education')
      .select('*')
      .order('created_at', { ascending: false });
    if (err) setError(err.message);
    else setEducation(data ?? []);
    setLoading(false);
  }, []);

  useEffect(() => {
    fetchEducation();
  }, [fetchEducation]);

  const createEducation = useCallback(
    async (payload: EducationInsert) => {
      const { data, error } = await supabase
        .from('education')
        .insert(payload)
        .select()
        .single();
      if (!error) await fetchEducation();
      return { data, error };
    },
    [fetchEducation],
  );

  const updateEducation = useCallback(
    async (id: string, payload: EducationUpdate) => {
      const { data, error } = await supabase
        .from('education')
        .update(payload)
        .eq('id', id)
        .select()
        .single();
      if (!error) await fetchEducation();
      return { data, error };
    },
    [fetchEducation],
  );

  const deleteEducation = useCallback(
    async (id: string) => {
      const { error } = await supabase.from('education').delete().eq('id', id);
      if (!error) await fetchEducation();
      return { error };
    },
    [fetchEducation],
  );

  return { education, loading, error, refetch: fetchEducation, createEducation, updateEducation, deleteEducation };
}
