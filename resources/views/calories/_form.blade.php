@php
    $log = $log ?? null;

    $inputClass = 'w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10';
    $errorClass = 'border-rose-300 focus:border-rose-400 focus:ring-rose-500/10';
@endphp

@if ($errors->any())
    <div class="flex items-start gap-3 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3.5 text-sm text-rose-700">
        <svg class="mt-0.5 h-5 w-5 shrink-0 text-rose-500" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <div>
            <p class="font-medium">Ada data yang perlu diperiksa.</p>
            <ul class="mt-1 list-inside list-disc space-y-0.5 text-xs text-rose-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="grid grid-cols-1 gap-5 sm:grid-cols-6">
    <div class="sm:col-span-6">
        <label for="food_name" class="mb-1.5 block text-sm font-medium text-slate-700">
            Nama makanan / minuman <span class="text-rose-500">*</span>
        </label>
        <input type="text" name="food_name" id="food_name" value="{{ old('food_name', $log?->food_name) }}"
               placeholder="Contoh: Nasi goreng ayam"
               class="{{ $inputClass }} @error('food_name') {{ $errorClass }} @enderror">
        @error('food_name')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-6">
        <span class="mb-2 block text-sm font-medium text-slate-700">
            Waktu makan <span class="text-rose-500">*</span>
        </span>
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
            @foreach ($mealTypes as $type)
                <label class="cursor-pointer">
                    <input type="radio" name="meal_type" value="{{ $type }}" class="peer sr-only"
                           @checked(old('meal_type', $log?->meal_type ?? 'Sarapan') === $type)>
                    <span class="flex items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:border-slate-300 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700 peer-focus-visible:ring-4 peer-focus-visible:ring-emerald-500/10">
                        {{ $type }}
                    </span>
                </label>
            @endforeach
        </div>
        @error('meal_type')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="calories" class="mb-1.5 block text-sm font-medium text-slate-700">
            Jumlah kalori <span class="text-rose-500">*</span>
        </label>
        <div class="relative">
            <input type="number" name="calories" id="calories" value="{{ old('calories', $log?->calories) }}"
                   min="0" max="20000" step="1" placeholder="0" inputmode="numeric"
                   class="{{ $inputClass }} pr-14 @error('calories') {{ $errorClass }} @enderror">
            <span class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center text-xs font-medium text-slate-400">kkal</span>
        </div>
        @error('calories')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="consumed_date" class="mb-1.5 block text-sm font-medium text-slate-700">
            Tanggal konsumsi <span class="text-rose-500">*</span>
        </label>
        <input type="date" name="consumed_date" id="consumed_date"
               value="{{ old('consumed_date', $log?->consumed_date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}"
               class="{{ $inputClass }} @error('consumed_date') {{ $errorClass }} @enderror">
        @error('consumed_date')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="protein" class="mb-1.5 block text-sm font-medium text-slate-700">Protein</label>
        <div class="relative">
            <input type="number" name="protein" id="protein" value="{{ old('protein', $log?->protein) }}"
                   min="0" max="9999.9" step="0.1" placeholder="0"
                   class="{{ $inputClass }} pr-9 @error('protein') {{ $errorClass }} @enderror">
            <span class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center text-xs font-medium text-slate-400">g</span>
        </div>
        @error('protein')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="carbs" class="mb-1.5 block text-sm font-medium text-slate-700">Karbohidrat</label>
        <div class="relative">
            <input type="number" name="carbs" id="carbs" value="{{ old('carbs', $log?->carbs) }}"
                   min="0" max="9999.9" step="0.1" placeholder="0"
                   class="{{ $inputClass }} pr-9 @error('carbs') {{ $errorClass }} @enderror">
            <span class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center text-xs font-medium text-slate-400">g</span>
        </div>
        @error('carbs')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="fat" class="mb-1.5 block text-sm font-medium text-slate-700">Lemak</label>
        <div class="relative">
            <input type="number" name="fat" id="fat" value="{{ old('fat', $log?->fat) }}"
                   min="0" max="9999.9" step="0.1" placeholder="0"
                   class="{{ $inputClass }} pr-9 @error('fat') {{ $errorClass }} @enderror">
            <span class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center text-xs font-medium text-slate-400">g</span>
        </div>
        @error('fat')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-6">
        <label for="notes" class="mb-1.5 block text-sm font-medium text-slate-700">
            Catatan <span class="font-normal text-slate-400">(opsional)</span>
        </label>
        <textarea name="notes" id="notes" rows="3"
                  placeholder="Contoh: porsi kecil, tanpa sambal"
                  class="{{ $inputClass }} resize-none @error('notes') {{ $errorClass }} @enderror">{{ old('notes', $log?->notes) }}</textarea>
        @error('notes')
            <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>
