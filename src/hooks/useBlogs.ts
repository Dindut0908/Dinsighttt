import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';
import { slugify } from '../lib/validations';

export type Blog = Database['public']['Tables']['blogs']['Row'];
export type BlogInsert = Database['public']['Tables']['blogs']['Insert'];
export type BlogUpdate = Database['public']['Tables']['blogs']['Update'];

export function useBlogs() {
  const [blogs, setBlogs] = useState<Blog[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchBlogs = useCallback(async () => {
    setLoading(true);
    const { data, error: err } = await supabase
      .from('blogs')
      .select('*')
      .order('created_at', { ascending: false });
    if (err) setError(err.message);
    else setBlogs(data ?? []);
    setLoading(false);
  }, []);

  useEffect(() => {
    fetchBlogs();
  }, [fetchBlogs]);

  const createBlog = useCallback(
    async (payload: BlogInsert & { thumbnailFile?: File; removeImage?: boolean }) => {
      let thumbnailPath = payload.thumbnail;
      if (payload.thumbnailFile) {
        const fileName = `${Date.now()}-${payload.thumbnailFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`blogs/${fileName}`, payload.thumbnailFile);
        if (uploadErr) return { data: null, error: uploadErr };
        thumbnailPath = `blogs/${fileName}`;
      }
      const slug = payload.slug || `${slugify(payload.title)}-${Date.now()}`;
      const { thumbnailFile, removeImage, ...dbPayload } = payload as any;
      const { data, error } = await supabase
        .from('blogs')
        .insert({ ...dbPayload, slug, thumbnail: thumbnailPath })
        .select()
        .single();
      if (!error) await fetchBlogs();
      return { data, error };
    },
    [fetchBlogs],
  );

  const updateBlog = useCallback(
    async (
      id: string,
      payload: BlogUpdate & { thumbnailFile?: File; removeImage?: boolean },
    ) => {
      let thumbnailPath = payload.thumbnail as string | undefined;
      if (payload.removeImage && payload.thumbnail) {
        await supabase.storage.from('public').remove([payload.thumbnail]);
        thumbnailPath = null as any;
      }
      if (payload.thumbnailFile) {
        if (payload.thumbnail) {
          await supabase.storage.from('public').remove([payload.thumbnail]);
        }
        const fileName = `${Date.now()}-${payload.thumbnailFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`blogs/${fileName}`, payload.thumbnailFile);
        if (uploadErr) return { data: null, error: uploadErr };
        thumbnailPath = `blogs/${fileName}`;
      }
      const { thumbnailFile, removeImage, ...dbPayload } = payload as any;
      const { data, error } = await supabase
        .from('blogs')
        .update({ ...dbPayload, thumbnail: thumbnailPath })
        .eq('id', id)
        .select()
        .single();
      if (!error) await fetchBlogs();
      return { data, error };
    },
    [fetchBlogs],
  );

  const deleteBlog = useCallback(
    async (id: string, thumbnail?: string) => {
      if (thumbnail) {
        await supabase.storage.from('public').remove([thumbnail]);
      }
      const { error } = await supabase.from('blogs').delete().eq('id', id);
      if (!error) await fetchBlogs();
      return { error };
    },
    [fetchBlogs],
  );

  return { blogs, loading, error, refetch: fetchBlogs, createBlog, updateBlog, deleteBlog };
}
