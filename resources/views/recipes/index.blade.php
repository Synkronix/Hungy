@extends('layouts.app')

@section('title', 'Resep Hungy — Rekomendasi Makanan')

@section('content')
    @php
        $formatMacro = function ($value) {
            return rtrim(rtrim(number_format((float) $value, 1, ',', '.'), '0'), ',');
        };
    @endphp

    <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 ring-1 ring-inset ring-blue-100">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-.673 0-1.33.075-1.96.217a.75.75 0 0 0-.59.734v14.25a.75.75 0 0 0 .964.725 9.03 9.03 0 0 1 2.336-.31 8.967 8.967 0 0 1 5.25 1.75 8.967 8.967 0 0 1 5.25-1.75c.81 0 1.597.108 2.336.31a.75.75 0 0 0 .964-.725V4.701a.75.75 0 0 0-.59-.734A9.045 9.045 0 0 0 18 3.75a8.967 8.967 0 0 0-6 2.292Z" />
                </svg>
                Resep Hungy
            </span>
            <h1 class="mt-3 text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                Masak enak, catat gampang.
            </h1>
            <p class="mt-1.5 max-w-2xl text-sm text-slate-500">
                Pilih resep yang kamu masak hari ini. Kalori dan nutrisinya sudah dihitung per porsi,
                jadi kamu cukup sekali klik untuk mencatatnya.
            </p>
        </div>
    </div>

    <div class="mt-6 flex flex-wrap items-center gap-2">
        <a href="{{ route('recipes.index') }}"
           class="rounded-full px-3.5 py-1.5 text-sm font-medium transition {{ $meal ? 'border border-slate-200 bg-white text-slate-600 hover:border-blue-200 hover:text-blue-700' : 'bg-blue-600 text-white shadow-sm shadow-blue-600/20' }}">
            Semua
        </a>
        @foreach ($mealTypes as $type)
            <a href="{{ route('recipes.index', ['meal' => $type]) }}"
               class="rounded-full px-3.5 py-1.5 text-sm font-medium transition {{ $meal === $type ? 'bg-blue-600 text-white shadow-sm shadow-blue-600/20' : 'border border-slate-200 bg-white text-slate-600 hover:border-blue-200 hover:text-blue-700' }}">
                {{ $type }}
            </a>
        @endforeach
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($recipes as $recipe)
            <article class="flex flex-col rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition hover:border-blue-200 hover:shadow-md">
                <div class="flex items-start justify-between gap-3">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-blue-50 to-sky-50 text-2xl ring-1 ring-inset ring-blue-100/70" aria-hidden="true">
                        {{ $recipe['emoji'] }}
                    </span>
                    <span class="rounded-full bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-500 ring-1 ring-inset ring-slate-200/70">
                        {{ $recipe['meal_type'] }}
                    </span>
                </div>

                <h2 class="mt-4 text-base font-semibold text-slate-900">{{ $recipe['name'] }}</h2>
                <p class="mt-1 line-clamp-2 text-sm leading-relaxed text-slate-500">{{ $recipe['description'] }}</p>
                <p class="mt-2 text-xs font-medium text-blue-600">{{ $recipe['serving'] }}</p>

                <dl class="mt-4 grid grid-cols-4 gap-2 rounded-xl bg-slate-50/80 px-3 py-2.5 ring-1 ring-inset ring-slate-100">
                    <div>
                        <dt class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Kalori</dt>
                        <dd class="mt-0.5 text-sm font-semibold text-slate-900">{{ number_format($recipe['calories'], 0, ',', '.') }}<span class="ml-0.5 text-[10px] font-medium text-slate-400">kkal</span></dd>
                    </div>
                    <div>
                        <dt class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Protein</dt>
                        <dd class="mt-0.5 text-sm font-semibold text-slate-900">{{ $formatMacro($recipe['protein']) }}<span class="ml-0.5 text-[10px] font-medium text-slate-400">g</span></dd>
                    </div>
                    <div>
                        <dt class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Karbo</dt>
                        <dd class="mt-0.5 text-sm font-semibold text-slate-900">{{ $formatMacro($recipe['carbs']) }}<span class="ml-0.5 text-[10px] font-medium text-slate-400">g</span></dd>
                    </div>
                    <div>
                        <dt class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Lemak</dt>
                        <dd class="mt-0.5 text-sm font-semibold text-slate-900">{{ $formatMacro($recipe['fat']) }}<span class="ml-0.5 text-[10px] font-medium text-slate-400">g</span></dd>
                    </div>
                </dl>

                <p class="mt-3 line-clamp-2 text-xs leading-relaxed text-slate-400">
                    {{ implode(' · ', $recipe['ingredients']) }}
                </p>

                <a href="{{ route('calories.create', ['recipe' => $recipe['slug']]) }}"
                   class="mt-4 inline-flex items-center justify-center gap-2 rounded-xl bg-blue-50 px-4 py-2.5 text-sm font-semibold text-blue-700 transition hover:bg-blue-100 focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/20">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                    </svg>
                    Catat ke tracker
                </a>
            </article>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white px-6 py-14 text-center">
                <p class="text-sm font-semibold text-slate-900">Belum ada resep untuk waktu makan ini.</p>
                <a href="{{ route('recipes.index') }}" class="mt-2 inline-block text-sm font-medium text-blue-600 hover:text-blue-700">
                    Lihat semua resep
                </a>
            </div>
        @endforelse
    </div>

    <p class="mt-6 text-center text-xs text-slate-400">
        Angka nutrisi adalah perkiraan per porsi standar. Sesuaikan jumlahnya bila porsimu berbeda.
    </p>
@endsection
