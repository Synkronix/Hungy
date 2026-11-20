<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RecipeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::latest()->get();
        return view('recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        return view('recipes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'required|integer|min:0',
            'protein' => 'required|numeric|min:0',
            'carbs' => 'required|numeric|min:0',
            'fat' => 'required|numeric|min:0',
        ]);

        Recipe::create($data);
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    public function edit(Recipe $recipe): View
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'required|integer|min:0',
            'protein' => 'required|numeric|min:0',
            'carbs' => 'required|numeric|min:0',
            'fat' => 'required|numeric|min:0',
        ]);

        $recipe->update($data);
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil diperbarui.');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil dihapus.');
    }
}
