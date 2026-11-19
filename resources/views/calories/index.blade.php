@extends('layouts.app')

@section('title', 'Calorie Tracker — Hungy')

@section('content')
    @php
        $formatMacro = function ($value) {
            if ($value === null) {
                return '—';
            }

            return rtrim(rtrim(number_format((float) $value, 1, ',', '.'), '0'), ',');
        };

        $mealStyles = [
            'Sarapan' => 'bg-amber-50 text-amber-700 ring-amber-200/70',
            'Makan Siang' => 'bg-blue-50 text-blue-700 ring-blue-200/70',
            'Makan Malam' => 'bg-indigo-50 text-indigo-700 ring-indigo-200/70',
            'Camilan' => 'bg-orange-50 text-orange-700 ring-orange-200/70',
        ];

        $mealDots = [
            'Sarapan' => 'bg-amber-500',
            'Makan Siang' => 'bg-blue-500',
            'Makan Malam' => 'bg-indigo-500',
            'Camilan' => 'bg-orange-500',
        ];
    @endphp

    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Calorie Tracker</h1>
            <p class="mt-1.5 text-sm text-slate-500">
                Catat makanan dan minumanmu, lalu pantau asupan kalori serta makronutrisi harian.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('recipes.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-.673 0-1.33.075-1.96.217a.75.75 0 0 0-.59.734v14.25a.75.75 0 0 0 .964.725 9.03 9.03 0 0 1 2.336-.31 8.967 8.967 0 0 1 5.25 1.75 8.967 8.967 0 0 1 5.25-1.75c.81 0 1.597.108 2.336.31a.75.75 0 0 0 .964-.725V4.701a.75.75 0 0 0-.59-.734A9.045 9.045 0 0 0 18 3.75a8.967 8.967 0 0 0-6 2.292Z" />
                </svg>
                Lihat Resep
            </a>
            <a href="{{ route('calories.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/20">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Catat Kalori
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mt-6 flex items-start gap-3 rounded-xl border border-blue-200 bg-blue-50 px-4 py-3.5 text-sm text-blue-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 2.25 2.25L15 9m6 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mt-6">
        <div class="flex items-center justify-between">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Ringkasan</h2>
            <span class="text-xs text-slate-400">
                @if ($date)
                    {{ \Illuminate\Support\Carbon::parse($date)->format('d M Y') }}
                @else
                    Semua catatan
                @endif
            </span>
        </div>

        <div class="mt-3 grid grid-cols-2 gap-3 sm:gap-4 lg:grid-cols-4">
            <div class="rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm sm:p-5">
                <div class="flex items-start justify-between gap-3">
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Total Kalori</p>
                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 3.5c.8 3-0.4 4.8-1.9 6.3-1.6 1.7-2.9 3.3-2.3 6 .4 1.8 2 3.2 3.9 3.2 2.6 0 4.3-1.9 4.3-4.4 0-4.4-2.7-8.7-4-11.1Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 20.5c-1.9-.6-3.3-2.3-3.3-4.4 0-1.5.7-2.7 1.6-3.6" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                    {{ number_format((int) $summary['calories'], 0, ',', '.') }}
                    <span class="text-sm font-medium text-slate-400">kkal</span>
                </p>
                <p class="mt-1 text-xs text-slate-400">{{ $logs->count() }} catatan</p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm sm:p-5">
                <div class="flex items-start justify-between gap-3">
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Protein</p>
                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-sky-50 text-sky-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.5 6.5 4 4m14 14 2.5 2.5M8 16l8-8M5.5 14.5l4 4M14.5 5.5l4 4" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                    {{ $formatMacro($summary['protein']) }}
                    <span class="text-sm font-medium text-slate-400">g</span>
                </p>
                <p class="mt-1 text-xs text-slate-400">Total harian</p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm sm:p-5">
                <div class="flex items-start justify-between gap-3">
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Karbohidrat</p>
                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-amber-50 text-amber-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M4.9 7.5l14.2 9M19.1 7.5l-14.2 9" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                    {{ $formatMacro($summary['carbs']) }}
                    <span class="text-sm font-medium text-slate-400">g</span>
                </p>
                <p class="mt-1 text-xs text-slate-400">Total harian</p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm sm:p-5">
                <div class="flex items-start justify-between gap-3">
                    <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Lemak</p>
                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-orange-50 text-orange-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.5c3.2 3.6 5.5 6.4 5.5 9.3a5.5 5.5 0 1 1-11 0c0-2.9 2.3-5.7 5.5-9.3Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                    {{ $formatMacro($summary['fat']) }}
                    <span class="text-sm font-medium text-slate-400">g</span>
                </p>
                <p class="mt-1 text-xs text-slate-400">Total harian</p>
            </div>
        </div>
    </section>

    <section class="mt-8 overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100 px-4 py-4 sm:flex-row sm:items-end sm:justify-between sm:px-6">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-base font-semibold text-slate-900">Riwayat Makan</h2>
                    <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-500">{{ $logs->count() }}</span>
                </div>
                <p class="mt-1 text-xs text-slate-400">Diurutkan dari tanggal konsumsi terbaru.</p>
            </div>

            <form action="{{ route('calories.index') }}" method="GET" class="flex items-end gap-2">
                <div>
                    <label for="date" class="mb-1.5 block text-xs font-medium text-slate-500">Filter tanggal</label>
                    <input type="date" name="date" id="date" value="{{ $date }}"
                           class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 shadow-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 sm:w-44">
                </div>
                <button type="submit"
                        class="rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700">
                    Terapkan
                </button>
                @if ($date)
                    <a href="{{ route('calories.index') }}"
                       class="rounded-xl px-2.5 py-2 text-sm font-medium text-slate-500 transition hover:text-slate-800">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                <thead class="bg-slate-50/70">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-400">
                        <th scope="col" class="px-4 py-3 sm:px-6">Makanan</th>
                        <th scope="col" class="px-4 py-3">Waktu</th>
                        <th scope="col" class="px-4 py-3">Kalori</th>
                        <th scope="col" class="px-4 py-3">Makronutrisi</th>
                        <th scope="col" class="px-4 py-3">Tanggal</th>
                        <th scope="col" class="px-4 py-3 text-right sm:px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($logs as $log)
                        <tr class="transition hover:bg-blue-50/30">
                            <td class="px-4 py-4 sm:px-6">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-slate-50 text-slate-400 ring-1 ring-slate-200/70">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 11.5h17M5.5 11.5a6.5 6.5 0 0 0 13 0M8 20l-1 1m9-1 1 1" />
                                        </svg>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="font-medium text-slate-900">{{ $log->food_name }}</p>
                                        @if ($log->notes)
                                            <p class="mt-0.5 max-w-[16rem] truncate text-xs text-slate-400" title="{{ $log->notes }}">{{ $log->notes }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-medium ring-1 ring-inset {{ $mealStyles[$log->meal_type] ?? 'bg-slate-50 text-slate-600 ring-slate-200/70' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $mealDots[$log->meal_type] ?? 'bg-slate-400' }}"></span>
                                    {{ $log->meal_type }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap px-4 py-4 font-semibold text-slate-900">
                                {{ number_format((int) $log->calories, 0, ',', '.') }}
                                <span class="text-xs font-normal text-slate-400">kkal</span>
                            </td>
                            <td class="whitespace-nowrap px-4 py-4">
                                <div class="flex items-center gap-1.5 text-[11px] font-medium">
                                    <span class="rounded-md bg-sky-50 px-1.5 py-0.5 text-sky-700 ring-1 ring-inset ring-sky-100">P {{ $formatMacro($log->protein) }}g</span>
                                    <span class="rounded-md bg-amber-50 px-1.5 py-0.5 text-amber-700 ring-1 ring-inset ring-amber-100">K {{ $formatMacro($log->carbs) }}g</span>
                                    <span class="rounded-md bg-orange-50 px-1.5 py-0.5 text-orange-700 ring-1 ring-inset ring-orange-100">L {{ $formatMacro($log->fat) }}g</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-4 text-slate-500">
                                {{ $log->consumed_date->format('d M Y') }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-4 text-right sm:px-6">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('calories.edit', $log) }}"
                                       class="rounded-lg px-2.5 py-1.5 text-xs font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                                        Edit
                                    </a>
                                    <form action="{{ route('calories.destroy', $log) }}" method="POST"
                                          onsubmit="return confirm('Hapus catatan kalori ini? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded-lg px-2.5 py-1.5 text-xs font-semibold text-rose-600 transition hover:bg-rose-50">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <span class="mx-auto grid h-12 w-12 place-items-center rounded-full bg-blue-50 text-blue-500">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </span>
                                <p class="mt-4 text-sm font-semibold text-slate-900">
                                    {{ $date ? 'Belum ada catatan pada tanggal ini' : 'Belum ada catatan kalori' }}
                                </p>
                                <p class="mt-1 text-sm text-slate-500">Mulai catat makanan pertamamu untuk melihat ringkasannya di sini.</p>
                                <p class="mt-1 text-xs text-slate-400">Belum tahu kalori makanannya? Pilih dari resep Hungy, nutrisinya terisi otomatis.</p>
                                <a href="{{ route('calories.create') }}"
                                   class="mt-5 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                                    </svg>
                                    Catat Kalori
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
