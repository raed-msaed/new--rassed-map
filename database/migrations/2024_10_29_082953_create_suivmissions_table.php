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
        Schema::create('suivmissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mission_id')->nullable()->constrained()->cascadeOnDelete();
            $table->dateTime('datedebut')->nullable();
            $table->dateTime('datefin')->nullable();
            $table->string('moyenne')->nullable();
            $table->string('dms')->nullable();
            $table->string('descriptionpoint')->nullable();
            $table->string('reconnaissance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivmissions');
    }
};
