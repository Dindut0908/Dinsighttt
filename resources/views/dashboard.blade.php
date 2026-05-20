@extends('layouts.app')

@section('content')

<div class="min-h-screen p-10">
    <div class="max-w-7xl mx-auto px-6 pt-36"></div>

    <div class="flex items-center justify-between mb-10">

        <div>

            <h1 class="text-5xl font-black
            text-slate-900 dark:text-white">

                Admin Dashboard

            </h1>

            <p class="text-slate-500 mt-3">

                Manage your portfolio website.

            </p>

        </div>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button
            class="px-6 py-3 rounded-full
            bg-red-500 text-white">

                Logout

            </button>

        </form>

    </div>

    <div class="grid md:grid-cols-3 gap-8">

        <a href="/projects"
        class="p-8 rounded-3xl
        bg-white/10 backdrop-blur-xl
        border border-white/10">

            <h2 class="text-3xl font-bold">
                Projects
            </h2>

        </a>

        <a href="/skills"
        class="p-8 rounded-3xl
        bg-white/10 backdrop-blur-xl
        border border-white/10">

            <h2 class="text-3xl font-bold">
                Skills
            </h2>

        </a>

        <a href="/entrepreneurs"
        class="p-8 rounded-3xl
        bg-white/10 backdrop-blur-xl
        border border-white/10">

            <h2 class="text-3xl font-bold">
                Entrepreneur
            </h2>

        </a>

    </div>

</div>

<footer class="py-16 border-t border-white/10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-3 gap-10">

            <div>

                <h2 class="text-3xl font-black">
                    Dinsight
                </h2>

                <p class="text-gray-400 mt-4 leading-loose">

                    Modern Fullstack Developer Portfolio
                    using Laravel & TailwindCSS.

                </p>

            </div>

            <div>

                <h3 class="text-xl font-bold mb-4">
                    Social Media
                </h3>

                <div class="space-y-3">

                    <a href="https://instagram.com/bkndni"
                        target="_blank">
                        Instagram
                        </a>
<br><br>
                    <a href="https://github.com/Dindut0908"
                        target="_blank">
                        GitHub
                        </a>
<br><br>
                    <a href="https://wa.me/6283822443068"
                        target="_blank">
                         WhatsApp
                        </a>
                </div>

            </div>

            <div>

                <h3 class="text-xl font-bold mb-4">
                    Contact
                </h3>

                <p class="text-gray-400">
                    ddini6851@gmail.com
                </p>

            </div>

        </div>

        <div class="border-t border-white/10 mt-10 pt-6
        text-center text-gray-500">

            © 2026 Dinsight. All rights reserved.

        </div>

    </div>

</footer>

@endsection