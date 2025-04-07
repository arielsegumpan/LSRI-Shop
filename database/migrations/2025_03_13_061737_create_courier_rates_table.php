<?php

use App\Models\Courier;
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
        Schema::create('courier_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Courier::class, 'courier_id')->constrained('couriers')->cascadeOnDelete();
            $table->decimal('rate', 10, 2)->nullable();
            $table->decimal('min_km', 8, 2)->nullable();
            $table->decimal('max_km', 8, 2)->nullable();
            $table->decimal('rate_per_km', 10, 2)->nullable();
            $table->enum('rate_type', ['flat', 'per_km'])->default('flat');
            $table->enum('rate_status', ['active', 'inactive'])->default('active');
            $table->string('rate_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_rates');
    }
};
