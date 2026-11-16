@extends('layouts.app')

@section('content')

{{-- =========================================================
    HOME / HERO
========================================================= --}}

<section id="home"
    class="relative min-h-screen flex items-center pt-28 pb-20 overflow-hidden">

    {{-- Background --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">

        {{-- Main Background --}}
        <div class="absolute inset-0
            bg-slate-50
            dark:bg-[#070B14]
            transition-colors duration-500">
        </div>

        {{-- Soft Glow --}}
        <div class="absolute -top-40 -left-40
            w-[450px] h-[450px]
            bg-cyan-400/10
            dark:bg-cyan-500/10
            rounded-full blur-[120px]">
        </div>

        <div class="absolute -bottom-40 -right-40
            w-[450px] h-[450px]
            bg-purple-400/10
            dark:bg-purple-500/10
            rounded-full blur-[120px]">
        </div>

        {{-- Grid --}}
        <div class="absolute inset-0 opacity-[0.025] dark:opacity-[0.04]"
            style="
                background-image:
                linear-gradient(to right, currentColor 1px, transparent 1px),
                linear-gradient(to bottom, currentColor 1px, transparent 1px);
                background-size: 70px 70px;
            ">
        </div>

    </div>


    <div class="max-w-7xl mx-auto px-6 w-full">

        <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-center">

            {{-- =================================================
                LEFT CONTENT
            ================================================= --}}

            <div data-aos="fade-right">

                {{-- Status --}}
                <div class="inline-flex items-center gap-3
                    px-4 py-2
                    rounded-full
                    bg-cyan-500/10
                    border border-cyan-500/20
                    text-cyan-600
                    dark:text-cyan-400
                    text-sm font-semibold">

                    <span class="w-2 h-2 rounded-full
                        bg-green-500 animate-pulse">
                    </span>

                    Siswa XII PPLG A

                </div>


                {{-- Greeting --}}
                <p class="mt-7
                    text-slate-500
                    dark:text-slate-400
                    text-lg">

                    Halo, saya

                </p>


                {{-- Name --}}
                <h1 class="mt-2
                    text-5xl sm:text-6xl lg:text-7xl
                    font-black
                    tracking-tight
                    text-slate-900
                    dark:text-white">

                    Dini<span class="text-cyan-500">.</span>

                </h1>


                {{-- Professional Identity --}}
                <h2 class="mt-5
                    text-2xl sm:text-3xl
                    font-bold
                    text-transparent
                    bg-clip-text
                    bg-gradient-to-r
                    from-cyan-500
                    to-purple-500">

                    Web Developer & UI/UX Designer

                </h2>


                {{-- Description --}}
                <p class="mt-7
                    max-w-2xl
                    text-slate-600
                    dark:text-slate-300
                    text-lg
                    leading-8">

                    Siswa kelas XII PPLG A dari
                    <strong class="text-slate-900 dark:text-white">
                        SMK Negeri 2 Banjarmasin
                    </strong>
                    yang memiliki minat dalam pengembangan website,
                    desain UI/UX, dan teknologi digital.

                </p>


                <p class="mt-4
                    max-w-2xl
                    text-slate-500
                    dark:text-slate-400
                    leading-7">

                    Saya senang mengubah ide menjadi website dan aplikasi
                    yang interaktif, fungsional, dan mudah digunakan.

                </p>


                {{-- =================================================
                    BUTTONS
                ================================================= --}}

                <div class="flex flex-wrap gap-4 mt-9">

                    {{-- Portfolio --}}
                    <a href="#showcase"
                        class="inline-flex items-center gap-2
                        px-6 py-3.5
                        rounded-xl
                        bg-slate-900
                        dark:bg-white
                        text-white
                        dark:text-slate-900
                        font-semibold
                        hover:-translate-y-1
                        hover:shadow-xl
                        transition duration-300">

                        <i class="fa-solid fa-folder-open"></i>

                        Lihat Portofolio

                    </a>


                    {{-- CV --}}
                    <a href="#cv"
                        class="inline-flex items-center gap-2
                        px-6 py-3.5
                        rounded-xl
                        border
                        border-slate-300
                        dark:border-white/20
                        bg-white/70
                        dark:bg-white/5
                        text-slate-800
                        dark:text-white
                        font-semibold
                        hover:border-cyan-500
                        hover:text-cyan-500
                        hover:-translate-y-1
                        transition duration-300">

                        <i class="fa-regular fa-file-lines"></i>

                        Lihat CV

                    </a>


                    {{-- Contact --}}
                    <a href="#contact"
                        class="inline-flex items-center gap-2
                        px-6 py-3.5
                        rounded-xl
                        border
                        border-cyan-500/30
                        bg-cyan-500/10
                        text-cyan-600
                        dark:text-cyan-400
                        font-semibold
                        hover:bg-cyan-500
                        hover:text-white
                        hover:-translate-y-1
                        transition duration-300">

                        <i class="fa-regular fa-paper-plane"></i>

                        Hubungi Saya

                    </a>

                </div>


                {{-- =================================================
                    MAIN SKILLS
                ================================================= --}}

                <div class="flex flex-wrap gap-3 mt-10">

                    <span class="skill-badge">
                        HTML
                    </span>

                    <span class="skill-badge">
                        CSS
                    </span>

                    <span class="skill-badge">
                        JavaScript
                    </span>

                    <span class="skill-badge">
                        PHP
                    </span>

                    <span class="skill-badge">
                        Laravel
                    </span>

                    <span class="skill-badge">
                        MySQL
                    </span>

                    <span class="skill-badge">
                        Tailwind CSS
                    </span>

                    <span class="skill-badge">
                        Figma
                    </span>

                </div>

            </div>


            {{-- =================================================
                RIGHT PROFILE
            ================================================= --}}

            <div class="relative flex justify-center"
                data-aos="zoom-in">

                {{-- Decorative Circle --}}
                <div class="absolute
                    w-[360px] h-[360px]
                    sm:w-[440px] sm:h-[440px]
                    rounded-full
                    border border-cyan-500/20
                    dark:border-cyan-400/20">
                </div>


                <div class="absolute
                    w-[300px] h-[300px]
                    sm:w-[380px] sm:h-[380px]
                    rounded-full
                    border border-purple-500/20
                    dark:border-purple-400/20
                    translate-x-5
                    translate-y-5">
                </div>


                {{-- Glow --}}
                <div class="absolute
                    w-[300px] h-[300px]
                    bg-cyan-500/10
                    dark:bg-cyan-500/15
                    rounded-full
                    blur-[100px]">
                </div>


                {{-- Profile Card --}}
                <div class="relative
                    w-[300px] h-[390px]
                    sm:w-[350px] sm:h-[450px]
                    rounded-[32px]
                    overflow-hidden
                    border
                    border-white/60
                    dark:border-white/10
                    bg-white/80
                    dark:bg-white/5
                    backdrop-blur-xl
                    shadow-2xl">

                    <img
                        src="{{ asset('storage/entrepreneurs/dini.png') }}"
                        alt="Foto Profil Dini"
                        class="w-full h-full object-cover"
                    >

                    {{-- Bottom Overlay --}}
                    <div class="absolute bottom-0 left-0 right-0
                        p-6
                        bg-gradient-to-t
                        from-black/80
                        via-black/30
                        to-transparent">

                        <p class="text-white/70 text-sm">
                            XII PPLG A
                        </p>

                        <h3 class="text-white text-2xl font-bold mt-1">
                            SMK Negeri 2 Banjarmasin
                        </h3>

                    </div>

                </div>


                {{-- Floating Card 1 --}}
                <div class="absolute
                    -left-2 sm:-left-10
                    top-16
                    px-4 py-3
                    rounded-2xl
                    bg-white
                    dark:bg-[#111827]
                    border border-slate-200
                    dark:border-white/10
                    shadow-xl
                    animate-float">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                            bg-cyan-500/10
                            flex items-center justify-center
                            text-cyan-500">

                            <i class="fa-solid fa-code"></i>

                        </div>

                        <div>

                            <p class="text-xs
                                text-slate-500
                                dark:text-slate-400">

                                Focus

                            </p>

                            <p class="font-bold
                                text-slate-900
                                dark:text-white">

                                Web Development

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Floating Card 2 --}}
                <div class="absolute
                    -right-2 sm:-right-10
                    bottom-20
                    px-4 py-3
                    rounded-2xl
                    bg-white
                    dark:bg-[#111827]
                    border border-slate-200
                    dark:border-white/10
                    shadow-xl
                    animate-float-delay">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                            bg-purple-500/10
                            flex items-center justify-center
                            text-purple-500">

                            <i class="fa-solid fa-pen-ruler"></i>

                        </div>

                        <div>

                            <p class="text-xs
                                text-slate-500
                                dark:text-slate-400">

                                Interest

                            </p>

                            <p class="font-bold
                                text-slate-900
                                dark:text-white">

                                UI / UX Design

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            QUICK INFO
        ================================================= --}}

        <div class="grid sm:grid-cols-2 lg:grid-cols-4
            gap-4 mt-20"
            data-aos="fade-up">

            <div class="info-card">

                <div class="info-icon">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>

                <div>
                    <p class="info-label">
                        Status
                    </p>

                    <p class="info-value">
                        Peserta Didik
                    </p>
                </div>

            </div>


            <div class="info-card">

                <div class="info-icon">
                    <i class="fa-solid fa-school"></i>
                </div>

                <div>
                    <p class="info-label">
                        Sekolah
                    </p>

                    <p class="info-value">
                        SMK Negeri 2 Banjarmasin
                    </p>
                </div>

            </div>


            <div class="info-card">

                <div class="info-icon">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>

                <div>
                    <p class="info-label">
                        Kompetensi
                    </p>

                    <p class="info-value">
                        PPLG
                    </p>
                </div>

            </div>


            <div class="info-card">

                <div class="info-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div>
                    <p class="info-label">
                        Location
                    </p>

                    <p class="info-value">
                        Banjarmasin
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    SHORT ABOUT PREVIEW
========================================================= --}}

