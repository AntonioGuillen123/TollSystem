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
        Schema::create('toll_station_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toll_station_id')->constrained('toll_station')->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicle')->onDelete('cascade');
            $table->double('toll_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toll_station_vehicle');
    }
};
