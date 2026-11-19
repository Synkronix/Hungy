<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calorie_logs', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->enum('meal_type', ['Sarapan', 'Makan Siang', 'Makan Malam', 'Camilan']);
            $table->integer('calories');
            $table->decimal('protein', 5, 1)->nullable();
            $table->decimal('carbs', 5, 1)->nullable();
            $table->decimal('fat', 5, 1)->nullable();
            $table->date('consumed_date')->index();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calorie_logs');
    }
};
