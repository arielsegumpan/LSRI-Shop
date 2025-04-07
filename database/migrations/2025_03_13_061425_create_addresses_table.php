<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->nullable()->constrained('philippine_regions')->nullOnDelete();
            $table->foreignId('province_id')->nullable()->constrained('philippine_provinces')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('philippine_cities')->nullOnDelete();
            $table->foreignId('barangay_id')->nullable()->constrained('philippine_barangays')->nullOnDelete();
            $table->string('street')->nullable();
            $table->enum('address_type', ['billing', 'shipping'])->nullable();
            $table->string('full_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
