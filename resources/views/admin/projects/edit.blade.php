@extends('admin.layouts.admin')

@section('title', 'Edit Project')

@section('content')

    <form action="{{ route('admin.projects.update', $project) }}" method="POST"
        enctype="multipart/form-data"
        class="max-w-3xl space-y-5 p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-2">Judul Project</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Deskripsi</label>
            <textarea name="description" rows="5" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $project->image) }}" alt=""
                class="w-40 h-40 object-cover rounded-xl mb-2">
            <input type="file" name="image" accept="image/*"
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">
            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin ganti gambar</p>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold mb-2">Link Demo</label>
                <input type="url" name="demo_link" value="{{ old('demo_link', $project->demo_link) }}"
                    class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Link Repo</label>
                <input type="url" name="repo_link" value="{{ old('repo_link', $project->repo_link) }}"
                    class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Tech Stack</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="px-6 py-3 rounded-xl bg-cyan-500 text-white font-bold hover:bg-cyan-600 transition">
                Update
            </button>
            <a href="{{ route('admin.projects.index') }}"
                class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-white/10 font-bold hover:bg-slate-300 transition">
                Batal
            </a>
        </div>

    </form>

@endsection