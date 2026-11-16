import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';

export type Experience = Database['public']['Tables']['experiences']['Row'];
export type ExperienceInsert = Database['public']['Tables']['experiences']['Insert'];
export type ExperienceUpdate = Database['public']['Tables']['experiences']['Update'];

export function useExperiences() {
  const [experiences, setExperiences] = useState<Experience[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchExperiences = useCallback(async () => {
    setLoading(true);
    const { data, error: err } = await supabase
      .from('experiences')
      .select('*')
      .order('created_at', { ascending: false });
    if (err) setError(err.message);
    else setExperiences(data ?? []);
    setLoading(false);
  }, []);

  useEffect(() => {
    fetchExperiences();
  }, [fetchExperiences]);

  const createExperience = useCallback(
    async (payload: ExperienceInsert & { imageFile?: File }) => {
      let imagePath = payload.image;
      if (payload.imageFile) {
        const fileName = `${Date.now()}-${payload.imageFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`experiences/${fileName}`, payload.imageFile);
        if (uploadErr) return { error: uploadErr.message };
        imagePath = `experiences/${fileName}`;
      }
      const { data, error } = await supabase
        .from('experiences')
        .insert({ ...payload, image: imagePath })
        .select()
        .single();
      if (!error) await fetchExperiences();
      return { data, error };
    },
    [fetchExperiences],
  );

  const updateExperience = useCallback(
    async (
      id: string,
      payload: ExperienceUpdate & { imageFile?: File; removeImage?: boolean },
    ) => {
      let imagePath = payload.image as string | undefined;
      if (payload.removeImage && payload.image) {
        await supabase.storage.from('public').remove([payload.image]);
        imagePath = undefined;
      }
      if (payload.imageFile) {
        if (payload.image) {
          await supabase.storage.from('public').remove([payload.image]);
        }
        const fileName = `${Date.now()}-${payload.imageFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`experiences/${fileName}`, payload.imageFile);
        if (uploadErr) return { error: uploadErr.message };
        imagePath = `experiences/${fileName}`;
      }
      const { data, error } = await supabase
        .from('experiences')
        .update({ ...payload, image: imagePath })
        .eq('id', id)
        .select()
        .single();
      if (!error) await fetchExperiences();
      return { data, error };
    },
    [fetchExperiences],
  );

  const deleteExperience = useCallback(
    async (id: string, image?: string) => {
      if (image) {
        await supabase.storage.from('public').remove([image]);
      }
      const { error } = await supabase.from('experiences').delete().eq('id', id);
      if (!error) await fetchExperiences();
      return { error };
    },
    [fetchExperiences],
  );

  return {
    experiences,
    loading,
    error,
    refetch: fetchExperiences,
    createExperience,
    updateExperience,
    deleteExperience,
  };
}
