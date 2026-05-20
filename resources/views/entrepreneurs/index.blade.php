@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-20 px-6 text-white">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-10">

        <h1 class="text-4xl font-bold">
            Entrepreneur
        </h1>

        <a href="{{ route('entrepreneurs.create') }}"
           class="px-6 py-3 bg-purple-600 rounded-xl
           hover:bg-purple-700 transition">

            Tambah Entrepreneur

        </a>

    </div>

    {{-- LIST PROJECT --}}
    <div class="grid md:grid-cols-3 gap-8">

        @forelse($entrepreneurs as $entrepreneur)

        <div class="bg-slate-900 p-6 rounded-3xl
        border border-white/10
        shadow-xl hover:-translate-y-2
        transition duration-300">

            {{-- IMAGE --}}
            @if($entrepreneur->image)

            <img
                src="{{ asset('storage/' . $entrepreneur->image) }}"
                class="w-full h-52 object-cover rounded-2xl">

            @endif

            {{-- TITLE --}}
            <h2 class="text-2xl font-bold mt-5">
                {{ $entrepreneur->title }}
            </h2>

            {{-- ACTION --}}
            <div class="flex gap-3 mt-6">

                {{-- EDIT --}}
                <a href="{{ route('entrepreneurs.edit', $entrepreneur->id) }}"
                   class="px-4 py-2 rounded-xl
                   bg-cyan-500 hover:bg-cyan-600
                   transition text-white">

                    Edit

                </a>

                {{-- DELETE --}}
                <form action="{{ route('entrepreneurs.destroy', $entrepreneur->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        onclick="return confirm('Yakin ingin menghapus entrepreneur ini?')"
                        class="px-4 py-2 rounded-xl
                        bg-red-500 hover:bg-red-600
                        transition text-white">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="text-gray-400 text-lg">

            Belum ada data entrepreneur

        </div>

        @endforelse

    </div>

</div>

@endsection