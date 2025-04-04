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
        Schema::create('demande_missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('date_investigation');
            $table->foreignId('zone_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('zone_interet_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('moyenne');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_missions');
    }
};
