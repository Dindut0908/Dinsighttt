@extends('admin.layouts.admin')

@section('title', 'Guestbook')

@section('content')

    <div class="space-y-4">

        @forelse($guestbooks as $gb)
            <div class="p-5 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">

                <div class="flex items-start justify-between gap-4">

                    <div class="flex-1">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-cyan-500/10 text-cyan-500 flex items-center justify-center font-bold">
                                {{ strtoupper(substr($gb->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold">{{ $gb->name }}</p>
                                <p class="text-xs text-slate-500">
                                    {{ $gb->email ?? 'email tidak diisi' }}
                                    • {{ $gb->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <p class="mt-3 text-slate-700 dark:text-slate-300">
                            {{ $gb->message }}
                        </p>

                        @if(!$gb->is_approved)
                            <p class="mt-2 text-xs text-amber-500 font-semibold">
                                <i class="fa-solid fa-clock mr-1"></i>
                                Menunggu persetujuan
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-col gap-2">
                        @if(!$gb->is_approved)
                            <form action="{{ route('admin.guestbooks.approve', $gb) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="px-3 py-1.5 rounded-lg bg-green-500/10 text-green-600 font-semibold text-sm hover:bg-green-500 hover:text-white transition">
                                    Setujui
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('admin.guestbooks.destroy', $gb) }}"
                            method="POST" onsubmit="return confirm('Yakin hapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1.5 rounded-lg bg-red-500/10 text-red-500 font-semibold text-sm hover:bg-red-500 hover:text-white transition">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        @empty
            <div class="p-10 text-center text-slate-400 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">
                Belum ada pesan dari pengunjung.
            </div>
        @endforelse

    </div>

    <div class="mt-5">{{ $guestbooks->links() }}</div>

@endsection