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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('refdemande');
            $table->date('datedemande');
            $table->foreignId('organisation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('datedebutmission')->nullable();
            $table->date('datefinmission')->nullable();
            $table->string('refmission')->nullable();
            $table->string('type_mission')->nullable();
            $table->string('objectif_mission')->nullable();
            $table->string('zone')->nullable();
            $table->string('dms');
            $table->string('besoinrenseignement')->nullable();
            $table->string('signe')->nullable();
            $table->string('statusaccord')->nullable();
            $table->string('remarqueaccord')->nullable();
            $table->string('organisationaccord')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};