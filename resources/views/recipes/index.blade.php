@extends('layouts.app')
@section('title', 'Resep Makanan — Hungy')
@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Resep Makanan</h1>
            <p class="mt-1.5 text-sm text-slate-500">Daftar resep dari database.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('calories.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50">
                Kembali
            </a>
            <a href="{{ route('recipes.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                Tambah Resep
            </a>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($recipes as $r)
        <div class="flex flex-col justify-between rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm">
            <div>
                <div class="flex items-start justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">{{ $r->name }}</h3>
                    <span class="rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700">{{ $r->calories }} kkal</span>
                </div>
                <p class="mt-2 text-sm text-slate-500">{{ $r->description }}</p>
                <div class="mt-4 flex flex-wrap gap-1.5 text-xs font-medium">
                    <span class="rounded-md bg-sky-50 px-2 py-1 text-sky-700">P: {{ $r->protein }}g</span>
                    <span class="rounded-md bg-amber-50 px-2 py-1 text-amber-700">K: {{ $r->carbs }}g</span>
                    <span class="rounded-md bg-orange-50 px-2 py-1 text-orange-700">L: {{ $r->fat }}g</span>
                </div>
            </div>
            <div class="mt-6 flex justify-between border-t pt-4">
                <a href="{{ route('recipes.edit', $r) }}" class="text-sm text-blue-600">Edit</a>
                <form action="{{ route('recipes.destroy', $r) }}" method="POST" onsubmit="return confirm('Hapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-sm text-rose-600">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
