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
        Schema::create('suiv_exec_missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plannig_mission_id')->nullable()->constrained()->onDelete();
            $table->boolean('execution');
            $table->string('remarque_exec');
            $table->dateTime('date_execution');
            $table->dateTime('date_finished');
            $table->string('description_image');
            $table->$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suiv_exec_missions');
    }
};
