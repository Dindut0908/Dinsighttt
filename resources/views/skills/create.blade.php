@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-20 px-6 text-white">

    <h1 class="text-4xl font-bold mb-10">
        Tambah Skill
    </h1>

    <form
        action="{{ route('skills.store') }}"
        method="POST"
        class="space-y-6">

        @csrf

        <input
            type="text"
            name="name"
            placeholder="Nama Skill"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
        >

        <input
            type="text"
            name="icon"
            placeholder="Contoh: fa-brands fa-laravel"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
        >

        <button
            class="px-8 py-4 rounded-2xl bg-purple-600">

            Simpan

        </button>

    </form>

</div>

@endsection