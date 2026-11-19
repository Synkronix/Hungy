@extends('layouts.app')

@section('title', 'Catat Kalori — Hungy')

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('calories.index') }}"
           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 transition hover:text-blue-700">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Kembali
        </a>

        <div class="mt-4">
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Catat Kalori</h1>
            <p class="mt-1.5 text-sm text-slate-500">Pilih dari resep agar nutrisi terisi otomatis, atau isi manual bila makananmu tidak ada di daftar.</p>
        </div>

        <div class="mt-6 rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-8">
            <form action="{{ route('calories.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    @include('calories._form', ['log' => null])
                </div>

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('calories.index') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-900">
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/20">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Simpan Catatan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
