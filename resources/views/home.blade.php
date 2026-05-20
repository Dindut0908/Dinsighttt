@extends('layouts.app')

@section('content')

{{-- BACKGROUND --}}
<div class="fixed inset-0 -z-10 overflow-hidden">

    <div class="absolute top-0 left-0 w-[500px] h-[500px]
    bg-purple-500/20 rounded-full blur-[120px] animate-pulse"></div>

    <div class="absolute bottom-0 right-0 w-[500px] h-[500px]
    bg-cyan-500/20 rounded-full blur-[120px] animate-pulse"></div>

</div>

{{-- HERO --}}
<section id="home"
class="min-h-screen flex items-center relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

        {{-- LEFT --}}
        <div data-aos="fade-right">

            <span class="px-5 py-2 rounded-full
            border border-purple-500/30
            bg-purple-500/10
            text-purple-400 text-sm">

                Fullstack Developer

            </span>

            <h1 class="animated-gradient
            text-6xl lg:text-8xl
            font-black leading-tight mt-8">

                Hi, I'm
                <span>Dini</span>

            </h1>

            <p class="text-slate-600 dark:text-gray-300
            text-xl leading-relaxed mt-8 max-w-xl">

                Fullstack developer building modern digital experiences
                using Laravel, TailwindCSS, React, and modern technologies.

            </p>

            <div class="flex gap-5 mt-10 flex-wrap">

                <a href="#showcase"
                   class="px-8 py-4 rounded-full
                   bg-gradient-to-r from-purple-600 to-cyan-500
                   font-semibold text-white
                   hover:-translate-y-1
                   hover:shadow-[0_15px_40px_rgba(139,92,246,.35)]
                   transition duration-500">

                    My Projects

                </a>

                <a href="#contact"
                   class="px-8 py-4 rounded-full
                   border border-slate-300 dark:border-white/20
                   hover:border-cyan-400
                   hover:bg-cyan-400/10
                   transition duration-500">

                    Contact Me

                </a>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="flex justify-center items-center relative"
             data-aos="zoom-in">

            {{-- OUTER CIRCLE --}}
            <div class="absolute w-[520px] h-[520px]
            rounded-full border border-purple-500/20 animate-pulse"></div>

            <div class="absolute w-[420px] h-[420px]
            rounded-full border border-cyan-500/20"></div>

            {{-- GLOW --}}
            <div class="absolute w-[320px] h-[320px]
            bg-purple-500/20 blur-[120px] rounded-full"></div>

            {{-- IMAGE --}}
            <div class="relative w-[320px] h-[320px]
            rounded-full p-[5px]
            bg-gradient-to-r
            from-purple-500 via-cyan-400 to-blue-500">

                <div class="w-full h-full rounded-full
                overflow-hidden bg-black">

                    <img
                        src="{{ asset('img/image.jpg') }}"
                        alt="profile"
                        class="w-full h-full object-cover
                        object-center parallax-img"
                    >

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ABOUT --}}
<section id="about" class="py-32">

    <div class="max-w-7xl mx-auto px-6
    grid lg:grid-cols-2 gap-16 items-center">

        {{-- IMAGE --}}
        <div data-aos="fade-up">

            <img
                src="{{ asset('img/image2.jpeg') }}"
                alt="profile"
                class="rounded-[32px]
                border border-white/10
                shadow-2xl
                parallax-img"
            >

        </div>

        {{-- CONTENT --}}
        <div data-aos="fade-left">

            <h2 class="text-5xl font-black
            text-slate-900 dark:text-white">

                About
                <span class="text-purple-500">
                    Me
                </span>

            </h2>

            <p class="text-slate-600 dark:text-gray-300
            leading-loose text-lg mt-8">

                Saya adalah Fullstack Developer dan Entrepreneur
                yang fokus membangun website modern, cepat,
                dan profesional.

            </p>

            <p class="text-slate-500 dark:text-gray-400
            mt-6 leading-loose">

                Saya menggunakan Laravel, TailwindCSS, React,
                dan MySQL untuk membangun aplikasi modern.

            </p>

            {{-- INFO --}}
            <div class="mt-10 grid grid-cols-2 gap-6">

                <div class="glass modern-card p-6 rounded-3xl">

                    <h4 class="text-cyan-400 font-bold">
                        Email
                    </h4>

                    <p class="mt-2 text-slate-600 dark:text-gray-300">
                        dinsight@example.com
                    </p>

                </div>

                <div class="glass modern-card p-6 rounded-3xl">

                    <h4 class="text-cyan-400 font-bold">
                        Phone
                    </h4>

                    <p class="mt-2 text-slate-600 dark:text-gray-300">
                        +62 812 3456 7890
                    </p>

                </div>

                <div class="glass modern-card p-6 rounded-3xl">

                    <h4 class="text-cyan-400 font-bold">
                        Education
                    </h4>

                    <p class="mt-2 text-slate-600 dark:text-gray-300">
                        Information Technology
                    </p>

                </div>

                <div class="glass modern-card p-6 rounded-3xl">

                    <h4 class="text-cyan-400 font-bold">
                        Address
                    </h4>

                    <p class="mt-2 text-slate-600 dark:text-gray-300">
                        Indonesia
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- PROJECTS & SKILLS --}}
{{-- SHOWCASE --}}
<section id="showcase" class="py-32 overflow-hidden">

    <div class="max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="text-center mb-16">

            <h2 class="text-5xl font-black text-white">

                Projects &
                <span class="text-transparent bg-clip-text
                bg-gradient-to-r from-purple-500 to-cyan-500">

                    Skills

                </span>

            </h2>

        </div>

        {{-- BUTTON TAB --}}
        <div class="flex justify-center gap-6 mb-16">

            <button
                onclick="showSlide('projects')"
                class="px-8 py-4 rounded-2xl
                bg-purple-600 text-white"
            >
                Projects
            </button>

            <button
                onclick="showSlide('skills')"
                class="px-8 py-4 rounded-2xl
                bg-cyan-600 text-white"
            >
                Skills
            </button>

        </div>

        {{-- SLIDER --}}
        <div class="relative overflow-hidden">

            <div
                id="slider"
                class="flex transition-all duration-700"
            >

                {{-- PROJECT SLIDE --}}
                <div class="min-w-full">

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

                        @foreach ($projects as $project)

                        <div class="rounded-3xl overflow-hidden
                        bg-white/5 border border-white/10">

                            {{-- IMAGE --}}
                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                class="w-full h-60 object-cover"
                            >

                            {{-- CONTENT --}}
                            <div class="p-6">

                                <h3 class="text-2xl font-bold text-white">

                                    {{ $project->title }}

                                </h3>

                                <p class="text-gray-400 mt-4">

                                    {{ $project->description }}

                                </p>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>
                {{-- SKILL SLIDE --}}
                <div class="min-w-full">

                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                        @foreach ($skills as $skill)
                        <div
                            class="rounded-3xl p-10
                            bg-white/5 border border-white/10
                            text-center">

                            {{-- ICON --}}
                            <div
                                class="w-24 h-24 mx-auto rounded-3xl
                                bg-gradient-to-r
                                from-purple-500 to-cyan-500
                                flex items-center justify-center
                                text-white text-4xl">

                                <i class="{{ $skill->icon }}"></i>

                            </div>

                            {{-- TITLE --}}
                            <h3 class="mt-8 text-2xl
                            font-bold text-white">

                                {{ $skill->title }}

                            </h3>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- SLIDER SCRIPT --}}
