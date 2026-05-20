@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center px-6">

    <form method="POST" action="/login"
    class="w-full max-w-md
    bg-white/10 backdrop-blur-xl
    border border-white/10
    rounded-[32px]
    p-10 shadow-2xl">

    <form
        action="/login"
        method="POST"
        class="bg-zinc-900 p-10 rounded-3xl w-[400px] border border-white/10"
    >

        @csrf

        <h1 class="text-3xl text-white font-bold mb-8">
            Login
        </h1>

        {{-- EMAIL --}}
        <div class="mb-5">

            <label class="text-white block mb-2">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="w-full p-4 rounded-xl bg-zinc-800 text-white"
            >

        </div>

        {{-- PASSWORD --}}
        <div class="mb-5">

            <label class="text-white block mb-2">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="w-full p-4 rounded-xl bg-zinc-800 text-white"
            >

        </div>

        {{-- ERROR --}}
        @error('email')

            <div class="text-red-500 mb-4">
                {{ $message }}
            </div>

        @enderror

        <button
            class="w-full bg-purple-600 hover:bg-purple-700 transition text-white py-4 rounded-xl"
        >
            Login
        </button>

    </form>

</div>

@endsection