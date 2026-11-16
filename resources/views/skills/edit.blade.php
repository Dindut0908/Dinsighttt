@extends('layouts.app')

@section('content')

<section class="min-h-screen py-20">

    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-5xl font-black text-white mb-10">
            Edit Skill
        </h1>

        <form
            action="{{ route('skills.update', $skill->id) }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            {{-- NAMA SKILL --}}
            <input
                type="text"
                name="name"
                value="{{ $skill->name }}"
                placeholder="Nama Skill"
                class="w-full p-5 rounded-2xl
                bg-[#0f172a]
                border border-purple-500/20
                text-white">

            {{-- ICON --}}
            <input
                type="text"
                name="icon"
                value="{{ $skill->icon }}"
                placeholder="Contoh: fa-brands fa-laravel"
                class="w-full p-5 rounded-2xl
                bg-[#0f172a]
                border border-purple-500/20
                text-white">

            {{-- PREVIEW ICON --}}
            <div class="flex items-center gap-4">

                <div class="w-20 h-20 rounded-3xl
                bg-gradient-to-r from-purple-500 to-cyan-500
                flex items-center justify-center
                text-white text-4xl">

                    <i class="{{ $skill->icon }}"></i>

                </div>

                <div>

                    <h3 class="text-white text-2xl font-bold">
                        {{ $skill->name }}
                    </h3>

                    <p class="text-gray-400">
                        Professional Skill
                    </p>

                </div>

            </div>

            {{-- BUTTON --}}
            <button
                type="submit"
                class="px-8 py-4 rounded-2xl
                bg-yellow-400 text-black
                font-bold">

                Update Skill

            </button>

        </form>

    </div>

</section>

@endsection