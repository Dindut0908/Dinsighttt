<footer class="border-t border-white/10 bg-black/30 backdrop-blur-xl">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">

            {{-- LEFT --}}
            <div>

                <h2 class="text-3xl font-black bg-gradient-to-r from-purple-500 to-cyan-400 bg-clip-text text-transparent">
                    Dinsight
                </h2>

                <p class="text-gray-400 mt-3 max-w-md">
                    Fullstack Developer building modern web applications
                    and scalable digital experiences.
                </p>

            </div>

            {{-- CENTER --}}
            <div class="flex gap-8 text-sm font-semibold">

                <a href="#home" class="hover:text-cyan-400 transition">Home</a>
                <a href="#about" class="hover:text-cyan-400 transition">About</a>
                <a href="#projects" class="hover:text-cyan-400 transition">Projects</a>
                <a href="#contact" class="hover:text-cyan-400 transition">Contact</a>

            </div>

            {{-- SOCIAL --}}
            <div class="flex gap-4">

                <a href="#"
                   class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:border-cyan-400 hover:-translate-y-1 transition">

                    🔗

                </a>

                <a href="#"
                   class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:border-cyan-400 hover:-translate-y-1 transition">

                    📷

                </a>

                <a href="#"
                   class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:border-cyan-400 hover:-translate-y-1 transition">

                    💼

                </a>

            </div>

        </div>

        {{-- BOTTOM --}}
        <div class="border-t border-white/10 mt-10 pt-6 text-center text-gray-500 text-sm">

            © {{ date('Y') }} Dinsight. All rights reserved.

        </div>

    </div>

</footer>