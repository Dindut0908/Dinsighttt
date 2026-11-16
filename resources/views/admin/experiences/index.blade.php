@extends('admin.layouts.admin')

@section('title', 'Experiences')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.experiences.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl
            bg-cyan-500 text-white font-semibold hover:bg-cyan-600 transition">
            <i class="fa-solid fa-plus"></i> Tambah Experience
        </a>
    </div>

    <div class="rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 dark:bg-white/10 text-left">
                <tr>
                    <th class="p-4">Posisi</th>
                    <th class="p-4">Instansi</th>
                    <th class="p-4">Periode</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                    <tr class="border-t border-slate-200 dark:border-white/10">
                        <td class="p-4 font-bold">{{ $exp->position }}</td>
                        <td class="p-4">{{ $exp->organization }}</td>
                        <td class="p-4 text-slate-500">{{ $exp->period }}</td>
                        <td class="p-4">
                            @if($exp->is_active)
                                <span class="px-2 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-bold">Aktif</span>
                            @else
                                <span class="px-2 py-1 rounded-lg bg-slate-200 text-slate-600 text-xs font-bold">Draft</span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.experiences.edit', $exp) }}"
                                class="inline-block px-3 py-1.5 rounded-lg bg-amber-500/10 text-amber-500 font-semibold hover:bg-amber-500 hover:text-white transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.experiences.destroy', $exp) }}"
                                method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin hapus data ini?')">
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
                        <td colspan="5" class="p-10 text-center text-slate-400">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5">{{ $experiences->links() }}</div>

@endsection