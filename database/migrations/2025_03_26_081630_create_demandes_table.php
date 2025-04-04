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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('refdemande');
            $table->date('datedemande');
            $table->foreignId('organisation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('refmission')->nullable();
            $table->foreignId('type_mission_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('datedebutmission')->nullable();
            $table->date('datefinmission')->nullable();
            $table->string('timemission')->nullable();
            $table->string('objectif_mission')->nullable();
            $table->string('signe')->nullable();
            $table->boolean('accordgrci')->nullable();
            $table->string('remarque')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
