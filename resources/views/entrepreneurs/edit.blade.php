@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#020617] text-white py-20 px-6">

    <div class="max-w-3xl mx-auto">

        <h1 class="text-5xl font-black mb-10">
            Edit Entrepreneur
        </h1>

        <form
            action="{{ route('entrepreneurs.update', $entrepreneur->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf
            @method('PUT')

            {{-- TITLE --}}
            <input
                <input type="text"
       name="title"
       value="{{ $entrepreneur->title }}"
                placeholder="Nama Entrepreneur" class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
            >

            {{-- DESCRIPTION --}}
            <textarea
                name="description"
                rows="5"
                placeholder="Deskripsi"
                class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
            >{{ $entrepreneur->description }}</textarea>

            {{-- IMAGE --}}
            <input
                type="file"
                name="image"
                class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
            >

            {{-- OLD IMAGE --}}
            @if($entrepreneur->image)

                <img
                    src="{{ asset('storage/' . $entrepreneur->image) }}"
                    class="w-40 rounded-2xl"
                >

            @endif

            {{-- BUTTON --}}
            <button
                type="submit"
                class="px-8 py-4 rounded-2xl bg-yellow-500 font-bold">
                Update Entrepreneur
            </button>

        </form>

    </div>

</div>

@endsection