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
        Schema::create('points_interets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_interet_id')->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('latitude', 9 , 6);
            $table->decimal('longitude', 9, 6);
            $table->string('attributes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_interets');
    }
};