<section id="about"
    class="py-24 relative">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- LEFT --}}
            <div data-aos="fade-right">

                <p class="section-label">
                    TENTANG SAYA
                </p>

                <h2 class="section-title">

                    Mengenal Saya
                    <span class="text-cyan-500">
                        Lebih Dekat
                    </span>

                </h2>

                <p class="mt-6
                    text-slate-600
                    dark:text-slate-300
                    leading-8">

                    Saya merupakan siswa
                    <strong class="text-slate-900 dark:text-white">
                        XII PPLG A
                    </strong>
                    yang tertarik pada dunia teknologi,
                    khususnya pengembangan website dan desain antarmuka.

                </p>

                <p class="mt-4
                    text-slate-500
                    dark:text-slate-400
                    leading-8">

                    Melalui berbagai tugas, projek sekolah,
                    kegiatan organisasi, dan pengalaman praktik,
                    saya terus mengembangkan kemampuan teknis
                    maupun kemampuan bekerja dalam tim.

                </p>

                <a href="#"
                    class="inline-flex items-center gap-2
                    mt-7
                    text-cyan-500
                    font-semibold
                    hover:gap-4
                    transition-all">

                    Selengkapnya tentang saya

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>


            {{-- RIGHT --}}
            <div class="grid grid-cols-2 gap-4"
                data-aos="fade-left">

                <div class="stat-card">

                    <div class="text-4xl font-black text-cyan-500">
                        PPLG
                    </div>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Kompetensi Keahlian
                    </p>

                </div>


                <div class="stat-card">

                    <div class="text-4xl font-black text-purple-500">
                        Web
                    </div>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Bidang yang Diminati
                    </p>

                </div>


                <div class="stat-card">

                    <div class="text-4xl font-black text-cyan-500">
                        UI/UX
                    </div>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Fokus Desain
                    </p>

                </div>


                <div class="stat-card">

                    <div class="text-4xl font-black text-purple-500">
                        Team
                    </div>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Collaboration
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    PROJECT & SKILLS
========================================================= --}}

