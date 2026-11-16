@extends('admin.layouts.admin')

@section('title', 'Edit Skill')

@section('content')

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST"
        class="max-w-2xl space-y-5 p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-2">Nama Skill</label>
            <input type="text" name="title" value="{{ old('title', $skill->title) }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Class Icon</label>
            <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
            <div class="mt-2 flex items-center gap-2 text-sm text-slate-500">
                Preview: <i class="{{ $skill->icon }} text-xl text-cyan-500"></i>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Kategori</label>
            <select name="category" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
                @foreach(['Frontend','Backend','Database','Design','Tools','Soft Skill'] as $cat)
                    <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Persentase (%)</label>
            <input type="number" name="percentage" value="{{ old('percentage', $skill->percentage) }}"
                min="0" max="100" required
                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="px-6 py-3 rounded-xl bg-cyan-500 text-white font-bold hover:bg-cyan-600 transition">
                Update
            </button>
            <a href="{{ route('admin.skills.index') }}"
                class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-white/10 font-bold hover:bg-slate-300 transition">
                Batal
            </a>
        </div>

    </form>

@endsection