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
        Schema::create('foodmenu', function (Blueprint $table) {
            $table->id();
            $table->string('src'); // Image filename (e.g., pizza.jpg)
            $table->string('title'); // Food title (e.g., Pizza)
            $table->text('detail')->nullable(); // Description of the food item
            $table->decimal('price', 8, 2); // Price with two decimal points
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foodmenu');
    }
};
