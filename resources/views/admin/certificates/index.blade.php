@extends('admin.layouts.admin')

@section('title', 'Certificates')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.certificates.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl
            bg-cyan-500 text-white font-semibold hover:bg-cyan-600 transition">
            <i class="fa-solid fa-plus"></i> Tambah Sertifikat
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

        @forelse($certificates as $cert)
            <div class="rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 overflow-hidden">

                @if($cert->image)
                    <img src="{{ asset('storage/' . $cert->image) }}" alt=""
                        class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 flex items-center justify-center bg-slate-100 dark:bg-white/10 text-slate-400 text-5xl">
                        <i class="fa-solid fa-certificate"></i>
                    </div>
                @endif

                <div class="p-4">
                    <p class="text-xs text-cyan-500 font-semibold">{{ $cert->issuer }}</p>
                    <h3 class="font-bold mt-1 line-clamp-2">{{ $cert->name }}</h3>
                    <p class="text-xs text-slate-500 mt-1">
                        {{ $cert->issued_date->format('d M Y') }}
                    </p>

                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('admin.certificates.edit', $cert) }}"
                            class="flex-1 text-center px-3 py-1.5 rounded-lg bg-amber-500/10 text-amber-500 font-semibold hover:bg-amber-500 hover:text-white transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.certificates.destroy', $cert) }}"
                            method="POST" onsubmit="return confirm('Yakin hapus?')" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button class="w-full px-3 py-1.5 rounded-lg bg-red-500/10 text-red-500 font-semibold hover:bg-red-500 hover:text-white transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full p-10 text-center text-slate-400">
                Belum ada sertifikat.
            </div>
        @endforelse

    </div>

    <div class="mt-5">{{ $certificates->links() }}</div>

@endsection