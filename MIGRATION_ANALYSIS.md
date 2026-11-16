# Analisis & Rencana Migrasi Dinsight (Laravel → React + Supabase)

## 1. Ringkasan Project Asli (Laravel + MySQL)

Project adalah portofolio pribadi + panel admin untuk mengelola konten.

### Fitur Publik (Tanpa Login)
| Route | Method | Controller | Fitur |
|-------|--------|------------|-------|
| `/` | GET | HomeController@index | Halaman utama: hero, about, project+skills (slider), experience, certificates, blog, CV, contact+guestbook |
| `/guestbook` | POST | GuestbookController@store | Kirim pesan buku tamu (AJAX, JSON response) |
| `/download-cv` | GET | Closure | Unduh file CV (PDF) dari storage |
| `/login` | GET | Closure | Halaman login |
| `/login` | POST | Closure | Autentikasi email + password |
| `/logout` | POST | Closure | Logout |

### Fitur Admin (Butuh Login, middleware `auth`, prefix `/admin`)
| Route | Method | Controller | Fitur |
|-------|--------|------------|-------|
| `/admin/dashboard` | GET | Closure | Dashboard statistik + upload CV |
| `/admin/projects` | resource | ProjectController | CRUD project (gambar wajib) |
| `/admin/skills` | resource | SkillController | CRUD skill (icon, persentase, kategori) |
| `/admin/experiences` | resource | ExperienceController | CRUD experience (gambar opsional, is_active) |
| `/admin/certificates` | resource | CertificateController | CRUD sertifikat (gambar opsional, tanggal, URL verifikasi) |
| `/admin/blogs` | resource | BlogController | CRUD blog (slug otomatis, thumbnail, published_at, is_published) |
| `/admin/guestbooks` | GET | AdminGuestbookController@index | Daftar semua pesan buku tamu |
| `/admin/guestbooks/{id}/approve` | PATCH | AdminGuestbookController@approve | Setujui pesan |
| `/admin/guestbooks/{id}` | DELETE | AdminGuestbookController@destroy | Hapus pesan |
| `/admin/upload-cv` | POST | Closure | Upload ganti CV PDF (maks 5MB, mimes:pdf) |

### Model & Kolom (dari migrations + fillable)

| Tabel | Kolom Utama | Keterangan |
|-------|-------------|------------|
| `users` | id, name, email(unique), email_verified_at, password, remember_token | Laravel Auth (diganti Supabase Auth) |
| `projects` | id, title, slug(unique), description, image, demo_link, repo_link, tech_stack | Portofolio project |
| `skills` | id, title, icon, percentage, category | Keahlian (persentase 0-100) |
| `experiences` | id, position, organization, period, description, image, is_active | Pengalaman |
| `certificates` | id, name, issuer, issued_date(date), image, credential_url | Sertifikat |
| `blogs` | id, title, slug(unique), content(longText), thumbnail, excerpt(500), published_at(date), is_published | Blog artikel |
| `guestbooks` | id, name, email, message, is_approved(boolean), ip_address | Buku tamu |
| `abouts` | id, fullname, email, phone, education, address, description, photo | Profil about |
| `education` | id, school, major, year, description | Pendidikan |
| `homes` | id, timestamps | Kosong (tidak digunakan) |

Tabel Laravel scaffolding (cache, cache_locks, jobs, job_batches, failed_jobs, password_reset_tokens, sessions) **tidak difiturkan** dalam React + Supabase (diganti oleh fitur Supabase bawaan).

### Validasi Penting
- Project store: title required, description required, image required (image, max 2MB), demo_link/repo_link nullable url, tech_stack nullable
- Skill store: title, icon, percentage (0-100), category required
- Experience store: position, organization, period required; image nullable (max 2MB); is_active boolean
- Certificate store: name, issuer, issued_date required; image nullable (max 3MB); credential_url nullable url
- Blog store: title, content required; thumbnail nullable; excerpt nullable max 500; published_at nullable date; is_published boolean; slug = slug(title) + time
- Guestbook store: name required max 100, email nullable email max 255, message required max 1000; is_approved=true, ip_address dari request

### Upload / Storage
- Disk: `public`, symlink `public/storage` → `storage/app/public`
- Folder: `cv/`, `entrepreneurs/`, `experiences/`, `projects/`, `skills/`
- File ada di `storage/app/public/*`

### UI / Desain
- Tailwind CSS, Font Awesome 6, AOS (animate on scroll), Lucide
- Dark mode default (simpan di `localStorage`)
- Glow background, custom cursor, smooth scroll
- Bahasa Indonesia, warna cyan/purple/slate
- Admin: sidebar kiri + konten kanan, dark theme

---

## 2. Mapping Migrasi

| Komponen Laravel | Diganti Dengan (React + Supabase) |
|------------------|-----------------------------------|
| Laravel Blade | React components (Vite) |
| Laravel Routes (`web.php`) | React Router (`react-router-dom`) |
| Controller + Model | React logic + Supabase JS client (`@supabase/supabase-js`) |
| MySQL | Supabase PostgreSQL |
| Laravel Auth (session) | Supabase Auth (`signInWithPassword`, `signOut`) |
| Laravel Storage (public disk) | Supabase Storage (bucket `public`) |
| Middleware `auth` | Protected route wrapper + RLS |
| Flash session (`with('success')`) | React state (toast / alert) |
| CSRF token | Tidak perlu (Supabase handles via client) |
| Pagination (`paginate()`) | Supabase `range()` + client-side state |
| Eloquent ORM | Supabase query builder (`select`, `insert`, `update`, `delete`) |

### Tabel Tabel → Tabel Supabase PostgreSQL

