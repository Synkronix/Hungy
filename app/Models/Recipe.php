<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'calories', // sesuaikan jika ada di baris 25-28 RecipeController
        'protein',
        'carbs',
        'fat',
        // tambahkan kolom lain jika ada di $request->validate() (misal: description / ingredients / instructions)
    ];
}