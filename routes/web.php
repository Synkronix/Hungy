<?php

use App\Http\Controllers\CalorieLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CalorieLogController::class, 'index'])->name('home');

Route::resource('calories', CalorieLogController::class)
    ->except(['show'])
    ->parameters(['calories' => 'calorie']);
