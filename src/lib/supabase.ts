
import { createClient } from '@supabase/supabase-js';

// Mengambil konfigurasi dari file .env.local
const supabaseUrl = import.meta.env.VITE_SUPABASE_URL;
const supabaseAnonKey = import.meta.env.VITE_SUPABASE_ANON_KEY;

// Memastikan konfigurasi Supabase tersedia
if (!supabaseUrl || !supabaseAnonKey) {
  throw new Error(
    'Supabase URL atau Anon Key belum diatur. Periksa file .env.local dan pastikan VITE_SUPABASE_URL serta VITE_SUPABASE_ANON_KEY sudah diisi.',
  );
}

// Membuat koneksi ke Supabase
export const supabase = createClient(
  supabaseUrl,
  supabaseAnonKey,
);

// Export default
export default supabase;
