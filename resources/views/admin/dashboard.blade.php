@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <a href="{{ route('admin.projects.index') }}" class="block p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 hover:border-cyan-500 transition group">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-2xl group-hover:scale-110 transition"><i class="fa-solid fa-rocket"></i></div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Projects</h3>
                    <p class="text-sm text-slate-500">Total: {{ \App\Models\Project::count() }}</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.skills.index') }}" class="block p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 hover:border-cyan-500 transition group">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-purple-500/10 text-purple-500 flex items-center justify-center text-2xl group-hover:scale-110 transition"><i class="fa-solid fa-lightbulb"></i></div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Skills</h3>
                    <p class="text-sm text-slate-500">Total: {{ \App\Models\Skill::count() }}</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.experiences.index') }}" class="block p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 hover:border-cyan-500 transition group">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center text-2xl group-hover:scale-110 transition"><i class="fa-solid fa-briefcase"></i></div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Experiences</h3>
                    <p class="text-sm text-slate-500">Total: {{ \App\Models\Experience::count() }}</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.certificates.index') }}" class="block p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 hover:border-cyan-500 transition group">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-green-500/10 text-green-500 flex items-center justify-center text-2xl group-hover:scale-110 transition"><i class="fa-solid fa-certificate"></i></div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Certificates</h3>
                    <p class="text-sm text-slate-500">Total: {{ \App\Models\Certificate::count() }}</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.blogs.index') }}" class="block p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 hover:border-cyan-500 transition group">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-pink-500/10 text-pink-500 flex items-center justify-center text-2xl group-hover:scale-110 transition"><i class="fa-solid fa-newspaper"></i></div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Blogs</h3>
                    <p class="text-sm text-slate-500">Total: {{ \App\Models\Blog::count() }}</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.guestbooks.index') }}" class="block p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 hover:border-cyan-500 transition group">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center text-2xl group-hover:scale-110 transition"><i class="fa-solid fa-comments"></i></div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Guestbook</h3>
                    <p class="text-sm text-slate-500">Total: {{ \App\Models\Guestbook::count() }}</p>
                </div>
            </div>
        </a>
    </div>

        {{-- Kotak Upload CV --}}
    <div class="mt-8 p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center text-xl">
                <i class="fa-solid fa-file-pdf"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Curriculum Vitae (PDF)</h3>
                <p class="text-sm text-slate-500">Unggah file CV terbaru Anda dalam format PDF.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.cv.upload') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
            @csrf
            <input type="file" name="cv_file" accept="application/pdf" required
                class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2.5 file:px-4
                file:rounded-xl file:border-0
                file:text-sm file:font-semibold
                file:bg-cyan-50 file:text-cyan-700
                hover:file:bg-cyan-100 dark:file:bg-white/10 dark:file:text-white transition">
            
            <button type="submit"
                class="px-6 py-2.5 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold hover:-translate-y-0.5 transition whitespace-nowrap">
                Upload CV
            </button>
        </form>
    </div>

@endsection