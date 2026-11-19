<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalorieLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'food_name',
        'meal_type',
        'calories',
        'protein',
        'carbs',
        'fat',
        'consumed_date',
        'notes',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'consumed_date' => 'date',
        ];
    }
}
