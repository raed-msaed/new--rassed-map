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
        Schema::create('suiv_mission_point_interets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->nullable()->constrained()->cascadeOnDelete(); // Zone concernée
            $table->foreignId('zone_interet_id')->nullable()->constrained()->cascadeOnDelete(); // Zone d'intérêt spécifique
            $table->foreignId('points_interet_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('suiv_mission_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('reconnaissance')->nullable();
            $table->string('photoaerienne')->nullable();
            $table->json('videos')->nullable(); // Chemins vers les vidéos
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suiv_mission_point_interets');
    }
};
