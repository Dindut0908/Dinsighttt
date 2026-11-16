import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';

export type Project = Database['public']['Tables']['projects']['Row'];
export type ProjectInsert = Database['public']['Tables']['projects']['Insert'];
export type ProjectUpdate = Database['public']['Tables']['projects']['Update'];

export function useProjects() {
  const [projects, setProjects] = useState<Project[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchProjects = useCallback(async () => {
    setLoading(true);
    const { data, error: err } = await supabase
      .from('projects')
      .select('*')
      .order('created_at', { ascending: false });
    if (err) setError(err.message);
    else setProjects(data ?? []);
    setLoading(false);
  }, []);

  useEffect(() => {
    fetchProjects();
  }, [fetchProjects]);

  const createProject = useCallback(
    async (payload: ProjectInsert & { imageFile?: File }) => {
      let imagePath = payload.image;
      if (payload.imageFile) {
        const fileName = `${Date.now()}-${payload.imageFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`projects/${fileName}`, payload.imageFile);
        if (uploadErr) return { error: uploadErr.message };
        imagePath = `projects/${fileName}`;
      }
      const { data, error } = await supabase
        .from('projects')
        .insert({ ...payload, image: imagePath })
        .select()
        .single();
      if (!error) await fetchProjects();
      return { data, error };
    },
    [fetchProjects],
  );

  const updateProject = useCallback(
    async (
      id: string,
      payload: ProjectUpdate & { imageFile?: File; removeImage?: boolean },
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
          .upload(`projects/${fileName}`, payload.imageFile);
        if (uploadErr) return { error: uploadErr.message };
        imagePath = `projects/${fileName}`;
      }
      const { data, error } = await supabase
        .from('projects')
        .update({ ...payload, image: imagePath })
        .eq('id', id)
        .select()
        .single();
      if (!error) await fetchProjects();
      return { data, error };
    },
    [fetchProjects],
  );

  const deleteProject = useCallback(
    async (id: string, image?: string) => {
      if (image) {
        await supabase.storage.from('public').remove([image]);
      }
      const { error } = await supabase.from('projects').delete().eq('id', id);
      if (!error) await fetchProjects();
      return { error };
    },
    [fetchProjects],
  );

  return {
    projects,
    loading,
    error,
    refetch: fetchProjects,
    createProject,
    updateProject,
    deleteProject,
  };
}
