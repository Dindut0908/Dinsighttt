<header class="fixed top-0 left-0 w-full z-50 backdrop-blur-xl bg-black/30 border-b border-white/10">

    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        {{-- LOGO --}}
        <a href="#home"
           class="text-4xl font-black bg-gradient-to-r from-purple-500 to-cyan-400 bg-clip-text text-transparent">
            Dinsight
        </a>

        {{-- NAVIGATION --}}
        <nav class="hidden lg:flex items-center gap-10 font-semibold text-sm">

            <a href="#home" class="hover:text-cyan-400 transition">Home</a>
            <a href="#about" class="hover:text-cyan-400 transition">About</a>
            <a href="#projects" class="hover:text-cyan-400 transition">Projects</a>
            <a href="#skills" class="hover:text-cyan-400 transition">Skills</a>
            <a href="#entrepreneur" class="hover:text-cyan-400 transition">Entrepreneur</a>
            <a href="#contact" class="hover:text-cyan-400 transition">Contact</a>

        </nav>

        {{-- RIGHT --}}
        <div class="flex items-center gap-4">

            {{-- LIGHT MODE --}}
            <button id="theme-toggle"
                class="w-11 h-11 rounded-full bg-white/10 border border-white/10 hover:border-cyan-400 flex items-center justify-center transition">

                🌙

            </button>

            {{-- RESUME --}}
            <a href="#"
               class="px-7 py-3 rounded-full bg-gradient-to-r from-purple-600 to-cyan-500 font-semibold hover:scale-105 transition">

                Resume

            </a>

        </div>

    </div>

</header>