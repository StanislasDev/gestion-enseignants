<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = Niveau::all();
        \DB::table('classes')->insert(
            [

                [
                    'nom_classe' => 'Génie Logiciel',
                    'niveau_id' => $niveaux->random()->id,
                ],

                [
                    'nom_classe' => 'Génie Civil',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie Electrique',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie Mécanique',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie Informatique',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie Chimique',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie Biomédical',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie Industriel',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie des Matériaux',
                    'niveau_id' => $niveaux->random()->id,
                ],
                [
                    'nom_classe' => 'Génie des Procédés',
                    'niveau_id' => $niveaux->random()->id,
                ]
            ]
        );
    }
}
