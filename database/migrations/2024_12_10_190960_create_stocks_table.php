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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();

            // Foreign key to the 'purchase_orders_items' table (stock in)
            $table->foreignId('purchase_order_item_id')
                ->nullable() // Nullable for out movements
                ->constrained('purchase_orders_items') // References the 'purchase_orders_items' table's 'id'
                ->onUpdate('cascade')
                ->onDelete('cascade'); // Deleting purchase order items should also delete related stock movements

            // Foreign key to the 'stores_sales_items' table (stock out)
            $table->foreignId('stores_sales_item_id')
                ->nullable() // Nullable for in movements
                ->constrained('stores_sales_items') // References the 'stores_sales_items' table's 'id'
                ->onUpdate('cascade')
                ->onDelete('cascade'); // Deleting store sales items should also delete related stock movements

            // Movement type: 'in' for stock added, 'out' for stock removed
            $table->enum('movement_type', ['in', 'out']);
            
            // Timestamps to track when the stock movement happened
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};