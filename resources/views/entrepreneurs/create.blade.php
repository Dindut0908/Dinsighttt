@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-20 px-6 text-white">

    <h1 class="text-4xl font-bold mb-10">
        Tambah Entrepreneur
    </h1>

    <form action="{{ route('entrepreneurs.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf

        <input
            type="text"
            name="title"
            placeholder="Judul"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
        >

        <textarea
            name="description"
            placeholder="Deskripsi"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10 h-40"
        ></textarea>

        <input
            type="file"
            name="image"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
        >

        <button
            type="submit"
            class="px-8 py-4 bg-purple-600 rounded-2xl">

            Simpan

        </button>

    </form>

</div>

@endsection