<script>

function showSlide(type)
{
    const slider = document.getElementById('slider');

    if(type === 'projects')
    {
        slider.style.transform = 'translateX(0%)';
    }

    if(type === 'skills')
    {
        slider.style.transform = 'translateX(-100%)';
    }
}

</script>

{{-- ENTREPRENEUR --}}
<section id="entrepreneur" class="py-32 relative overflow-hidden">

    <div class="max-w-6xl mx-auto px-6">

        {{-- TITLE --}}
        <div class="text-center mb-24">

            <h2 class="text-5xl font-black
            text-slate-900 dark:text-white">

                My
                <span class="text-purple-500">
                    Entrepreneur
                </span>

            </h2>

        </div>

        {{-- TIMELINE --}}
        <div class="relative">

            {{-- CENTER LINE --}}
            <div class="absolute left-1/2 top-0
            -translate-x-1/2
            w-1 h-full
            bg-gradient-to-b
            from-purple-500
            to-cyan-500
            hidden md:block">
            </div>

            {{-- LOOP --}}
@forelse($entrepreneurs as $index => $entrepreneur)

<div class="relative mb-28">

    <div class="flex flex-col
    {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}
    items-center gap-14">

        {{-- CONTENT --}}
        <div class="w-full md:w-1/2">

            <div class="glass modern-card
            p-8 rounded-3xl">

                {{-- TITLE --}}
                <h3 class="text-3xl font-bold
                text-slate-900 dark:text-white">

                    {{ $entrepreneur->title }}

                </h3>

                {{-- SUBTITLE --}}
                <p class="text-cyan-400 mt-2 font-semibold">

                    Entrepreneur

                </p>

                {{-- DESCRIPTION --}}
                <p class="text-slate-500 dark:text-gray-400
                mt-4 leading-relaxed">

                    {{ $entrepreneur->description }}

                </p>

            </div>

        </div>

        {{-- IMAGE --}}
        <div class="w-full md:w-1/2 flex justify-center">

            <img
                src="{{ asset('storage/' . $entrepreneur->image) }}"
                alt="{{ $entrepreneur->title }}"
                class="w-80 rounded-3xl
                border border-white/10
                shadow-2xl
                hover:scale-105
                transition duration-500"
            >

        </div>

    </div>

    {{-- ICON TIMELINE --}}
    <div class="hidden md:flex absolute
    left-1/2 top-1/2
    -translate-x-1/2 -translate-y-1/2
    w-16 h-16 rounded-full
    bg-gradient-to-r
    from-purple-500 to-cyan-500
    items-center justify-center
    text-2xl shadow-xl">

        💼

    </div>