Semua tabel menggunakan `id` bertipe `uuid` (primary key, default `gen_random_uuid()`), dengan `created_at` dan `updated_at` bertipe `timestamptz`.

Tabel-tabel yang dibawa:
- `profiles` (dari `users`) — id (uuid, FK ke auth.users), name, email, avatar_url
- `projects`
- `skills`
- `experiences`
- `certificates`
- `blogs`
- `guestbooks`
- `abouts`
- `education`
- `homes`

Tabel Laravel scaffolding (cache, jobs, sessions, etc.) **tidang dibawa** karena diganti oleh Supabase.

---

## 3. RLS (Row Level Security) Supabase

| Tabel | Akses Publik (anon) | Akses Terautentikasi (authenticated/admin) |
|-------|---------------------|--------------------------------------------|
| `profiles` | Read | Full |
| `projects` | Read | Full |
| `skills` | Read | Full |
| `experiences` | Read (hanya `is_active = true`) | Full |
| `certificates` | Read | Full |
| `blogs` | Read (hanya `is_published = true`) | Full |
| `guestbooks` | Read (hanya `is_approved = true`), INSERT | Full |
| `abouts` | Read | Full |
| `education` | Read | Full |
| `homes` | Read | Full |

Supabase Auth: semua pengguna yang login dianggap admin (tidak ada kolom role terpisah di model asli).

---

## 4. Struktur Folder React (Vite)

```
dinsight-react/
├── supabase/
│   └── schema.sql
├── src/
│   ├── lib/
│   │   ├── supabase.ts          # Supabase client
│   │   └── validations.ts       # Validasi sederhana
│   ├── services/
│   │   ├── projects.ts
│   │   ├── skills.ts
│   │   ├── experiences.ts
│   │   ├── certificates.ts
│   │   ├── blogs.ts
│   │   ├── guestbooks.ts
│   │   ├── abouts.ts
│   │   ├── education.ts
│   │   ├── homes.ts
│   │   ├── profiles.ts
│   │   └── storage.ts           # Upload file ke Supabase Storage
│   ├── hooks/
│   │   ├── useAuth.ts
│   │   ├── useProjects.ts
│   │   ├── useSkills.ts
│   │   ├── useExperiences.ts
│   │   ├── useCertificates.ts
│   │   ├── useBlogs.ts
│   │   ├── useGuestbooks.ts
│   │   └── useAbout.ts
│   ├── components/
│   │   ├── layout/
│   │   │   ├── Navbar.tsx
│   │   │   ├── Sidebar.tsx
│   │   │   ├── GuestLayout.tsx
│   │   │   └── AdminLayout.tsx
│   │   ├── ui/
│   │   │   ├── Button.tsx
│   │   │   ├── Input.tsx
│   │   │   ├── Textarea.tsx
│   │   │   ├── Select.tsx
│   │   │   ├── Card.tsx
│   │   │   ├── Table.tsx
│   │   │   ├── Modal.tsx
│   │   │   ├── Badge.tsx
│   │   │   ├── Progress.tsx
│   │   │   └── Toast.tsx
│   │   └── common/
│   │       ├── ProjectCard.tsx
│   │       ├── SkillCard.tsx
│   │       ├── ExperienceCard.tsx
│   │       ├── CertificateCard.tsx
│   │       ├── BlogCard.tsx
│   │       └── GuestbookItem.tsx
│   ├── pages/
│   │   ├── Home.tsx
│   │   ├── Login.tsx
│   │   ├── AdminDashboard.tsx
│   │   ├── AdminProjects.tsx
│   │   ├── AdminSkills.tsx
│   │   ├── AdminExperiences.tsx
│   │   ├── AdminCertificates.tsx
│   │   ├── AdminBlogs.tsx
│   │   ├── AdminGuestbooks.tsx
│   │   └── AdminCVUpload.tsx
│   ├── assets/
│   │   └── (logo, gambar statis)
│   ├── App.tsx
│   └── main.tsx
├── index.html
├── vite.config.js
├── tailwind.config.js
├── postcss.config.js
├── package.json
└── .env.example
```

---

## 5. Catatan Alternatif / Tidak Bisa Dipindahkan Langsung

| Fitur Laravel | Alternatif React + Supabase |
|---------------|------------------------------|
| Session-based auth (`Auth::attempt`) | Supabase Auth (`signInWithPassword`), token disimpan di memori/lokalStorage oleh client |
| CSRF token | Tidak perlu, Supabase client menangani autentikasi otomatis |
| Flash session (`with('success')`) | State React + toast/alert komponen |
| `asset('storage/...')` | Supabase Storage public URL (`supabase.storage.from('public').getPublicUrl(path)`) |
| Eloquent `paginate()` | Supabase `range(from, to)` + state halaman di React |
| `Str::slug()` | `slug` difungsi sederhana di React/service atau di database |
| `diffForHumans()` | Format tanggal dengan `date-fns` atau `Intl.DateTimeFormat` |
| Middleware `auth` di route | Protected route wrapper di React Router |
| File upload via `store('folder', 'public')` | Supabase Storage `upload()` ke bucket `public` |
| MySQL `ipAddress` | Simpan sebagai `text` (Supabase tidak ada `ipAddress` bawaan, gunakan `text` atau `inet`) |

---

## 6. Langkah Selanjutnya

1. Buat schema SQL Supabase (`supabase/schema.sql`)
2. Inisialisasi project React + Vite
3. Setup Supabase client + RLS
4. Buat services & hooks
5. Buat komponen UI reusable
6. Buat halaman publik (Home, dll)
7. Buat halaman admin + Auth
8. Testing CRUD, Auth, RLS, routing, responsive
9. Build & hosting (Vercel/Netlify)

Project Laravel lama **tidak diubah dan tidak dihapus**.