<section id="project"
    class="py-28 relative">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto"
            data-aos="fade-up">

            <p class="section-label justify-center">
                PORTOFOLIO
            </p>

            <h2 class="section-title">
                Projek & Keahlian
            </h2>

            <p class="section-description">
                Beberapa hasil projek dan kemampuan yang saya
                kembangkan selama belajar di bidang PPLG.
            </p>

        </div>


        {{-- Tabs --}}
                {{-- Tabs --}}
        <div class="flex justify-center gap-3 mt-10 mb-12">
            <button onclick="showSlide('projects')" id="projectTab" class="tab-button active-tab">
                <i class="fa-solid fa-folder-open"></i>
                Projects
            </button>
            <button onclick="showSlide('skills')" id="skillTab" class="tab-button">
                <i class="fa-solid fa-code"></i>
                Skills
            </button>
        </div>

        {{-- =================================================
             SEARCH & FILTER PROJECT (BARU)
        ================================================= --}}
        <div id="projectFilterBar" class="max-w-5xl mx-auto mt-8 mb-12"
            data-aos="fade-up">

            {{-- Search Bar --}}
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass
                    absolute left-5 top-1/2 -translate-y-1/2
                    text-slate-400 pointer-events-none"></i>

                <input
                    type="text"
                    id="projectSearch"
                    placeholder="Cari project berdasarkan judul atau deskripsi..."
                    class="w-full
                        pl-12 pr-12 py-4
                        rounded-2xl
                        border border-slate-200
                        dark:border-white/10
                        bg-white
                        dark:bg-white/5
                        text-slate-900
                        dark:text-white
                        placeholder-slate-400
                        focus:border-cyan-500
                        focus:ring-4 focus:ring-cyan-500/10
                        outline-none
                        transition">

                {{-- Clear Button --}}
                <button
                    type="button"
                    id="clearSearch"
                    class="absolute right-4 top-1/2 -translate-y-1/2
                        w-8 h-8 rounded-full
                        hidden
                        items-center justify-center
                        text-slate-400
                        hover:bg-slate-100
                        dark:hover:bg-white/10
                        transition"
                    title="Hapus pencarian">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            {{-- Filter Buttons --}}
            <div class="flex flex-wrap justify-center gap-2 mt-5">
                <button onclick="filterProjects('all', this)" class="filter-btn active-filter">
                    <i class="fa-solid fa-layer-group"></i>
                    Semua
                </button>
                <button onclick="filterProjects('web', this)" class="filter-btn">
                    <i class="fa-solid fa-globe"></i>
                    Web
                </button>
                <button onclick="filterProjects('uiux', this)" class="filter-btn">
                    <i class="fa-solid fa-pen-ruler"></i>
                    UI/UX
                </button>
                <button onclick="filterProjects('laravel', this)" class="filter-btn">
                    <i class="fa-brands fa-laravel"></i>
                    Laravel
                </button>
                <button onclick="filterProjects('mobile', this)" class="filter-btn">
                    <i class="fa-solid fa-mobile-screen"></i>
                    Mobile
                </button>
            </div>

            {{-- Result Count --}}
            <p id="projectResultCount" class="text-center text-sm text-slate-500 mt-4"></p>

            {{-- Empty State (untuk search) --}}
            <div id="noProjectResult"
                class="hidden mt-8 text-center py-12
                    rounded-2xl border-2 border-dashed
                    border-slate-200 dark:border-white/10">

                <i class="fa-solid fa-magnifying-glass
                    text-4xl text-slate-300 dark:text-slate-600"></i>

                <p class="mt-4 text-slate-500 dark:text-slate-400 font-semibold">
                    Tidak ada project yang cocok
                </p>

                <p class="mt-1 text-sm text-slate-400">
                    Coba kata kunci lain atau reset filter.
                </p>

                <button onclick="resetProjectFilter()"
                    class="mt-5 px-5 py-2.5 rounded-xl
                        bg-cyan-500 text-white font-bold
                        hover:bg-cyan-600 transition">
                    Reset Filter
                </button>
            </div>
        </div>

        {{-- Slider --}}
        <div class="overflow-hidden">

            <div id="slider"
                class="flex transition-transform duration-700 ease-in-out">


                {{-- =================================================
                    PROJECTS
                ================================================= --}}

                <div class="min-w-full">

                    @if($projects->count())

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">

                                        @foreach($projects as $project)

                                @php
                                    // Auto-detect kategori dari judul & deskripsi
                                    $text = strtolower($project->title . ' ' . $project->description);
                                    $category = 'web'; // default
                                    if (str_contains($text, 'laravel')) {
                                        $category = 'laravel';
                                    } elseif (str_contains($text, 'ui') || str_contains($text, 'ux') || str_contains($text, 'design') || str_contains($text, 'figma')) {
                                        $category = 'uiux';
                                    } elseif (str_contains($text, 'mobile') || str_contains($text, 'android') || str_contains($text, 'flutter') || str_contains($text, 'ios')) {
                                        $category = 'mobile';
                                    }
                                @endphp

                                <div
                                    data-aos="fade-up"
                                    class="project-card project-item"
                                    data-title="{{ strtolower($project->title) }}"
                                    data-description="{{ strtolower($project->description) }}"
                                    data-category="{{ $category }}"
                                    data-id="{{ $project->id }}">

                                    {{-- Image --}}
                                    <div class="relative overflow-hidden">

                                        <img
                                            src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->title }}"
                                            class="w-full h-56 object-cover
                                            transition duration-700
                                            hover:scale-105">

                                        <div class="absolute inset-0
                                            bg-gradient-to-t
                                            from-black/50
                                            to-transparent
                                            opacity-0
                                            hover:opacity-100
                                            transition">
                                        </div>

                                    </div>


                                    {{-- Content --}}
                                    <div class="p-6">

                                        <h3 class="text-xl font-bold
                                            text-slate-900
                                            dark:text-white">

                                            {{ $project->title }}

                                        </h3>


                                        <p class="mt-3
                                            text-slate-500
                                            dark:text-slate-400
                                            leading-7
                                            line-clamp-3">

                                            {{ $project->description }}

                                        </p>


                                        <button
                                            onclick="openProjectModal({{ $project->id }})"
                                            class="mt-5
                                            inline-flex items-center gap-2
                                            text-cyan-500
                                            font-semibold
                                            hover:gap-3
                                            transition-all">

                                            Lihat Detail

                                            <i class="fa-solid fa-arrow-right"></i>

                                        </button>

                                    </div>

                                </div>


                                {{-- PROJECT MODAL --}}
                                <div
                                    id="projectModal{{ $project->id }}"
                                    class="fixed inset-0 z-[9999]
                                    hidden items-center justify-center
                                    bg-black/70
                                    backdrop-blur-md
                                    p-5">

                                    <div
                                        class="relative
                                        w-full max-w-3xl
                                        max-h-[90vh]
                                        overflow-y-auto
                                        rounded-3xl
                                        bg-white
                                        dark:bg-[#111827]
                                        shadow-2xl">

                                        {{-- Close --}}
                                        <button
                                            onclick="closeProjectModal({{ $project->id }})"
                                            class="absolute top-5 right-5 z-20
                                            w-11 h-11
                                            rounded-full
                                            bg-black/60
                                            text-white
                                            hover:bg-red-500
                                            transition">

                                            <i class="fa-solid fa-xmark"></i>

                                        </button>


                                        {{-- Image --}}
                                        <img
                                            src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->title }}"
                                            class="w-full h-72 object-cover">


                                        {{-- Content --}}
                                        <div class="p-7">

                                            <p class="text-sm text-cyan-500 font-semibold">
                                                PROJECT
                                            </p>

                                            <h3 class="mt-2
                                                text-3xl font-black
                                                text-slate-900
                                                dark:text-white">

                                                {{ $project->title }}

                                            </h3>

                                            <p class="mt-5
                                                text-slate-600
                                                dark:text-slate-300
                                                leading-8">

                                                {{ $project->description }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="empty-card">

                            <i class="fa-regular fa-folder-open text-4xl"></i>

                            <p class="mt-4">
                                Belum ada project yang ditambahkan.
                            </p>

                        </div>

                    @endif

                </div>



                {{-- =================================================
                    SKILLS
                ================================================= --}}

                <div class="min-w-full">

                    @if($skills->count())

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($skills as $skill)
        <div data-aos="zoom-in" class="skill-card">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 flex-shrink-0 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-500 text-2xl">
                    <i class="{{ $skill->icon }}"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                        {{ $skill->title }}
                    </h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        {{ $skill->category ?? 'Technical Skill' }}
                    </p>
                </div>
            </div>
            
            {{-- GRAFIK PERSENTASE --}}
            <div class="mt-5">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold text-slate-500">Penguasaan</span>
                    <span class="text-sm font-black text-cyan-500">{{ $skill->percentage }}%</span>
                </div>
                <div class="h-2.5 w-full rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-cyan-500 to-purple-500 skill-progress" style="width: 0%" data-width="{{ $skill->percentage }}"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>

                    @else

                        <div class="empty-card">

                            <i class="fa-solid fa-code text-4xl"></i>

                            <p class="mt-4">
                                Belum ada skill yang ditambahkan.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================================
    EXPERIENCE
========================================================= --}}
<section id="pengalaman" class="py-28">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center" data-aos="fade-up">
            <p class="section-label justify-center">EXPERIENCE</p>
            <h2 class="section-title">Pengalaman & Kegiatan</h2>
            <p class="section-description">Dokumentasi pengalaman, kegiatan, dan projek yang pernah saya jalani.</p>
        </div>

        <div class="mt-14 space-y-6">
            @forelse($experiences as $exp)
                <div data-aos="fade-up" class="experience-card">
                    <div class="flex flex-col md:flex-row gap-6">
                        @if($exp->image)
                            <div class="w-full md:w-48">
                                <img src="{{ asset('storage/' . $exp->image) }}" alt="{{ $exp->position }}" class="w-full h-36 object-cover rounded-2xl">
                            </div>
                        @endif
                        <div class="flex-1">
                            <p class="text-sm text-cyan-500 font-semibold">{{ $exp->period }}</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">{{ $exp->position }}</h3>
                            <p class="text-slate-500 font-medium mt-1">{{ $exp->organization }}</p>
                            <p class="mt-3 text-slate-600 dark:text-slate-300 leading-7">{{ $exp->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-card">Belum ada pengalaman yang ditambahkan.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- =========================================================
    CERTIFICATES
========================================================= --}}
<section id="sertifikat" class="py-28">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center" data-aos="fade-up">
            <p class="section-label justify-center">CERTIFICATES</p>
            <h2 class="section-title">Sertifikat</h2>
            <p class="section-description">Kumpulan sertifikat pelatihan, kompetisi, dan pencapaian yang saya raih.</p>
        </div>

        @if($certificates->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-14">
                @foreach($certificates as $cert)
                    <div data-aos="fade-up" class="project-card group">
                        <div class="relative overflow-hidden aspect-[4/3] bg-slate-100 dark:bg-white/5">
                                                        @if($cert->image)
                                <img src="{{ asset('storage/' . $cert->image) }}"
                                    alt="{{ $cert->name }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600 text-5xl">
                                    <i class="fa-solid fa-certificate"></i>
                                </div>
                            @endif

                        </div>

                        <div class="p-6">

                            <p class="text-xs text-cyan-500 font-bold tracking-wider uppercase mb-1">
                                {{ $cert->issuer }}
                            </p>

                            <h3 class="text-lg font-bold text-slate-900 dark:text-white line-clamp-2">
                                {{ $cert->name }}
                            </h3>

                            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                {{ $cert->issued_date->translatedFormat('d F Y') }}
                            </p>

                            @if($cert->credential_url)
                                <a href="{{ $cert->credential_url }}" target="_blank"
                                    class="mt-4 inline-flex items-center gap-1 text-sm text-cyan-500 font-semibold hover:gap-2 transition-all">
                                    Verifikasi
                                    <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                </a>
                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-card mt-14">
                Belum ada sertifikat yang ditambahkan.
            </div>

        @endif

    </div>

</section>



{{-- =========================================================
    BLOG (SECTION BARU)
========================================================= --}}

<section id="blog" class="py-28 bg-slate-50 dark:bg-white/[0.02]">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center" data-aos="fade-up">
            <p class="section-label justify-center">BLOG</p>
            <h2 class="section-title">Artikel Terbaru</h2>
            <p class="section-description">
                Catatan, tutorial, dan pemikiran seputar web development.
            </p>
        </div>

        @if($blogs->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7 mt-14">

                @foreach($blogs as $blog)

                    <article data-aos="fade-up" class="project-card group">

                        <div class="relative overflow-hidden aspect-[16/10] bg-slate-100 dark:bg-white/5">

                            @if($blog->thumbnail)
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300 text-4xl">
                                    <i class="fa-regular fa-image"></i>
                                </div>
                            @endif

                        </div>

                        <div class="p-6">

                            <p class="text-xs text-slate-500 mb-2">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                {{ $blog->published_at ? $blog->published_at->format('d M Y') : '-' }}
                            </p>

                            <h3 class="text-xl font-bold text-slate-900 dark:text-white line-clamp-2 group-hover:text-cyan-500 transition">
                                {{ $blog->title }}
                            </h3>

                            <p class="mt-3 text-sm text-slate-500 line-clamp-3">
                                {{ $blog->excerpt }}
                            </p>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-card mt-14">
                Belum ada artikel.
            </div>

        @endif

    </div>

</section>



{{-- =========================================================
    CV PREVIEW
========================================================= --}}

<section id="cv"
    class="py-24">

    <div class="max-w-5xl mx-auto px-6">

        <div class="rounded-[32px]
            bg-slate-900
            dark:bg-white/5
            border border-slate-800
            dark:border-white/10
            p-8 md:p-12
            text-white
            shadow-2xl"
            data-aos="fade-up">

            <div class="grid md:grid-cols-[1fr_auto]
                gap-8 items-center">

                <div>

                    <p class="text-cyan-400 font-semibold">
                        DIGITAL CV
                    </p>

                    <h2 class="mt-3
                        text-3xl md:text-4xl
                        font-black">

                        Curriculum Vitae

                    </h2>

                    <p class="mt-4
                        text-slate-300
                        leading-7
                        max-w-2xl">

                        Lihat informasi pendidikan, kemampuan,
                        pengalaman, projek, dan aktivitas saya
                        dalam CV digital.

                    </p>

                </div>


                <a href="{{ route('cv.download') }}"
    class="inline-flex items-center justify-center gap-2
    px-6 py-3.5
    rounded-xl
    bg-white
    text-slate-900
    font-bold
    hover:-translate-y-1
    transition">

    <i class="fa-solid fa-download"></i>

    Download CV

</a>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    CONTACT & GUESTBOOK (BAGIAN YANG DIUBAH)
========================================================= --}}

