<?php

namespace Database\Seeders;

use App\Models\Seances;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seances::create([
                    'titre' => 'Cours de mathématiques',
                    'id_classe' => 1,
                    'id_jou' => 1,
                    'id_enseignant' => 1,
                    'date' => '2023-05-15',
                    'heure_debut' => '08:00:00',
                    'heure_fin' => '10:00:00',
                ]);
        
                Seances::create([
                    'titre' => 'Cours de français',
                    'id_classe' => 2,
                    'id_jou' => 2,
                    'id_enseignant' => 2,
                    'date' => '2023-05-16',
                    'heure_debut' => '10:30:00',
                    'heure_fin' => '12:30:00',
                ]);
        
                Seances::create([
                    'titre' => 'Cours de sciences',
                    'id_classe' => 3,
                    'id_jou' => 3,
                    'id_enseignant' => 3,
                    'date' => '2023-05-17',
                    'heure_debut' => '14:00:00',
                    'heure_fin' => '16:00:00',
                ]);
        
    }
}
