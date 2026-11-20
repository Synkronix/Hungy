<?php

use App\Http\Controllers\CalorieLogController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CalorieLogController::class, 'index'])->name('home');

Route::resource('recipes', RecipeController::class)->except(['show']);
Route::resource('calories', CalorieLogController::class)->except(['show'])->parameters(['calories' => 'calorie']);
Route::resource('budget', BudgetController::class)->except(['show']);
