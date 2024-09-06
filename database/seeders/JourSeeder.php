<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jours = [
            ['nom' => 'Lundi'],
            ['nom' => 'Mardi'],
            ['nom' => 'Mercredi'],
            ['nom' => 'Jeudi'],
            ['nom' => 'Vendredi'],
            ['nom' => 'Samedi'],
        ];

        \DB::table('jours')->insert($jours);
    }
}
