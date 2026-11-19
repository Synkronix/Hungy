@php
    $log = $log ?? null;
    $recipes = $recipes ?? [];
    $foods = $foods ?? [];
    $preselected = $preselected ?? null;

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
            <ul class="mt-1 list-inside list-disc space-y-0.5 text-xs text-rose-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div id="catalog-picker" data-preselect="{{ $preselected['slug'] ?? '' }}"
     class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50/80 via-white to-white p-4 sm:p-5">
    <div class="flex items-start gap-3">
        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-white text-blue-600 shadow-sm ring-1 ring-inset ring-blue-100">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" />
            </svg>
        </span>
        <div class="min-w-0">
            <h2 class="text-sm font-semibold text-slate-900">Isi otomatis, tanpa hitung manual</h2>
            <p class="mt-1 text-xs leading-relaxed text-slate-500">
                Pilih resep Hungy atau makanan umum. Kalori dan makronutrisinya langsung terisi —
                kamu tetap bisa menyesuaikan angkanya.
            </p>
        </div>
    </div>

    <div class="mt-4 inline-flex rounded-xl bg-white p-1 ring-1 ring-inset ring-slate-200" role="tablist" aria-label="Sumber data makanan">
        <button type="button" data-catalog-tab="recipes" role="tab" aria-selected="true"
                class="rounded-lg bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition">
            Resep Hungy
        </button>
        <button type="button" data-catalog-tab="foods" role="tab" aria-selected="false"
                class="rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition hover:text-slate-800">
            Makanan umum
        </button>
    </div>

    <div class="relative mt-3">
        <label for="catalog-search" class="sr-only">Cari resep atau makanan</label>
        <svg class="pointer-events-none absolute inset-y-0 left-3 my-auto h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35M17 11a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z" />
        </svg>
        <input type="text" id="catalog-search" autocomplete="off"
               placeholder="Cari resep atau makanan…"
               class="w-full rounded-xl border border-slate-200 bg-white py-2.5 pl-9 pr-3.5 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
    </div>

    <div id="catalog-list" role="listbox" aria-label="Pilihan makanan"
         class="mt-2 max-h-56 space-y-1 overflow-y-auto pr-1"></div>

    <p id="catalog-empty" class="mt-2 hidden rounded-xl border border-dashed border-slate-200 bg-white/60 px-3.5 py-4 text-center text-xs text-slate-500">
        Tidak ada yang cocok. Coba kata kunci lain, atau isi manual di bawah.
    </p>

    <div id="catalog-selected"
         class="mt-3 hidden items-start gap-3 rounded-xl border border-blue-200 bg-white px-3.5 py-3">
        <span class="mt-0.5 grid h-8 w-8 shrink-0 place-items-center rounded-lg bg-blue-50 text-blue-600 ring-1 ring-inset ring-blue-100">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
        </span>
        <div class="min-w-0 flex-1">
            <p class="text-xs font-semibold text-slate-900">
                Nutrisi terisi dari <span id="catalog-selected-name"></span>
            </p>
            <p id="catalog-selected-meta" class="mt-0.5 text-xs text-slate-500"></p>
        </div>
        <button type="button" id="catalog-clear"
                class="shrink-0 rounded-lg px-2 py-1 text-xs font-semibold text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
            Kosongkan
        </button>
    </div>

    <p class="mt-2.5 text-[11px] text-slate-400">
        Angka nutrisi adalah perkiraan per porsi. Tidak menemukan makananmu? Cukup isi manual di bawah.
    </p>
</div>

<div class="grid grid-cols-1 gap-5 sm:grid-cols-6">
    <div class="sm:col-span-6">
        <div class="mb-4 flex items-center gap-2">
            <h2 class="text-sm font-semibold text-slate-900">Detail makanan</h2>
            <span class="h-px flex-1 bg-slate-100"></span>
            <span class="text-xs text-slate-400">Bisa diubah</span>
        </div>
    </div>

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
                    <span class="flex items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:border-slate-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-focus-visible:ring-4 peer-focus-visible:ring-blue-500/10">
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

