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
    Schema::create('recipes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('calories')->default(0); // sesuaikan dengan field di RecipeController
        $table->decimal('protein', 8, 2)->default(0);
        $table->decimal('carbs', 8, 2)->default(0);
        $table->decimal('fat', 8, 2)->default(0);
        // tambahkan kolom lain jika ada di validasi controller
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
