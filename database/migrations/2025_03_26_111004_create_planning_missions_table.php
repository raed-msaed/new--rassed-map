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
        Schema::create('planning_missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_mission_id')->nullable()->constrained()->onDelete();
            $table->boolean('accord_emaa');
            $table->string('accord_remarque');
            $table->date('date');
            $table->string('moyenne');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_missions');
    }
};