<section id="contact"
    class="py-28">

    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center"
            data-aos="fade-up">

            <p class="section-label justify-center">
                CONTACT
            </p>

            <h2 class="section-title">
                Hubungi Saya
            </h2>

            <p class="section-description">
                Punya pertanyaan, feedback, atau ingin mengetahui
                lebih lanjut tentang projek saya?
            </p>

        </div>


        <div class="grid md:grid-cols-3 gap-5 mt-12">

            {{-- EMAIL --}}
            <div class="contact-card">

                <div class="contact-icon">
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <p class="contact-label">
                    Email
                </p>

                <p class="contact-value">
                    ddini6851@gmail.com
                </p>

                <button
                    onclick="copyEmail()"
                    class="copy-button">

                    <i class="fa-regular fa-copy"></i>

                    Salin Email

                </button>

            </div>


            {{-- GITHUB --}}
            <a href="https://github.com/Dindut0908" target="_blank"
                class="contact-card group">

                <div class="contact-icon">
                    <i class="fa-brands fa-github"></i>
                </div>

                <p class="contact-label">
                    GitHub
                </p>

                <p class="contact-value">
                    GitHub Profile
                </p>

                <span class="text-cyan-500 text-sm mt-3 inline-block">
                    Buka profil
                    <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i>
                </span>

            </a>


            {{-- INSTAGRAM --}}
            <a href="https://instagram.com/din_webdeveloper" target="_blank"
                class="contact-card group">

                <div class="contact-icon">
                    <i class="fa-brands fa-instagram"></i>
                </div>

                <p class="contact-label">
                    Instagram
                </p>

                <p class="contact-value">
                    Instagram Profile
                </p>

                <span class="text-cyan-500 text-sm mt-3 inline-block">
                    Buka profil
                    <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i>
                </span>

            </a>

        </div>


        {{-- GUESTBOOK FORM --}}
        <div class="mt-10
            p-7 md:p-10
            rounded-3xl
            bg-white
            dark:bg-white/5
            border border-slate-200
            dark:border-white/10"
            data-aos="fade-up">

            <h3 class="text-2xl font-bold
                text-slate-900
                dark:text-white">

                Kesan & Pesan

            </h3>

            <p class="mt-2
                text-slate-500
                dark:text-slate-400">

                Berikan kesan, pesan, atau feedback untuk portofolio saya.

            </p>


            <form id="guestbookForm" class="mt-7 space-y-5">
                @csrf
                <div class="grid md:grid-cols-2 gap-5">

                    <input type="text" name="name" id="gb_name" placeholder="Nama" required class="form-input">
                    <input type="email" name="email" id="gb_email" placeholder="Email (opsional)" class="form-input">

                </div>


                <textarea name="message" id="gb_message" rows="5" placeholder="Tulis kesan dan pesan..." required class="form-input"></textarea>


                <button type="submit" id="gb_submit"
                    class="inline-flex items-center gap-2
                    px-7 py-3.5
                    rounded-xl
                    bg-slate-900
                    dark:bg-white
                    text-white
                    dark:text-slate-900
                    font-bold
                    hover:-translate-y-1
                    transition">

                    <i class="fa-regular fa-paper-plane"></i>
                    <span>Kirim Pesan</span>

                </button>
                <p id="gb_alert" class="text-sm font-semibold hidden"></p>
            </form>

            {{-- LIST PESAN REAL-TIME --}}
            <div class="mt-10 pt-8 border-t border-slate-200 dark:border-white/10">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-5">Pesan Terbaru</h3>
                <div id="guestbookList" class="space-y-4">
                    @foreach($guestbooks as $gb)
                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/5">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-600 flex items-center justify-center font-bold text-xs">
                                    {{ strtoupper(substr($gb->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-slate-900 dark:text-white">{{ $gb->name }}</p>
                                    <p class="text-xs text-slate-400">{{ $gb->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 text-sm">{{ $gb->message }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    BACK TO TOP
========================================================= --}}

<button
    id="backToTop"
    onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
    class="fixed
    bottom-6 right-6
    z-50
    w-12 h-12
    rounded-full
    bg-slate-900
    dark:bg-white
    text-white
    dark:text-slate-900
    shadow-xl
    hidden
    items-center justify-center
    hover:-translate-y-1
    transition">

    <i class="fa-solid fa-arrow-up"></i>

</button>



{{-- =========================================================
    TOAST
========================================================= --}}

<div id="copyToast"
    class="fixed
    bottom-6 left-1/2
    -translate-x-1/2
    z-[9999]
    hidden
    px-5 py-3
    rounded-xl
    bg-slate-900
    dark:bg-white
    text-white
    dark:text-slate-900
    shadow-xl">

    Email berhasil disalin.

</div>



{{-- =========================================================
    CSS
========================================================= --}}

<style>

    html {
        scroll-behavior: smooth;
    }


    /* SECTION */

    .section-label {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #06b6d4;
        font-size: .85rem;
        font-weight: 800;
        letter-spacing: .15em;
    }


    .section-title {
        margin-top: .75rem;
        font-size: 2.8rem;
        line-height: 1.1;
        font-weight: 900;
        color: #0f172a;
    }


    .dark .section-title {
        color: white;
    }


    .section-description {
        margin-top: 1rem;
        color: #64748b;
        line-height: 1.8;
        font-size: 1.05rem;
    }


    .dark .section-description {
        color: #94a3b8;
    }


    /* SKILL BADGE */

    .skill-badge {
        display: inline-flex;
        align-items: center;
        padding: .55rem .9rem;
        border-radius: 999px;
        border: 1px solid rgba(148,163,184,.25);
        background: rgba(255,255,255,.7);
        color: #475569;
        font-size: .8rem;
        font-weight: 700;
        transition: .3s ease;
    }


    .dark .skill-badge {
        background: rgba(255,255,255,.04);
        color: #cbd5e1;
        border-color: rgba(255,255,255,.1);
    }


    .skill-badge:hover {
        transform: translateY(-3px);
        border-color: #06b6d4;
        color: #06b6d4;
    }


    /* INFO CARD */

    .info-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.2rem;
        border-radius: 1.25rem;
        background: rgba(255,255,255,.75);
        border: 1px solid #e2e8f0;
        transition: .3s ease;
    }


    .dark .info-card {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.08);
    }


    .info-card:hover {
        transform: translateY(-4px);
        border-color: rgba(6,182,212,.5);
    }


    .info-icon {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        border-radius: 12px;
        background: rgba(6,182,212,.1);
        color: #06b6d4;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .info-label {
        font-size: .75rem;
        color: #94a3b8;
    }


    .info-value {
        margin-top: .2rem;
        font-size: .9rem;
        font-weight: 700;
        color: #0f172a;
    }


    .dark .info-value {
        color: white;
    }


    /* STAT */

    .stat-card {
        min-height: 150px;
        padding: 1.5rem;
        border-radius: 1.5rem;
        background: rgba(255,255,255,.75);
        border: 1px solid #e2e8f0;
        transition: .3s ease;
    }


    .dark .stat-card {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.08);
    }


    .stat-card:hover {
        transform: translateY(-5px);
    }


    /* PROJECT */

    .project-card {
        overflow: hidden;
        border-radius: 1.5rem;
        background: rgba(255,255,255,.8);
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 40px rgba(15,23,42,.05);
        transition: .4s ease;
    }


    .dark .project-card {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.08);
        box-shadow: none;
    }


    .project-card:hover {
        transform: translateY(-8px);
        border-color: rgba(6,182,212,.4);
        box-shadow: 0 25px 60px rgba(6,182,212,.08);
    }


    /* SKILL */

    .skill-card {
        padding: 1.75rem;
        border-radius: 1.5rem;
        background: rgba(255,255,255,.8);
        border: 1px solid #e2e8f0;
        transition: .4s ease;
    }


    .dark .skill-card {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.08);
    }


    .skill-card:hover {
        transform: translateY(-7px);
        border-color: rgba(6,182,212,.4);
    }

