@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl font-semibold">Tambah Resep Baru</h1>
        <form action="{{ route('recipes.store') }}" method="POST" class="mt-6 rounded-2xl border bg-white p-8 shadow-sm">
            @csrf
            @include('recipes._form')
            <div class="mt-8 flex justify-end gap-3 border-t pt-6">
                <a href="{{ route('recipes.index') }}" class="rounded-xl border px-4 py-2.5 font-semibold text-slate-600">Batal</a>
                <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2.5 font-semibold text-white">Simpan Resep</button>
            </div>
        </form>
    </div>
@endsection
