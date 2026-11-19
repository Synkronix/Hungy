<?php

namespace App\Support;

class NutritionCatalog
{
    /**
     * All recipes with their slug attached.
     *
     * @return list<array<string, mixed>>
     */
    public static function recipes(): array
    {
        return collect(config('nutrition.recipes', []))
            ->map(fn (array $recipe, string $slug) => ['slug' => $slug] + $recipe)
            ->values()
            ->all();
    }

    /**
     * Find a single recipe by its slug.
     *
     * @return array<string, mixed>|null
     */
    public static function recipe(string $slug): ?array
    {
        $recipes = config('nutrition.recipes', []);

        if (! isset($recipes[$slug])) {
            return null;
        }

        return ['slug' => $slug] + $recipes[$slug];
    }

    /**
     * Everyday foods with approximate nutrition per portion.
     *
     * @return list<array<string, mixed>>
     */
    public static function foods(): array
    {
        return collect(config('nutrition.foods', []))
            ->map(fn (array $food, string $slug) => ['slug' => $slug] + $food)
            ->values()
            ->all();
    }

    /**
     * Meal types used by the recipe recommendations.
     *
     * @return list<string>
     */
    public static function mealTypes(): array
    {
        return array_values(array_unique(
            array_column(config('nutrition.recipes', []), 'meal_type')
        ));
    }
}
