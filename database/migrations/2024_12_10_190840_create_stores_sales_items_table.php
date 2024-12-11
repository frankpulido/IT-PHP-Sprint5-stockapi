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
        Schema::create('stores_sales_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->constrained('stores_sales') // References 'id' column in `stores_sales` table
                ->onUpdate('cascade')    // Prevent updates if referenced ID changes
                ->onDelete('restrict');   // Prevent deletion of aisles with related sections
            $table->foreignId('product_id')
                ->constrained('products') // References 'id' column in `products` table
                ->onUpdate('cascade')    // Prevent updates if referenced ID changes
                ->onDelete('restrict');   // Prevent deletion of aisles with related sections
            $table->tinyInteger('qty');
            $table->timestamps();

            // Add composite unique constraint
            $table->unique(['order_id', 'product_id'], 'product_unique_out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores_sales_items');
    }
};