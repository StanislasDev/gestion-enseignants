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
        Schema::create('jours', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });

        // Insertion des jours de la semaine
        DB::table('jours')->insert([
            ['nom' => 'Lundi'],
            ['nom' => 'Mardi'],
            ['nom' => 'Mercredi'],
            ['nom' => 'Jeudi'],
            ['nom' => 'Vendredi'],
            ['nom' => 'Samedi'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jours');
    }
};
