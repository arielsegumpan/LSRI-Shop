<?php

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class, 'product_id')->nullable()->constrained('products', 'id')->cascadeOnDelete();
            $table->foreignIdFor(Sale::class, 'sale_id')->nullable()->constrained('sales', 'id')->cascadeOnDelete();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sale');
    }
};
