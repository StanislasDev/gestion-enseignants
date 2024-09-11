<?php

namespace Database\Seeders;
// database/seeders/PresenceSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Presences;
use App\Models\Enseignants;
use App\Models\Seances;
use Carbon\Carbon;

class PresenceSeeder extends Seeder
{
    public function run()
    {
        $enseignants = Enseignants::all();
        $seances = Seances::all();
        $statuts = ['présent(e)', 'absent(e)', 'retard'];

        foreach ($enseignants as $enseignant) {
            foreach ($seances as $seance) {
                Presences::create([
                    'id_enseignant' => $enseignant->id,
                    'id_seance' => $seance->id,
                    'date' => Carbon::now()->format('Y-m-d'),
                    'heure_arrivee' => Carbon::now()->subMinutes(rand(0, 60))->format('H:i:s'),
                    'heure_depart' => Carbon::now()->addMinutes(rand(0, 60))->format('H:i:s'),
                    'statut' => $statuts[array_rand($statuts)],
                ]);
            }
        }
    }
}