@push('scripts')
    <script type="application/json" id="nutrition-catalog">@json(['recipes' => $recipes, 'foods' => $foods])</script>
    <script>
        (() => {
            const root = document.getElementById('catalog-picker');
            const dataEl = document.getElementById('nutrition-catalog');

            if (!root || !dataEl) {
                return;
            }

            const catalog = JSON.parse(dataEl.textContent);
            const state = { tab: 'recipes', query: '' };
            const presetSlug = root.dataset.preselect || '';

            const listEl = document.getElementById('catalog-list');
            const searchEl = document.getElementById('catalog-search');
            const emptyEl = document.getElementById('catalog-empty');
            const selectedEl = document.getElementById('catalog-selected');
            const selectedNameEl = document.getElementById('catalog-selected-name');
            const selectedMetaEl = document.getElementById('catalog-selected-meta');
            const clearEl = document.getElementById('catalog-clear');
            const tabButtons = root.querySelectorAll('[data-catalog-tab]');

            const nameField = document.getElementById('food_name');
            const caloriesField = document.getElementById('calories');
            const proteinField = document.getElementById('protein');
            const carbsField = document.getElementById('carbs');
            const fatField = document.getElementById('fat');

            const highlightClasses = ['border-blue-200', 'bg-blue-50/80'];

            function setTab(tab) {
                state.tab = tab;

                tabButtons.forEach((button) => {
                    const active = button.dataset.catalogTab === tab;
                    button.setAttribute('aria-selected', active ? 'true' : 'false');
                    button.className = 'rounded-lg px-3 py-1.5 text-xs font-semibold transition ' + (active
                        ? 'bg-blue-600 text-white shadow-sm'
                        : 'text-slate-500 hover:text-slate-800');
                });

                render();
            }

            function render() {
                const source = state.tab === 'recipes' ? catalog.recipes : catalog.foods;
                const query = state.query.trim().toLowerCase();

                const items = source.filter((item) => {
                    if (!query) {
                        return true;
                    }

                    return [item.name, item.serving, ...(item.ingredients || [])]
                        .join(' ')
                        .toLowerCase()
                        .includes(query);
                });

                listEl.replaceChildren();

                items.forEach((item) => {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.setAttribute('role', 'option');
                    button.className = 'flex w-full items-center gap-3 rounded-xl border border-transparent px-2.5 py-2 text-left transition hover:border-blue-100 hover:bg-blue-50/70 focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/10';

                    if (nameField.value.trim() === item.name) {
                        button.classList.add(...highlightClasses);
                    }

                    const tile = document.createElement('span');
                    tile.className = 'grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-white text-lg ring-1 ring-inset ring-slate-200/70';
                    tile.textContent = item.emoji || '🍽️';
                    tile.setAttribute('aria-hidden', 'true');

                    const info = document.createElement('span');
                    info.className = 'min-w-0 flex-1';

                    const title = document.createElement('span');
                    title.className = 'block truncate text-sm font-medium text-slate-800';
                    title.textContent = item.name;

                    const meta = document.createElement('span');
                    meta.className = 'mt-0.5 block truncate text-[11px] text-slate-400';
                    meta.textContent = item.serving + (item.meal_type ? ' · ' + item.meal_type : '');

                    info.append(title, meta);

                    const nutrition = document.createElement('span');
                    nutrition.className = 'shrink-0 text-right';

                    const kcal = document.createElement('span');
                    kcal.className = 'block text-sm font-semibold text-slate-900';
                    kcal.textContent = item.calories;

                    const kcalUnit = document.createElement('span');
                    kcalUnit.className = 'block text-[10px] font-medium text-slate-400';
                    kcalUnit.textContent = 'kkal';

                    nutrition.append(kcal, kcalUnit);
                    button.append(tile, info, nutrition);

                    button.addEventListener('click', () => apply(item));

                    listEl.appendChild(button);
                });

                emptyEl.classList.toggle('hidden', items.length > 0);
            }

            function apply(item, focus = true) {
                nameField.value = item.name;
                caloriesField.value = item.calories;
                proteinField.value = item.protein ?? '';
                carbsField.value = item.carbs ?? '';
                fatField.value = item.fat ?? '';

                if (item.meal_type) {
                    const radio = document.querySelector('input[name="meal_type"][value="' + item.meal_type + '"]');

                    if (radio) {
                        radio.checked = true;
                    }
                }

                selectedNameEl.textContent = item.name;
                selectedMetaEl.textContent = item.serving + ' · ' + item.calories + ' kkal';
                selectedEl.classList.remove('hidden');
                selectedEl.classList.add('flex');

                render();

                if (focus) {
                    nameField.focus({ preventScroll: true });
                }
            }

            function clearSelection() {
                [nameField, caloriesField, proteinField, carbsField, fatField].forEach((field) => {
                    field.value = '';
                });

                selectedEl.classList.add('hidden');
                selectedEl.classList.remove('flex');
                nameField.focus();
                render();
            }

            tabButtons.forEach((button) => {
                button.addEventListener('click', () => setTab(button.dataset.catalogTab));
            });

            searchEl.addEventListener('input', (event) => {
                state.query = event.target.value;
                render();
            });

            clearEl.addEventListener('click', clearSelection);

            setTab('recipes');

            if (!nameField.value.trim() && presetSlug) {
                const preset = catalog.recipes.find((recipe) => recipe.slug === presetSlug)
                    || catalog.foods.find((food) => food.slug === presetSlug);

                if (preset) {
                    apply(preset, false);
                }
            }
        })();
    </script>
@endpush
