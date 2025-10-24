<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This creates the 'products' table which will store all coffee items.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for each product (Primary Key)

            $table->string('name'); // Coffee product name (e.g., "Latte", "Espresso")
            $table->string('category'); // Type of item (e.g., coffee, dessert)
            $table->string('image'); // Image filename stored in 'public/images'
            $table->text('description'); // A short product description
            $table->decimal('price', 8, 2); // Product price (e.g., 450.00)
            
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     * This deletes the table if the migration is rolled back.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
