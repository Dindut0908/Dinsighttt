@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-20 px-6 text-white">

    <h1 class="text-4xl font-bold mb-10">
        Edit Skill
    </h1>

    <form action="{{ route('skills.update', $skill->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <input
            type="text"
            name="name"
            value="{{ $skill->name }}"
            placeholder="Nama Skill"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
        >

        {{-- IMAGE --}}
        <input
            type="file"
            name="image"
            class="w-full p-4 rounded-2xl bg-slate-900 border border-white/10"
        >

        {{-- OLD IMAGE --}}
        @if($skill->image)

            <img
                src="{{ asset('storage/' . $skill->image) }}"
                class="w-40 rounded-2xl"
            >

        @endif

        {{-- BUTTON --}}
        <button
            class="px-8 py-4 rounded-2xl bg-yellow-500">

            Update Skill

        </button>

    </form>

</div>

@endsection