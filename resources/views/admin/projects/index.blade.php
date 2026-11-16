@extends('admin.layouts.admin')

@section('title', 'Projects')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.projects.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl
            bg-cyan-500 text-white font-semibold hover:bg-cyan-600 transition">
            <i class="fa-solid fa-plus"></i> Tambah Project
        </a>
    </div>

    <div class="rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 dark:bg-white/10 text-left">
                <tr>
                    <th class="p-4">Gambar</th>
                    <th class="p-4">Judul</th>
                    <th class="p-4">Tech Stack</th>
                    <th class="p-4">Demo</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr class="border-t border-slate-200 dark:border-white/10">
                        <td class="p-4">
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-16 h-16 object-cover rounded-lg">
                        </td>
                        <td class="p-4 font-bold">{{ $project->title }}</td>
                        <td class="p-4 text-slate-500">{{ $project->tech_stack ?? '-' }}</td>
                        <td class="p-4">
                            @if($project->demo_link)
                                <a href="{{ $project->demo_link }}" target="_blank"
                                    class="text-cyan-500 hover:underline">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Buka
                                </a>
                            @else
                                <span class="text-slate-400">-</span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="inline-block px-3 py-1.5 rounded-lg bg-amber-500/10 text-amber-500 font-semibold hover:bg-amber-500 hover:text-white transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}"
                                method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin hapus project ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1.5 rounded-lg bg-red-500/10 text-red-500 font-semibold hover:bg-red-500 hover:text-white transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-10 text-center text-slate-400">
                            Belum ada project.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5">{{ $projects->links() }}</div>

@endsection