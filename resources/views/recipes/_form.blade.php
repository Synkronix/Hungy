@php
    $recipe = $recipe ?? null;
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
        <label for="name" class="mb-1.5 block text-sm font-medium text-slate-700">Nama Resep <span class="text-rose-500">*</span></label>
        <input type="text" name="name" id="name" value="{{ old('name', $recipe?->name) }}" placeholder="Contoh: Nasi Goreng Spesial" class="{{ $inputClass }} @error('name') {{ $errorClass }} @enderror">
        @error('name') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="calories" class="mb-1.5 block text-sm font-medium text-slate-700">Kalori (kkal) <span class="text-rose-500">*</span></label>
        <input type="number" name="calories" id="calories" value="{{ old('calories', $recipe?->calories) }}" min="0" placeholder="0" class="{{ $inputClass }} @error('calories') {{ $errorClass }} @enderror">
        @error('calories') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="protein" class="mb-1.5 block text-sm font-medium text-slate-700">Protein (g) <span class="text-rose-500">*</span></label>
        <input type="number" name="protein" id="protein" value="{{ old('protein', $recipe?->protein) }}" min="0" step="0.1" placeholder="0" class="{{ $inputClass }} @error('protein') {{ $errorClass }} @enderror">
        @error('protein') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="carbs" class="mb-1.5 block text-sm font-medium text-slate-700">Karbohidrat (g) <span class="text-rose-500">*</span></label>
        <input type="number" name="carbs" id="carbs" value="{{ old('carbs', $recipe?->carbs) }}" min="0" step="0.1" placeholder="0" class="{{ $inputClass }} @error('carbs') {{ $errorClass }} @enderror">
        @error('carbs') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="fat" class="mb-1.5 block text-sm font-medium text-slate-700">Lemak (g) <span class="text-rose-500">*</span></label>
        <input type="number" name="fat" id="fat" value="{{ old('fat', $recipe?->fat) }}" min="0" step="0.1" placeholder="0" class="{{ $inputClass }} @error('fat') {{ $errorClass }} @enderror">
        @error('fat') <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-6">
        <label for="description" class="mb-1.5 block text-sm font-medium text-slate-700">Deskripsi / Bahan-bahan</label>
        <textarea name="description" id="description" rows="4" class="{{ $inputClass }} resize-none" placeholder="Tuliskan deskripsi atau bahan resep">{{ old('description', $recipe?->description) }}</textarea>
    </div>
</div>
