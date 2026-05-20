<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dinsight</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-slate-100 text-slate-900 dark:bg-[#070B14] dark:text-white transition-colors duration-500 overflow-x-hidden">

    {{-- BACKGROUND --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        {{-- GLOW 1 --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px]
        bg-cyan-500/20 blur-[120px] rounded-full">
        </div>

        {{-- GLOW 2 --}}
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px]
        bg-purple-500/20 blur-[120px] rounded-full">
        </div>

    </div>

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full z-50
    backdrop-blur-xl bg-black/20 border-b border-white/10">

        <div class="max-w-7xl mx-auto px-6 py-5
        flex items-center justify-between">

            {{-- LOGO --}}
            <a href="/" class="text-3xl font-black animated-gradient">

                Dinsight
            </a>
{{-- MENU --}}
<div class="hidden md:flex items-center gap-8">

    <a href="/#home"
       class="hover:text-cyan-400 transition">
        Home
    </a>

    <a href="/#about"
       class="hover:text-cyan-400 transition">
        About
    </a>

    <a href="/#showcase"
       class="hover:text-cyan-400 transition">
        Projects
    </a>

    <a href="/#entrepreneur"
       class="hover:text-cyan-400 transition">
        Entrepreneur
    </a>

    <a href="/#contact"
       class="hover:text-cyan-400 transition">
        Contact
    </a>

</div>

            {{-- AUTH --}}
            <div class="flex items-center gap-4">

                @auth

                    {{-- DASHBOARD --}}
                    <a href="{{ route('dashboard') }}"
                       class="hover:text-cyan-400 transition">

                        Dashboard

                    </a>

                    {{-- LOGOUT --}}
                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="px-5 py-2 rounded-full
                            bg-red-500/20 border border-red-500/20
                            hover:bg-red-500/40 transition">

                            Logout

                        </button>

                    </form>

                @else

                    {{-- LOGIN --}}
                    <a href="{{ route('login') }}"
class="px-6 py-3 rounded-full
bg-gradient-to-r from-purple-600 to-cyan-500">

    Login

</a>

                @endauth

            </div>

        </div>

    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>

</html>