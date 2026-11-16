# Panduan Migrasi Data MySQL/XAMPP → Supabase PostgreSQL

## Penting
Jangan menghapus database lama (XAMPP MySQL) sebelum memverifikasi bahwa semua data sudah tersimpan di Supabase dan aplikasi React berjalan dengan baik.

---

## Langkah 1: Export data dari MySQL (phpMyAdmin)

1. Buka phpMyAdmin (`http://localhost/phpmyadmin`)
2. Pilih database `dinsighttt`
3. Export setiap tabel berikut ke format **SQL** atau **CSV**:
   - `users`
   - `projects`
   - `skills`
   - `experiences`
   - `certificates`
   - `blogs`
   - `guestbooks`
   - `abouts`
   - `education`
   - `homes`

   (Tabel Laravel scaffolding seperti `cache`, `jobs`, `sessions`, `failed_jobs` **tidak perlu** diexport karena diganti oleh fitur bawaan Supabase.)

4. Simpan file export di folder misalnya `migration_export/`.

---

## Langkah 2: Siapkan Supabase

1. Buat akun di [supabase.com](https://supabase.com)
2. Buat project baru, catat:
   - **Project URL** → masukkan ke `VITE_SUPABASE_URL`
   - **Project API Keys > anon public** → masukkan ke `VITE_SUPABASE_ANON_KEY`
3. Masukkan keduanya ke file `.env` di root project React:
   ```
   VITE_SUPABASE_URL=https://xxx.supabase.co
   VITE_SUPABASE_ANON_KEY=your-anon-key
   ```
4. Buka **SQL Editor** di Supabase Dashboard, jalankan seluruh isi file:
   `supabase/schema.sql`
   
   Ini akan membuat semua tabel, RLS policy, dan index.

5. Buat **Storage Bucket** bernama `public` (public bucket) di Supabase Storage > Bucket.
   - Folder yang digunakan: `cv/`, `entrepreneurs/`, `experiences/`, `projects/`, `skills/`, `blogs/`, `abouts/`

---

## Langkah 3: Import data ke Supabase

### Opsi A: Via SQL (direkomendasikan untuk data struktural)

Buka file export SQL dari phpMyAdmin, sesuaikan sintaks MySQL ke PostgreSQL, lalu jalankan di Supabase SQL Editor.

Contoh konversi sintaks utama:

| MySQL | PostgreSQL (Supabase) |
|-------|----------------------|
| `INT AUTO_INCREMENT` | `UUID DEFAULT gen_random_uuid() PRIMARY KEY` |
| `TINYINT(1)` / `BOOLEAN` | `BOOLEAN` |
| `DATETIME` / `TIMESTAMP` | `TIMESTAMPTZ` |
| `IPADDRESS` | `TEXT` |
| `LONGTEXT` | `TEXT` |
| `VARCHAR(255)` | `TEXT` |

Supabase menggunakan `uuid` untuk `id`, bukan integer auto-increment. Jika data lama menggunakan id integer, Anda dapat memetakan ulang atau mengabaikan id lama dan biarkan Supabase generate uuid baru.

### Opsi B: Via CSV (melalui Table Editor Supabase)

1. Di Supabase Dashboard > Table Editor, buka setiap tabel
2. Klik **Insert** > **Import from CSV**
3. Map kolom sesuai dengan schema di `supabase/schema.sql`

Catatan: kolom `id` boleh dikosongkan saat import (Supabase akan otomatis generate `gen_random_uuid()`).

---

## Langkah 4: Migrasi file upload (Storage)

File ada di `storage/app/public/` di project Laravel:

```
cv/cv-dini.pdf
entrepreneurs/*.jpg, *.png
experiences/*.jpg
projects/*.png
skills/*.png
```

1. Di Supabase Storage > Bucket `public`, buat folder yang sama.
2. Upload setiap file ke folder yang sesuai.
3. Catat **public URL** masing-masing file, atau gunakan path relatif (misal `projects/namafile.png`) dan gunakan fungsi `getPublicUrl(path)` di React untuk mendapatkan URL lengkap.

Jika Anda ingin menautkan path file yang sudah ada di database, update kolom `image`, `thumbnail`, `photo` di setiap tabel dengan path baru di Supabase Storage.

Contoh path mapping:
- Laravel: `storage/app/public/projects/abc.png` → Supabase: `projects/abc.png`
- Laravel: `storage/app/public/cv/cv-dini.pdf` → Supabase: `cv/cv-dini.pdf`

---

## Langkah 5: Migrasi Akun Admin (Auth)

Laravel menggunakan `users` tabel dengan password bcrypt. Supabase Auth adalah terpisah dari tabel `profiles`.

1. Di Supabase Dashboard > Authentication > Users, tambahkan user admin secara manual (atau lewat halaman Register di aplikasi React).
2. Pastikan email yang digunakan sama dengan email admin di Laravel (jika ingin konsisten).
3. Tabel `profiles` di Supabase akan otomatis terisi via trigger atau bisa diisi manual dengan `id` yang sama dengan `auth.users.id`.

---

## Langkah 6: Verifikasi

1. Jalankan `npm run dev` di project React
2. Buka halaman admin dan login dengan akun Supabase Auth
3. Periksa setiap CRUD (Projects, Skills, Experiences, Certificates, Blogs, Guestbooks) menampilkan data yang diimport
4. Periksa halaman publik (Home) menampilkan data dengan benar
5. Uji upload file baru ke Supabase Storage
6. Uji RLS: pastikan pengguna yang tidak login hanya bisa melihat data yang publish/approved

---

## Langkah 7: Hapus Database Lama (Setelah Verifikasi)

Hanya hapus database MySQL di XAMPP setelah:
- Semua data terverifikasi di Supabase
- Aplikasi React berjalan dengan baik
- Anda telah mengambil backup file export sebagai cadangan

---

## Tabel Mapping Lengkap

| Tabel Laravel | Tabel Supabase | Keterangan |
|---------------|----------------|------------|
| `users` | `profiles` + `auth.users` | Auth dipindahkan ke Supabase Auth |
| `projects` | `projects` | + image ke Storage bucket `public` |
| `skills` | `skills` | |
| `experiences` | `experiences` | + image ke Storage |
| `certificates` | `certificates` | + image ke Storage |
| `blogs` | `blogs` | + thumbnail ke Storage |
| `guestbooks` | `guestbooks` | |
| `abouts` | `abouts` | + photo ke Storage |
| `education` | `education` | |
| `homes` | `homes` | |

---

## Environment Variables (untuk hosting Vercel/Netlify)

Tambahkan di dashboard hosting:
- `VITE_SUPABASE_URL`
- `VITE_SUPABASE_ANON_KEY`

Jangan menambahkan `service_role` key di frontend.
