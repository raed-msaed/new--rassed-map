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
            $table->string('validate')->nullable();
            $table->string('moyenne')->nullable();
            $table->foreignId('point_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('descriptionpoint')->nullable();
            $table->string('reconnaissance')->nullable();
            $table->string('descriptionphoto')->nullable();
            $table->string('photoaerienne')->nullable();
            $table->string('photogeoaerienne')->nullable();
            $table->string('video')->nullable();
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
