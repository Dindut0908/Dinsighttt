<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — @yield('title', 'Dashboard')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class' }</script>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-slate-100 dark:bg-slate-900 min-h-screen text-slate-800 dark:text-slate-200">

    {{-- ============ SIDEBAR ============ --}}
    <aside class="fixed inset-y-0 left-0 w-64 bg-slate-900 text-white p-5 overflow-y-auto z-40">

        <h1 class="text-xl font-black mb-8">
            <i class="fa-solid fa-shield-halved text-cyan-400 mr-2"></i>
            Admin Panel
        </h1>

        <nav class="space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-gauge w-5 mr-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.projects.index') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.projects.*') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-folder w-5 mr-2"></i> Projects
            </a>
            <a href="{{ route('admin.skills.index') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.skills.*') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-code w-5 mr-2"></i> Skills
            </a>
            <a href="{{ route('admin.experiences.index') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.experiences.*') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-briefcase w-5 mr-2"></i> Experiences
            </a>
            <a href="{{ route('admin.certificates.index') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.certificates.*') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-certificate w-5 mr-2"></i> Certificates
            </a>
            <a href="{{ route('admin.blogs.index') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.blogs.*') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-newspaper w-5 mr-2"></i> Blogs
            </a>
            <a href="{{ route('admin.guestbooks.index') }}"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10
                {{ request()->routeIs('admin.guestbooks.*') ? 'bg-cyan-500/20 text-cyan-300' : '' }}">
                <i class="fa-solid fa-comments w-5 mr-2"></i> Guestbook
            </a>

            <hr class="my-4 border-white/10">

            <a href="{{ route('home') }}" target="_blank"
                class="flex items-center px-3 py-2 rounded-lg hover:bg-white/10">
                <i class="fa-solid fa-arrow-up-right-from-square w-5 mr-2"></i> Lihat Website
            </a>
        </nav>
    </aside>

    {{-- ============ MAIN CONTENT ============ --}}
    <main class="ml-64 p-8">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-black">@yield('title', 'Dashboard')</h2>
            <span class="text-sm text-slate-500">{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>

        {{-- Flash Success --}}
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-700 border border-green-300 flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-100 text-red-700 border border-red-300">
                <p class="font-bold mb-2">
                    <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                    Ada kesalahan:
                </p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Konten Halaman --}}
        @yield('content')

    </main>

</body>
</html>