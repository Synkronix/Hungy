<?php

use App\Http\Controllers\CalorieLogController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CalorieLogController::class, 'index'])->name('home');

Route::get('/resep', [RecipeController::class, 'index'])->name('recipes.index');

Route::resource('calories', CalorieLogController::class)
    ->except(['show'])
    ->parameters(['calories' => 'calorie']);
