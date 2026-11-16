@extends('admin.layouts.admin')

@section('title', 'Blogs / Artikel')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.blogs.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl
            bg-cyan-500 text-white font-semibold hover:bg-cyan-600 transition">
            <i class="fa-solid fa-plus"></i> Tulis Artikel
        </a>
    </div>

    <div class="rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 dark:bg-white/10 text-left">
                <tr>
                    <th class="p-4">Thumbnail</th>
                    <th class="p-4">Judul</th>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr class="border-t border-slate-200 dark:border-white/10">
                        <td class="p-4">
                            @if($blog->thumbnail)
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                    class="w-16 h-16 object-cover rounded-lg" alt="">
                            @else
                                <div class="w-16 h-16 bg-slate-200 dark:bg-white/10 rounded-lg flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="p-4 font-bold">{{ $blog->title }}</td>
                        <td class="p-4 text-slate-500">
                            {{ $blog->published_at?->format('d M Y') ?? '-' }}
                        </td>
                        <td class="p-4">
                            @if($blog->is_published)
                                <span class="px-2 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-bold">Publish</span>
                            @else
                                <span class="px-2 py-1 rounded-lg bg-slate-200 text-slate-600 text-xs font-bold">Draft</span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                                class="inline-block px-3 py-1.5 rounded-lg bg-amber-500/10 text-amber-500 font-semibold hover:bg-amber-500 hover:text-white transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}"
                                method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin hapus artikel ini?')">
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
                            Belum ada artikel.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5">{{ $blogs->links() }}</div>

@endsection