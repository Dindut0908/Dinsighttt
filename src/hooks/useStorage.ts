import { supabase } from '../lib/supabase';

export function getPublicUrl(path: string | null | undefined): string {
  if (!path) return '';
  const { data } = supabase.storage.from('public').getPublicUrl(path);
  return data.publicUrl;
}

export async function uploadFile(bucket: string, path: string, file: File): Promise<string | null> {
  const { error } = await supabase.storage.from(bucket).upload(path, file);
  if (error) return null;
  const { data } = supabase.storage.from(bucket).getPublicUrl(path);
  return data.publicUrl;
}

export async function removeFile(bucket: string, path: string): Promise<void> {
  await supabase.storage.from(bucket).remove([path]);
}
