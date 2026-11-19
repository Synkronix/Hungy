<?php

namespace App\Http\Controllers;

use App\Support\NutritionCatalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    /**
     * Show Hungy's recipe recommendations with their nutrition per portion.
     */
    public function index(Request $request): View
    {
        $mealTypes = NutritionCatalog::mealTypes();
        $meal = $request->query('meal');
        $meal = is_string($meal) && in_array($meal, $mealTypes, true) ? $meal : null;

        $recipes = NutritionCatalog::recipes();

        if ($meal) {
            $recipes = array_values(array_filter(
                $recipes,
                fn (array $recipe) => $recipe['meal_type'] === $meal
            ));
        }

        return view('recipes.index', [
            'recipes' => $recipes,
            'mealTypes' => $mealTypes,
            'meal' => $meal,
        ]);
    }
}
