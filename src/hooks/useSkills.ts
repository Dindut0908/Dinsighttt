import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';

export type Skill = Database['public']['Tables']['skills']['Row'];
export type SkillInsert = Database['public']['Tables']['skills']['Insert'];
export type SkillUpdate = Database['public']['Tables']['skills']['Update'];

export function useSkills() {
  const [skills, setSkills] = useState<Skill[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchSkills = useCallback(async () => {
    setLoading(true);
    const { data, error: err } = await supabase
      .from('skills')
      .select('*')
      .order('created_at', { ascending: false });
    if (err) setError(err.message);
    else setSkills(data ?? []);
    setLoading(false);
  }, []);

  useEffect(() => {
    fetchSkills();
  }, [fetchSkills]);

  const createSkill = useCallback(
    async (payload: SkillInsert) => {
      const { data, error } = await supabase
        .from('skills')
        .insert(payload)
        .select()
        .single();
      if (!error) await fetchSkills();
      return { data, error };
    },
    [fetchSkills],
  );

  const updateSkill = useCallback(
    async (id: string, payload: SkillUpdate) => {
      const { data, error } = await supabase
        .from('skills')
        .update(payload)
        .eq('id', id)
        .select()
        .single();
      if (!error) await fetchSkills();
      return { data, error };
    },
    [fetchSkills],
  );

  const deleteSkill = useCallback(
    async (id: string) => {
      const { error } = await supabase.from('skills').delete().eq('id', id);
      if (!error) await fetchSkills();
      return { error };
    },
    [fetchSkills],
  );

  return { skills, loading, error, refetch: fetchSkills, createSkill, updateSkill, deleteSkill };
}