/* =========================
   PROJECT SEARCH & FILTER (BARU)
========================= */

.filter-btn {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    padding: .6rem 1.1rem;
    border-radius: 999px;
    border: 1px solid #e2e8f0;
    background: white;
    color: #64748b;
    font-size: .85rem;
    font-weight: 700;
    transition: .3s ease;
    cursor: pointer;
}

.dark .filter-btn {
    background: rgba(255,255,255,.04);
    border-color: rgba(255,255,255,.1);
    color: #94a3b8;
}

.filter-btn:hover {
    color: #06b6d4;
    border-color: #06b6d4;
    transform: translateY(-2px);
}

.active-filter {
    background: linear-gradient(135deg, #06b6d4, #8b5cf6) !important;
    color: white !important;
    border-color: transparent !important;
    box-shadow: 0 8px 20px rgba(6,182,212,.25);
}

/* State hidden untuk project item yang tidak cocok filter */
.project-item.is-hidden {
    display: none !important;
}

/* Animasi saat card muncul kembali setelah filter */
.project-item {
    animation: fadeInCard .35s ease;
}

@keyframes fadeInCard {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    /* TAB */

    .tab-button {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        padding: .8rem 1.2rem;
        border-radius: .9rem;
        border: 1px solid #e2e8f0;
        background: white;
        color: #64748b;
        font-weight: 700;
        transition: .3s ease;
    }


    .dark .tab-button {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.1);
        color: #94a3b8;
    }


    .tab-button:hover {
        color: #06b6d4;
        border-color: #06b6d4;
    }


    .active-tab {
        background: #0f172a !important;
        color: white !important;
        border-color: #0f172a !important;
    }


    .dark .active-tab {
        background: white !important;
        color: #0f172a !important;
        border-color: white !important;
    }


    /* EXPERIENCE */

    .experience-card {
        padding: 1.5rem;
        border-radius: 1.5rem;
        background: rgba(255,255,255,.8);
        border: 1px solid #e2e8f0;
        transition: .3s ease;
    }


    .dark .experience-card {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.08);
    }


    .experience-card:hover {
        transform: translateY(-5px);
        border-color: rgba(6,182,212,.4);
    }


    /* CONTACT */

    .contact-card {
        display: block;
        padding: 1.5rem;
        border-radius: 1.5rem;
        background: rgba(255,255,255,.8);
        border: 1px solid #e2e8f0;
        transition: .3s ease;
    }


    .dark .contact-card {
        background: rgba(255,255,255,.04);
        border-color: rgba(255,255,255,.08);
    }


    .contact-card:hover {
        transform: translateY(-5px);
        border-color: rgba(6,182,212,.4);
    }


    .contact-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: rgba(6,182,212,.1);
        color: #06b6d4;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }


    .contact-label {
        margin-top: 1rem;
        color: #94a3b8;
        font-size: .8rem;
    }


    .contact-value {
        margin-top: .25rem;
        font-weight: 700;
        color: #0f172a;
    }


    .dark .contact-value {
        color: white;
    }


    .copy-button {
        margin-top: 1rem;
        color: #06b6d4;
        font-size: .85rem;
        font-weight: 700;
    }


    /* FORM */

    .form-input {
        width: 100%;
        padding: .9rem 1rem;
        border-radius: .9rem;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #0f172a;
        outline: none;
        transition: .3s ease;
    }


    .dark .form-input {
        border-color: rgba(255,255,255,.1);
        background: rgba(255,255,255,.04);
        color: white;
    }


    .form-input:focus {
        border-color: #06b6d4;
        box-shadow: 0 0 0 3px rgba(6,182,212,.1);
    }


    /* EMPTY */

    .empty-card {
        padding: 4rem 2rem;
        text-align: center;
        border-radius: 1.5rem;
        border: 1px dashed #cbd5e1;
        color: #94a3b8;
    }


    .dark .empty-card {
        border-color: rgba(255,255,255,.1);
    }


    /* FLOATING */

    @keyframes float {

        0%,100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }

    }


    .animate-float {
        animation: float 4s ease-in-out infinite;
    }


    .animate-float-delay {
        animation: float 4s ease-in-out 1s infinite;
    }


    /* MOBILE */

    @media(max-width:768px) {

        .section-title {
            font-size: 2.2rem;
        }

    }

