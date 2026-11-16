@extends('admin.layouts.admin')

@section('title', 'Tambah Skill')

@section('content')

    <form action="{{ route('admin.skills.store') }}" method="POST"
        class="max-w-2xl space-y-5 p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-2">Nama Skill</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                placeholder="Contoh: Laravel"
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">
                Class Icon (Font Awesome)
            </label>
            <input type="text" name="icon" value="{{ old('icon', 'fa-solid fa-code') }}" required
                placeholder="fa-brands fa-laravel"
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
            <p class="text-xs text-slate-500 mt-1">
                Lihat daftar icon di
                <a href="https://fontawesome.com/icons" target="_blank"
                    class="text-cyan-500 hover:underline">fontawesome.com/icons</a>.
                Contoh: <code>fa-brands fa-html5</code>, <code>fa-brands fa-css3</code>,
                <code>fa-brands fa-js</code>, <code>fa-brands fa-laravel</code>.
            </p>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Kategori</label>
            <select name="category" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
                @foreach(['Frontend','Backend','Database','Design','Tools','Soft Skill'] as $cat)
                    <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Persentase Penguasaan (%)</label>
            <input type="number" name="percentage" value="{{ old('percentage', 80) }}"
                min="0" max="100" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="px-6 py-3 rounded-xl bg-cyan-500 text-white font-bold hover:bg-cyan-600 transition">
                Simpan
            </button>
            <a href="{{ route('admin.skills.index') }}"
                class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-white/10 font-bold hover:bg-slate-300 transition">
                Batal
            </a>
        </div>

    </form>

@endsection