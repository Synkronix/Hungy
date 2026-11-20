@php
    $budget = $budget ?? null;
    $inputClass = 'w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10';
    $errorClass = 'border-rose-300 focus:border-rose-400 focus:ring-rose-500/10';
@endphp

@if ($errors->any())
    <div class="flex items-start gap-3 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3.5 text-sm text-rose-700">
        <svg class="mt-0.5 h-5 w-5 shrink-0 text-rose-500" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <div>
            <p class="font-medium">Ada data yang perlu diperiksa.</p>
        </div>
    </div>
@endif

<div class="grid grid-cols-1 gap-5 sm:grid-cols-6">
    <div class="sm:col-span-6">
        <label for="category" class="mb-1.5 block text-sm font-medium text-slate-700">Kategori <span class="text-rose-500">*</span></label>
        <input type="text" name="category" id="category" value="{{ old('category', $budget?->category) }}" placeholder="Contoh: Belanja Mingguan" class="{{ $inputClass }} @error('category') {{ $errorClass }} @enderror">
        @error('category') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="amount" class="mb-1.5 block text-sm font-medium text-slate-700">Jumlah <span class="text-rose-500">*</span></label>
        <input type="number" name="amount" id="amount" value="{{ old('amount', $budget?->amount) }}" step="0.01" placeholder="0" class="{{ $inputClass }} @error('amount') {{ $errorClass }} @enderror">
        @error('amount') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="date" class="mb-1.5 block text-sm font-medium text-slate-700">Tanggal <span class="text-rose-500">*</span></label>
        <input type="date" name="date" id="date" value="{{ old('date', $budget?->date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}" class="{{ $inputClass }} @error('date') {{ $errorClass }} @enderror">
        @error('date') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-6">
        <label for="description" class="mb-1.5 block text-sm font-medium text-slate-700">Keterangan</label>
        <textarea name="description" id="description" rows="3" class="{{ $inputClass }} resize-none">{{ old('description', $budget?->description) }}</textarea>
    </div>
</div>
