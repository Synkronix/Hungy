<?php

namespace App\Http\Controllers;

use App\Models\CalorieLog;
use App\Support\NutritionCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CalorieLogController extends Controller
{
    /**
     * Meal types supported by the tracker.
     *
     * @var list<string>
     */
    private const MEAL_TYPES = ['Sarapan', 'Makan Siang', 'Makan Malam', 'Camilan'];

    /**
     * Display the calorie history with optional date filtering.
     */
    public function index(Request $request): View
    {
        $date = null;
        $input = $request->input('date');

        if (is_string($input) && Carbon::canBeCreatedFromFormat($input, 'Y-m-d')) {
            $date = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        }

        $logs = CalorieLog::query()
            ->when($date, fn ($query) => $query->whereDate('consumed_date', $date))
            ->latest('consumed_date')
            ->latest('id')
            ->get();

        $summary = [
            'calories' => $logs->sum('calories'),
            'protein' => $logs->sum('protein'),
            'carbs' => $logs->sum('carbs'),
            'fat' => $logs->sum('fat'),
        ];

        return view('calories.index', [
            'logs' => $logs,
            'date' => $date,
            'summary' => $summary,
        ]);
    }

    /**
     * Show the form for creating a new calorie log.
     */
    public function create(Request $request): View
    {
        $slug = $request->query('recipe');
        $preselected = is_string($slug) ? NutritionCatalog::recipe($slug) : null;

        return view('calories.create', [
            'mealTypes' => self::MEAL_TYPES,
            'recipes' => NutritionCatalog::recipes(),
            'foods' => NutritionCatalog::foods(),
            'preselected' => $preselected,
        ]);
    }

    /**
     * Store a newly created calorie log.
     */
    public function store(Request $request): RedirectResponse
    {
        CalorieLog::create($this->validatedData($request));

        return redirect()
            ->route('calories.index')
            ->with('success', 'Catatan kalori berhasil disimpan.');
    }

    /**
     * Show the form for editing the given calorie log.
     */
    public function edit(CalorieLog $calorie): View
    {
        return view('calories.edit', [
            'log' => $calorie,
            'mealTypes' => self::MEAL_TYPES,
            'recipes' => NutritionCatalog::recipes(),
            'foods' => NutritionCatalog::foods(),
        ]);
    }

    /**
     * Update the given calorie log.
     */
    public function update(Request $request, CalorieLog $calorie): RedirectResponse
    {
        $calorie->update($this->validatedData($request));

        return redirect()
            ->route('calories.index')
            ->with('success', 'Catatan kalori berhasil diperbarui.');
    }

    /**
     * Remove the given calorie log.
     */
    public function destroy(CalorieLog $calorie): RedirectResponse
    {
        $calorie->delete();

        return redirect()
            ->route('calories.index')
            ->with('success', 'Catatan kalori berhasil dihapus.');
    }

    /**
     * Validate the incoming request and return the safe attributes.
     *
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        return $request->validate(
            [
                'food_name' => ['required', 'string', 'max:255'],
                'meal_type' => ['required', Rule::in(self::MEAL_TYPES)],
                'calories' => ['required', 'integer', 'min:0', 'max:20000'],
                'protein' => ['nullable', 'numeric', 'min:0', 'max:9999.9'],
                'carbs' => ['nullable', 'numeric', 'min:0', 'max:9999.9'],
                'fat' => ['nullable', 'numeric', 'min:0', 'max:9999.9'],
                'consumed_date' => ['required', 'date'],
                'notes' => ['nullable', 'string', 'max:1000'],
            ],
            [
                'required' => ':attribute wajib diisi.',
                'string' => ':attribute harus berupa teks.',
                'integer' => ':attribute harus berupa angka bulat.',
                'numeric' => ':attribute harus berupa angka.',
                'min' => ':attribute tidak boleh kurang dari :min.',
                'max' => ':attribute tidak boleh lebih dari :max.',
                'date' => ':attribute harus berupa tanggal yang valid.',
                'in' => 'Pilihan :attribute tidak valid.',
            ],
            [
                'food_name' => 'nama makanan',
                'meal_type' => 'waktu makan',
                'calories' => 'jumlah kalori',
                'protein' => 'protein',
                'carbs' => 'karbohidrat',
                'fat' => 'lemak',
                'consumed_date' => 'tanggal konsumsi',
                'notes' => 'catatan',
            ],
        );
    }
}
