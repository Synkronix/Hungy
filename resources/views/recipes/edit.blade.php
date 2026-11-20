@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl font-semibold">Edit Resep</h1>
        <form action="{{ route('recipes.update', $recipe) }}" method="POST" class="mt-6 rounded-2xl border bg-white p-8 shadow-sm">
            @csrf @method('PUT')
            @include('recipes._form', ['recipe' => $recipe])
            <div class="mt-8 flex justify-end gap-3 border-t pt-6">
                <a href="{{ route('recipes.index') }}" class="rounded-xl border px-4 py-2.5 font-semibold text-slate-600">Batal</a>
                <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2.5 font-semibold text-white">Update Resep</button>
            </div>
        </form>
    </div>
@endsection
