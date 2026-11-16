@extends('layouts.app')

@section('content')

<section class="min-h-screen py-20">

    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-5xl font-black text-white mb-10">
            Edit Project
        </h1>

        <form
            action="{{ route('projects.update', $project->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf
            @method('PUT')

            {{-- TITLE --}}
            <input
                type="text"
                name="title"
                value="{{ $project->title }}"
                placeholder="Nama Project"
                class="w-full p-5 rounded-2xl
                bg-[#0f172a]
                border border-purple-500/20
                text-white">

            {{-- DESCRIPTION --}}
            <textarea
                name="description"
                rows="5"
                placeholder="Deskripsi project..."
                class="w-full p-5 rounded-2xl
                bg-[#0f172a]
                border border-purple-500/20
                text-white">{{ $project->description }}</textarea>

            {{-- IMAGE --}}
            <input
                type="file"
                name="image"
                class="w-full p-5 rounded-2xl
                bg-[#0f172a]
                border border-purple-500/20
                text-white">

            {{-- PREVIEW --}}
            <img
                src="{{ asset('storage/' . $project->image) }}"
                class="w-52 rounded-2xl shadow-xl">

            {{-- BUTTON --}}
            <button
                type="submit"
                class="px-8 py-4 rounded-2xl
                bg-yellow-400 text-black
                font-bold">

                Update Project

            </button>

        </form>

    </div>

</section>

@endsection