</style>



{{-- =========================================================
    JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =========================
       AOS
    ========================= */

    if (typeof AOS !== 'undefined') {

        AOS.init({
            duration: 800,
            once: true,
            offset: 80
        });

    }


    /* =========================
       PROJECT SLIDER
    ========================= */

    window.showSlide = function(type) {

        const slider =
            document.getElementById('slider');

        const projectTab =
            document.getElementById('projectTab');

        const skillTab =
            document.getElementById('skillTab');


        if (type === 'projects') {

            slider.style.transform =
                'translateX(0%)';

            projectTab.classList.add('active-tab');
            skillTab.classList.remove('active-tab');

        }


        if (type === 'skills') {

            slider.style.transform =
                'translateX(-100%)';

            skillTab.classList.add('active-tab');
            projectTab.classList.remove('active-tab');

        }

    };


    /* =========================
       PROJECT MODAL
    ========================= */

    window.openProjectModal = function(id) {

        const modal =
            document.getElementById('projectModal' + id);

        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.body.style.overflow = 'hidden';

    };


    window.closeProjectModal = function(id) {

        const modal =
            document.getElementById('projectModal' + id);

        if (!modal) return;

        modal.classList.remove('flex');
        modal.classList.add('hidden');

        document.body.style.overflow = '';

    };


    /* =========================
       CLOSE MODAL CLICK OUTSIDE
    ========================= */

    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('fixed')
            && e.target.id.startsWith('projectModal')) {

            const id =
                e.target.id.replace('projectModal', '');

            closeProjectModal(id);

        }

    });


    /* =========================
       COPY EMAIL
    ========================= */

    window.copyEmail = function() {

        const email =
            'ddini6851@gmail.com';

        navigator.clipboard.writeText(email)
            .then(function () {

                const toast =
                    document.getElementById('copyToast');

                toast.classList.remove('hidden');

                setTimeout(function () {

                    toast.classList.add('hidden');

                }, 2000);

            })
            .catch(function () {

                alert('Email: ' + email);

            });

    };


    /* =========================
       BACK TO TOP
    ========================= */

    const backToTop =
        document.getElementById('backToTop');


    window.addEventListener('scroll', function () {

        if (window.scrollY > 500) {

            backToTop.classList.remove('hidden');
            backToTop.classList.add('flex');

        } else {

            backToTop.classList.add('hidden');
            backToTop.classList.remove('flex');

        }

    });

        /* =========================
       PROJECT SEARCH & FILTER (BARU)
    ========================= */

    // State global filter
    window.projectState = {
        search: '',
        category: 'all'
    };

    // Ambil elemen-elemen penting
    const projectSearchInput = document.getElementById('projectSearch');
    const clearSearchBtn = document.getElementById('clearSearch');
    const projectResultCount = document.getElementById('projectResultCount');
    const noProjectResult = document.getElementById('noProjectResult');
    const projectFilterBar = document.getElementById('projectFilterBar');

    // Fungsi utama: apply filter ke semua project card
    window.applyProjectFilter = function () {
        const items = document.querySelectorAll('.project-item');
        const search = projectState.search.toLowerCase().trim();
        const category = projectState.category;

        let visibleCount = 0;

        items.forEach(item => {
            const title = item.dataset.title || '';
            const description = item.dataset.description || '';
            const itemCategory = item.dataset.category || '';

            // Cocokkan keyword pencarian
            const matchSearch = !search ||
                title.includes(search) ||
                description.includes(search);

            // Cocokkan kategori
            const matchCategory = category === 'all' ||
                itemCategory === category;

            if (matchSearch && matchCategory) {
                item.classList.remove('is-hidden');
                visibleCount++;
            } else {
                item.classList.add('is-hidden');
            }
        });

        // Update jumlah hasil
        if (projectResultCount) {
            if (search || category !== 'all') {
                projectResultCount.textContent =
                    `Menampilkan ${visibleCount} dari ${items.length} project`;
            } else {
                projectResultCount.textContent = '';
            }
        }

        // Toggle empty state
        if (noProjectResult) {
            if (visibleCount === 0) {
                noProjectResult.classList.remove('hidden');
            } else {
                noProjectResult.classList.add('hidden');
            }
        }

        // Toggle tombol clear (X) di search bar
        if (clearSearchBtn) {
            if (search.length > 0) {
                clearSearchBtn.classList.remove('hidden');
                clearSearchBtn.classList.add('flex');
            } else {
                clearSearchBtn.classList.add('hidden');
                clearSearchBtn.classList.remove('flex');
            }
        }
    };

    // Event: user mengetik di search bar (dengan debounce 200ms)
    if (projectSearchInput) {
        let searchTimeout;
        projectSearchInput.addEventListener('input', function (e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                projectState.search = e.target.value;
                window.applyProjectFilter();
            }, 200);
        });
    }

    // Event: klik tombol X untuk clear search
    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', function () {
            if (projectSearchInput) {
                projectSearchInput.value = '';
                projectState.search = '';
                window.applyProjectFilter();
                projectSearchInput.focus();
            }
        });
    }

    // Fungsi filter kategori (dipanggil dari tombol filter)
    window.filterProjects = function (category, btn) {
        projectState.category = category;

        // Update active button
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(b => b.classList.remove('active-filter'));
        if (btn) btn.classList.add('active-filter');

        window.applyProjectFilter();
    };

    // Fungsi reset semua filter (dipanggil dari empty state)
    window.resetProjectFilter = function () {
        projectState.search = '';
        projectState.category = 'all';

        if (projectSearchInput) projectSearchInput.value = '';

        // Reset active button ke "Semua" (tombol index 0)
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach((b, i) => {
            if (i === 0) b.classList.add('active-filter');
            else b.classList.remove('active-filter');
        });

        window.applyProjectFilter();
    };

    // Override showSlide agar filter bar hide saat tab Skills aktif
    const originalShowSlide = window.showSlide;
    window.showSlide = function (type) {
        if (originalShowSlide) originalShowSlide(type);

        if (projectFilterBar) {
            if (type === 'skills') {
                projectFilterBar.style.display = 'none';
            } else {
                projectFilterBar.style.display = 'block';
            }
        }
    };

    // Init: apply filter sekali saat halaman load
    window.applyProjectFilter();
    
    /* =========================
       ANIMASI PROGRESS BAR SKILL
    ========================= */
    const skillBars = document.querySelectorAll('.skill-progress');
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.width = entry.target.dataset.width + '%';
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });
    skillBars.forEach(bar => skillObserver.observe(bar));

    /* =========================
       AJAX GUESTBOOK (REAL-TIME)
    ========================= */
    const gbForm = document.getElementById('guestbookForm');
    if (gbForm) {
        gbForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btn = document.getElementById('gb_submit');
            const alertBox = document.getElementById('gb_alert');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
            btn.disabled = true;

            const formData = new FormData(gbForm);

            fetch("{{ route('guestbook.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alertBox.className = 'text-sm font-semibold text-green-500 mt-2 block';
                    alertBox.textContent = data.message;
                    
                    const newMessage = `
                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/5">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-600 flex items-center justify-center font-bold text-xs">
                                    ${data.data.name.charAt(0).toUpperCase()}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-slate-900 dark:text-white">${data.data.name}</p>
                                    <p class="text-xs text-slate-400">${data.data.created_at}</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 text-sm">${data.data.message}</p>
                        </div>
                    `;
                    
                    const list = document.getElementById('guestbookList');
                    list.insertAdjacentHTML('afterbegin', newMessage);
                    gbForm.reset();
                    
                    setTimeout(() => { alertBox.classList.add('hidden'); }, 3000);
                }
            })
            .catch(err => {
                alertBox.className = 'text-sm font-semibold text-red-500 mt-2 block';
                alertBox.textContent = 'Terjadi kesalahan sistem.';
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        });
    }

});

</script>



{{-- =========================================================
    AOS
========================================================= --}}

<link
    rel="stylesheet"
    href="https://unpkg.com/aos@2.3.4/dist/aos.css">


<script
    src="https://unpkg.com/aos@2.3.4/dist/aos.js">
</script>


@endsection