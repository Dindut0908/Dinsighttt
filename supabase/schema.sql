
-- =========================================================
-- DINSIGHT DATABASE
-- PostgreSQL / Supabase
-- =========================================================

-- 1. TABEL PROFILES
CREATE TABLE IF NOT EXISTS public.profiles (
    id uuid PRIMARY KEY REFERENCES auth.users(id) ON DELETE CASCADE,
    name text,
    email text UNIQUE,
    avatar_url text,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 2. TABEL USER ROLES
CREATE TABLE IF NOT EXISTS public.user_roles (
    user_id uuid PRIMARY KEY REFERENCES auth.users(id) ON DELETE CASCADE,
    role text NOT NULL DEFAULT 'admin' CHECK (role = 'admin'),
    created_at timestamptz DEFAULT now()
);

-- 3. FUNGSI PEMERIKSA ADMIN
CREATE OR REPLACE FUNCTION public.is_admin()
RETURNS boolean
LANGUAGE sql
STABLE
SECURITY DEFINER
SET search_path = ''
AS $$
    SELECT EXISTS (
        SELECT 1
        FROM public.user_roles
        WHERE user_id = (SELECT auth.uid())
          AND role = 'admin'
    );
$$;

REVOKE ALL ON FUNCTION public.is_admin() FROM PUBLIC;
GRANT EXECUTE ON FUNCTION public.is_admin() TO authenticated;

-- 4. PROJECTS
CREATE TABLE IF NOT EXISTS public.projects (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    title text NOT NULL,
    slug text UNIQUE,
    description text NOT NULL,
    image text,
    demo_link text,
    repo_link text,
    tech_stack text,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 5. SKILLS
CREATE TABLE IF NOT EXISTS public.skills (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    title text NOT NULL,
    icon text,
    percentage integer DEFAULT 0,
    category text DEFAULT 'Technical',
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 6. EXPERIENCES
CREATE TABLE IF NOT EXISTS public.experiences (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    position text NOT NULL,
    organization text NOT NULL,
    period text NOT NULL,
    description text,
    image text,
    is_active boolean DEFAULT true,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 7. CERTIFICATES
CREATE TABLE IF NOT EXISTS public.certificates (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    name text NOT NULL,
    issuer text NOT NULL,
    issued_date date,
    image text,
    credential_url text,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 8. BLOGS
CREATE TABLE IF NOT EXISTS public.blogs (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    title text NOT NULL,
    slug text UNIQUE,
    content text NOT NULL,
    thumbnail text,
    excerpt text,
    published_at date,
    is_published boolean DEFAULT true,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 9. GUESTBOOKS
CREATE TABLE IF NOT EXISTS public.guestbooks (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    name text NOT NULL,
    email text,
    message text NOT NULL,
    is_approved boolean NOT NULL DEFAULT false,
    ip_address text,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 10. ABOUTS
CREATE TABLE IF NOT EXISTS public.abouts (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    fullname text,
    email text,
    phone text,
    education text,
    address text,
    description text,
    photo text,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 11. EDUCATION
CREATE TABLE IF NOT EXISTS public.education (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    school text NOT NULL,
    major text NOT NULL,
    year text NOT NULL,
    description text,
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- 12. HOMES
CREATE TABLE IF NOT EXISTS public.homes (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    created_at timestamptz DEFAULT now(),
    updated_at timestamptz DEFAULT now()
);

-- =========================================================
-- ROW LEVEL SECURITY
-- =========================================================

ALTER TABLE public.profiles ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.user_roles ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.projects ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.skills ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.experiences ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.certificates ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.blogs ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.guestbooks ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.abouts ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.education ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.homes ENABLE ROW LEVEL SECURITY;

-- USER ROLES
-- Tidak memberikan akses tulis kepada pengguna biasa.
-- Role admin hanya ditambahkan melalui SQL Editor oleh pemilik database.

-- PROFILES
CREATE POLICY "Users view own profile"
ON public.profiles FOR SELECT
TO authenticated
USING (auth.uid() = id);

CREATE POLICY "Users insert own profile"
ON public.profiles FOR INSERT
TO authenticated
WITH CHECK (auth.uid() = id);

CREATE POLICY "Users update own profile"
ON public.profiles FOR UPDATE
TO authenticated
USING (auth.uid() = id)
WITH CHECK (auth.uid() = id);

CREATE POLICY "Admins manage profiles"
ON public.profiles FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- PROJECTS
CREATE POLICY "Public view projects"
ON public.projects FOR SELECT
USING (true);

CREATE POLICY "Admins manage projects"
ON public.projects FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- SKILLS
CREATE POLICY "Public view skills"
ON public.skills FOR SELECT
USING (true);

CREATE POLICY "Admins manage skills"
ON public.skills FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- EXPERIENCES
CREATE POLICY "Public view active experiences"
ON public.experiences FOR SELECT
USING (is_active = true);

CREATE POLICY "Admins manage experiences"
ON public.experiences FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- CERTIFICATES
CREATE POLICY "Public view certificates"
ON public.certificates FOR SELECT
USING (true);

CREATE POLICY "Admins manage certificates"
ON public.certificates FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- BLOGS
CREATE POLICY "Public view published blogs"
ON public.blogs FOR SELECT
USING (is_published = true);

CREATE POLICY "Admins manage blogs"
ON public.blogs FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- GUESTBOOKS
CREATE POLICY "Public view approved guestbooks"
ON public.guestbooks FOR SELECT
USING (is_approved = true);

CREATE POLICY "Public insert pending guestbooks"
ON public.guestbooks FOR INSERT
TO anon, authenticated
WITH CHECK (is_approved = false);

CREATE POLICY "Admins manage guestbooks"
ON public.guestbooks FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- ABOUTS
CREATE POLICY "Public view abouts"
ON public.abouts FOR SELECT
USING (true);

CREATE POLICY "Admins manage abouts"
ON public.abouts FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- EDUCATION
CREATE POLICY "Public view education"
ON public.education FOR SELECT
USING (true);

CREATE POLICY "Admins manage education"
ON public.education FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- HOMES
CREATE POLICY "Public view homes"
ON public.homes FOR SELECT
USING (true);

CREATE POLICY "Admins manage homes"
ON public.homes FOR ALL
TO authenticated
USING (public.is_admin())
WITH CHECK (public.is_admin());

-- =========================================================
-- INDEXES
-- =========================================================

CREATE INDEX IF NOT EXISTS idx_projects_slug
ON public.projects(slug);

CREATE INDEX IF NOT EXISTS idx_projects_created_at
ON public.projects(created_at DESC);

CREATE INDEX IF NOT EXISTS idx_skills_category
ON public.skills(category);

CREATE INDEX IF NOT EXISTS idx_experiences_is_active
ON public.experiences(is_active);

CREATE INDEX IF NOT EXISTS idx_certificates_issued_date
ON public.certificates(issued_date DESC);

CREATE INDEX IF NOT EXISTS idx_blogs_slug
ON public.blogs(slug);

CREATE INDEX IF NOT EXISTS idx_blogs_is_published
ON public.blogs(is_published);

CREATE INDEX IF NOT EXISTS idx_blogs_published_at
ON public.blogs(published_at DESC);

CREATE INDEX IF NOT EXISTS idx_guestbooks_is_approved
ON public.guestbooks(is_approved);

CREATE INDEX IF NOT EXISTS idx_guestbooks_created_at
ON public.guestbooks(created_at DESC);

-- =========================================================
-- STORAGE BUCKET
-- =========================================================

INSERT INTO storage.buckets (id, name, public)
VALUES ('public', 'public', true)
ON CONFLICT (id) DO NOTHING;

CREATE POLICY "Public can view Dinsight files"
ON storage.objects FOR SELECT
TO anon, authenticated
USING (bucket_id = 'public');

CREATE POLICY "Admins upload Dinsight files"
ON storage.objects FOR INSERT
TO authenticated
WITH CHECK (
    bucket_id = 'public'
    AND public.is_admin()
);

CREATE POLICY "Admins update Dinsight files"
ON storage.objects FOR UPDATE
TO authenticated
USING (
    bucket_id = 'public'
    AND public.is_admin()
)
WITH CHECK (
    bucket_id = 'public'
    AND public.is_admin()
);

CREATE POLICY "Admins delete Dinsight files"
ON storage.objects FOR DELETE
TO authenticated
USING (
    bucket_id = 'public'
    AND public.is_admin()
);
