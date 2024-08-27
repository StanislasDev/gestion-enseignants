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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_enseignant')->constrained('enseignants')->onDelete('cascade');
            $table->foreignId('id_seance')->constrained('seances');
            $table->date('date');
            $table->time('heure_arrivee')->nullable();
            $table->time('heure_depart')->nullable();
            $table->string('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
