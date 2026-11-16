<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- DARK MODE DEFAULT --}}
    <script>
        // Dark mode menjadi mode default
        // Jika sebelumnya user memilih light, gunakan light
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>

    <title>Dinsight</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>


<body class="bg-slate-100 text-slate-900
dark:bg-[#070B14] dark:text-white
transition-colors duration-500 overflow-x-hidden">


    {{-- BACKGROUND GLOW --}}
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">

        {{-- GLOW 1 --}}
        <div class="absolute top-0 left-0
            w-[500px] h-[500px]
            bg-cyan-500/20
            blur-[120px]
            rounded-full">
        </div>

        {{-- GLOW 2 --}}
        <div class="absolute bottom-0 right-0
            w-[500px] h-[500px]
            bg-purple-500/20
            blur-[120px]
            rounded-full">
        </div>

    </div>



    {{-- ========================= --}}
    {{-- NAVBAR --}}
    {{-- ========================= --}}

    <nav class="fixed top-0 left-0 w-full z-[9999]
        backdrop-blur-xl
        bg-white/70 dark:bg-black/20
        border-b border-slate-200 dark:border-white/10
        transition-colors duration-500">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="flex justify-between items-center h-20">


                {{-- LOGO --}}
                <a href="/"
                    class="text-3xl font-black
                    bg-gradient-to-r
                    from-purple-500 to-cyan-400
                    bg-clip-text text-transparent">

                    Dinsight

                </a>



                {{-- DESKTOP MENU --}}
                <div class="hidden md:flex items-center gap-8">

                    <a href="/#home"
                        class="text-slate-700 dark:text-white
                        hover:text-cyan-400 transition">

                        Home

                    </a>

                    <a href="/#about"
                        class="text-slate-700 dark:text-white
                        hover:text-cyan-400 transition">

                        About

                    </a>

                    <a href="/#project"
                        class="text-slate-700 dark:text-white
                        hover:text-cyan-400 transition">

                        Projects

                    </a>


                    <a href="/#pengalaman"
                        class="text-slate-700 dark:text-white
                        hover:text-cyan-400 transition">

                        Pengalaman

                    </a>
                    <a href="/#sertifikat"
                        class="text-slate-700 dark:text-white
                        hover:text-cyan-400 transition">

                        Sertifikat

                    </a>
                    <a href="/#contact"
                        class="text-slate-700 dark:text-white
                        hover:text-cyan-400 transition">

                        Contact

                    </a>

                </div>



                {{-- RIGHT DESKTOP --}}
                <div class="hidden md:flex items-center gap-4">


                    {{-- DARK / LIGHT TOGGLE --}}
                    <button
                        id="theme-toggle"
                        type="button"
                        class="w-11 h-11 rounded-full
                        bg-slate-200 dark:bg-white/10
                        border border-slate-300 dark:border-white/10
                        flex items-center justify-center
                        hover:scale-110
                        transition-all duration-300">

                        <i id="theme-icon"
                            class="fa-solid fa-sun text-yellow-400">
                        </i>

                    </button>



                    {{-- AUTH --}}
                    @auth

                        <a href="{{ route('admin.dashboard') }}" ...>Dashboard</a>

                        </a>


                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="px-5 py-2 rounded-full
                                bg-red-500/20
                                border border-red-500/20
                                text-red-500 dark:text-red-400
                                hover:bg-red-500/40
                                transition">

                                Logout

                            </button>

                        </form>

                    @else

                        {{-- LOGIN SENGAJA TIDAK DITAMPILKAN --}}

                    @endauth

                </div>



                {{-- MOBILE BUTTON --}}
                <button
                    id="mobile-menu-button"
                    type="button"
                    class="md:hidden
                    text-slate-800 dark:text-white
                    text-2xl">

                    <i id="mobile-menu-icon"
                        class="fa-solid fa-bars">
                    </i>

                </button>

            </div>

        </div>



        {{-- ========================= --}}
        {{-- MOBILE MENU --}}
        {{-- ========================= --}}

        <div id="mobile-menu"
            class="hidden md:hidden
            bg-white/95 dark:bg-[#0B1120]/95
            backdrop-blur-xl
            border-t border-slate-200 dark:border-white/10">

            <div class="flex flex-col
                px-6 py-6
                space-y-5">


                {{-- MOBILE DARK MODE --}}
                <button
                    id="mobile-theme-toggle"
                    type="button"
                    class="flex items-center gap-3
                    py-3 px-4
                    rounded-xl
                    bg-slate-100 dark:bg-white/5
                    border border-slate-200 dark:border-white/10
                    text-slate-800 dark:text-white">

                    <i id="mobile-theme-icon"
                        class="fa-solid fa-sun text-yellow-400">
                    </i>

                    <span id="mobile-theme-text">
                        Light Mode
                    </span>

                </button>



                {{-- MOBILE MENU --}}
                <a href="/#home"
                    class="text-slate-800 dark:text-white
                    hover:text-cyan-400 transition">

                    Home

                </a>


                <a href="/#about"
                    class="text-slate-800 dark:text-white
                    hover:text-cyan-400 transition">

                    About

                </a>


                <a href="/#project"
                    class="text-slate-800 dark:text-white
                    hover:text-cyan-400 transition">

                    Projects

                </a>


                <a href="/#contact"
                    class="text-slate-800 dark:text-white
                    hover:text-cyan-400 transition">

                    Contact

                </a>



                {{-- AUTH MOBILE --}}
                @auth

                    <a href="{{ route('admin.dashboard') }}" class="text-slate-800 dark:text-white hover:text-cyan-400 transition">
    Dashboard
</a>


                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="text-red-500 dark:text-red-400
                            hover:text-red-300 transition">

                            Logout

                        </button>

                    </form>

                @else

                    <a href="{{ route('login') }}"
                        class="text-slate-800 dark:text-white
                        hover:text-cyan-400 transition">

                        Login

                    </a>

                @endauth

            </div>

        </div>

    </nav>
    {{-- ========================= --}}
    {{-- CONTENT --}}
    {{-- ========================= --}}
    <main>
        @yield('content')
    </main>
    {{-- ========================= --}}
    {{-- THEME + MOBILE JS --}}
    {{-- ========================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const html = document.documentElement;

            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');

            const mobileThemeToggle =
                document.getElementById('mobile-theme-toggle');

            const mobileThemeIcon =
                document.getElementById('mobile-theme-icon');

            const mobileThemeText =
                document.getElementById('mobile-theme-text');
            /*
            ==========================================
            UPDATE ICON
            ==========================================
            */
            function updateThemeIcon() {

                if (html.classList.contains('dark')) {

                    // DARK MODE
                    themeIcon.className =
                        'fa-solid fa-sun text-yellow-400';

                    mobileThemeIcon.className =
                        'fa-solid fa-sun text-yellow-400';

                    mobileThemeText.textContent =
                        'Light Mode';

                } else {

                    // LIGHT MODE
                    themeIcon.className =
                        'fa-solid fa-moon text-cyan-400';

                    mobileThemeIcon.className =
                        'fa-solid fa-moon text-cyan-400';

                    mobileThemeText.textContent =
                        'Dark Mode';

                }

            }


            /*
            ==========================================
            TOGGLE THEME
            ==========================================
            */

            function toggleTheme() {

                if (html.classList.contains('dark')) {

                    // DARK → LIGHT
                    html.classList.remove('dark');

                    localStorage.setItem('theme', 'light');

                } else {

                    // LIGHT → DARK
                    html.classList.add('dark');

                    localStorage.setItem('theme', 'dark');

                }

                updateThemeIcon();

            }


            /*
            ==========================================
            DESKTOP TOGGLE
            ==========================================
            */

            if (themeToggle) {

                themeToggle.addEventListener(
                    'click',
                    toggleTheme
                );

            }


            /*
            ==========================================
            MOBILE TOGGLE
            ==========================================
            */

            if (mobileThemeToggle) {

                mobileThemeToggle.addEventListener(
                    'click',
                    toggleTheme
                );

            }


            /*
            ==========================================
            INITIAL ICON
            ==========================================
            */

            updateThemeIcon();



            /*
            ==========================================
            MOBILE MENU
            ==========================================
            */

            const mobileMenuButton =
                document.getElementById('mobile-menu-button');

            const mobileMenu =
                document.getElementById('mobile-menu');

            const mobileMenuIcon =
                document.getElementById('mobile-menu-icon');


            if (mobileMenuButton) {

                mobileMenuButton.addEventListener(
                    'click',
                    function () {

                        mobileMenu.classList.toggle('hidden');


                        if (mobileMenu.classList.contains('hidden')) {

                            mobileMenuIcon.className =
                                'fa-solid fa-bars';

                        } else {

                            mobileMenuIcon.className =
                                'fa-solid fa-xmark';

                        }

                    }
                );

            }

        });

    </script>

</body>

</html>