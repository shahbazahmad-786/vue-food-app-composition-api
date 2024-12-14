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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('quantity'); // Quantity of the food item (you can change it to integer if needed)
            $table->decimal('total_price', 8, 2); // Total price of the order with precision 8 and scale 2
            $table->string('full_name')->nullable(); // Customer full name (nullable)
            $table->string('email'); // Email of the customer
            $table->string('contact'); // Phone number of the customer
            $table->text('address'); // Address of the customer
            $table->timestamps(); // Created and updated timestamps

            // Foreign keys
            $table->foreignId('food_menue_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
