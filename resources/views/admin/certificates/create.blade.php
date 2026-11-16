@extends('admin.layouts.admin')

@section('title', 'Tambah Sertifikat')

@section('content')

    <form action="{{ route('admin.certificates.store') }}" method="POST"
        enctype="multipart/form-data"
        class="max-w-3xl space-y-5 p-6 rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10">
        @csrf
        @include('admin.certificates._form')

        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="px-6 py-3 rounded-xl bg-cyan-500 text-white font-bold hover:bg-cyan-600 transition">
                Simpan
            </button>
            <a href="{{ route('admin.certificates.index') }}"
                class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-white/10 font-bold hover:bg-slate-300 transition">
                Batal
            </a>
        </div>
    </form>

@endsection