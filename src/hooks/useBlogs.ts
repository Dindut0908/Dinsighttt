import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { Database } from '../lib/database.types';
import { slugify, stripUploadFields } from '../lib/validations';

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
      const { thumbnailFile, removeImage, ...dbPayload } = stripUploadFields(payload);

      let thumbnailPath = dbPayload.thumbnail as string | undefined;
      if (thumbnailFile) {
        const fileName = `${Date.now()}-${thumbnailFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`blogs/${fileName}`, thumbnailFile);
        if (uploadErr) return { error: uploadErr.message };
        thumbnailPath = `blogs/${fileName}`;
      } else if (removeImage && dbPayload.thumbnail) {
        await supabase.storage.from('public').remove([dbPayload.thumbnail]);
        thumbnailPath = undefined;
      }

      const slug = dbPayload.slug || `${slugify(dbPayload.title)}-${Date.now()}`;
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
      const { thumbnailFile, removeImage, ...dbPayload } = stripUploadFields(payload);

      let thumbnailPath = dbPayload.thumbnail as string | undefined;
      if (removeImage && dbPayload.thumbnail) {
        await supabase.storage.from('public').remove([dbPayload.thumbnail]);
        thumbnailPath = undefined;
      }
      if (thumbnailFile) {
        if (dbPayload.thumbnail) {
          await supabase.storage.from('public').remove([dbPayload.thumbnail]);
        }
        const fileName = `${Date.now()}-${thumbnailFile.name.replace(/\s+/g, '_')}`;
        const { error: uploadErr } = await supabase.storage
          .from('public')
          .upload(`blogs/${fileName}`, thumbnailFile);
        if (uploadErr) return { error: uploadErr.message };
        thumbnailPath = `blogs/${fileName}`;
      }

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