</div>

@empty

            <div class="text-center text-gray-400">

                Belum ada data entrepreneur

            </div>

            @endforelse

        </div>

    </div>

</section>

{{-- CONTACT --}}
<section id="contact"
class="py-32 bg-white/[0.02]">

    <div class="max-w-4xl mx-auto px-6">

        {{-- TITLE --}}
        <div class="text-center mb-16">

            <h2 class="text-5xl font-black
            text-slate-900 dark:text-white">

                Contact
                <span class="text-cyan-400">
                    Me
                </span>

            </h2>

            <p class="text-slate-500 dark:text-gray-400 mt-6">

                Let's build something amazing together.

            </p>

        </div>

        {{-- FORM --}}
        <form class="space-y-6">

            <div class="grid md:grid-cols-2 gap-6">

                <input
                    type="text"
                    placeholder="Your Name"
                    class="w-full
                    bg-white/60 dark:bg-white/5
                    border border-slate-200 dark:border-white/10
                    rounded-2xl px-6 py-4
                    outline-none
                    focus:border-cyan-400"
                >

                <input
                    type="email"
                    placeholder="Your Email"
                    class="w-full
                    bg-white/60 dark:bg-white/5
                    border border-slate-200 dark:border-white/10
                    rounded-2xl px-6 py-4
                    outline-none
                    focus:border-cyan-400"
                >

            </div>

            <textarea
                rows="6"
                placeholder="Your Message"
                class="w-full
                bg-white/60 dark:bg-white/5
                border border-slate-200 dark:border-white/10
                rounded-2xl px-6 py-4
                outline-none
                focus:border-cyan-400"
            ></textarea>

            <button
                class="px-10 py-4 rounded-full
                bg-gradient-to-r
                from-purple-600 to-cyan-500
                font-semibold text-white
                hover:scale-105
                transition duration-500">

                Send Message

            </button>

        </form>

    </div>

</section>

{{-- CURSOR --}}
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>

{{-- THEME TOGGLE --}}
<button id="theme-toggle"
class="fixed top-6 right-6 z-[999]
w-14 h-14 rounded-full
backdrop-blur-xl
border border-slate-300 dark:border-white/20
bg-white/70 dark:bg-white/10
shadow-xl
flex items-center justify-center
transition duration-500
hover:scale-110">

    🌙

</button>

<style>

html{
    scroll-behavior:smooth;
}

.custom-scroll::-webkit-scrollbar{
    height:8px;
}

.custom-scroll::-webkit-scrollbar-thumb{
    background:linear-gradient(to right,#8b5cf6,#06b6d4);
    border-radius:999px;
}

.glass{
    backdrop-filter:blur(20px);
}

body{
    transition:
    background .5s ease,
    color .5s ease;
}

#cursor-dot{
    width:8px;
    height:8px;
    background:#8b5cf6;
    border-radius:999px;
    position:fixed;
    pointer-events:none;
    z-index:9999;
    transform:translate(-50%,-50%);
}

#cursor-ring{
    width:42px;
    height:42px;
    border:1px solid rgba(139,92,246,.5);
    border-radius:999px;
    position:fixed;
    pointer-events:none;
    z-index:9998;
    transform:translate(-50%,-50%);
    transition:
    width .3s,
    height .3s,
    border .3s;
}

a:hover ~ #cursor-ring{
    width:70px;
    height:70px;
}

</style>

{{-- SCRIPT --}}
<script>

    // THEME
    const toggle = document.getElementById('theme-toggle');

    if(localStorage.theme === 'light'){

        document.documentElement.classList.remove('dark');
        toggle.innerHTML = '☀️';

    }else{

        document.documentElement.classList.add('dark');
        toggle.innerHTML = '🌙';

    }

    toggle.addEventListener('click', () => {

        document.documentElement.classList.toggle('dark');

        if(document.documentElement.classList.contains('dark')){

            localStorage.theme = 'dark';
            toggle.innerHTML = '🌙';

        }else{

            localStorage.theme = 'light';
            toggle.innerHTML = '☀️';

        }

    });

    // CURSOR
    const dot = document.getElementById('cursor-dot');
    const ring = document.getElementById('cursor-ring');

    let mouseX = 0;
    let mouseY = 0;

    let ringX = 0;
    let ringY = 0;

    document.addEventListener('mousemove', (e) => {

        mouseX = e.clientX;
        mouseY = e.clientY;

        dot.style.left = mouseX + 'px';
        dot.style.top = mouseY + 'px';

    });

    function animateCursor(){

        ringX += (mouseX - ringX) * 0.15;
        ringY += (mouseY - ringY) * 0.15;

        ring.style.left = ringX + 'px';
        ring.style.top = ringY + 'px';

        requestAnimationFrame(animateCursor);

    }

    animateCursor();

</script>
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