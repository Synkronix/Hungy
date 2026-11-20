@extends('layouts.app')
@section('title', 'Budget Tracker — Hungy')
@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Budget Tracker</h1>
            <p class="mt-1.5 text-sm text-slate-500">Pantau pengeluaran makan dan belanja bahan makananmu.</p>
        </div>
        <a href="{{ route('budget.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path d="M12 5v14m-7-7h14" /></svg>
            Tambah Budget
        </a>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-medium uppercase text-slate-500">Total Pengeluaran</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900">Rp {{ number_format($total, 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-100 text-sm">
            <thead class="bg-slate-50">
                <tr class="text-left text-xs font-semibold uppercase text-slate-400">
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Jumlah</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($budgets as $b)
                <tr>
                    <td class="px-6 py-4 font-medium text-slate-900">{{ $b->category }}</td>
                    <td class="px-6 py-4 text-slate-600">Rp {{ number_format($b->amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-slate-500">{{ $b->date->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('budget.edit', $b) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('budget.destroy', $b) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
