<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = collect(['Niveau I', 'Niveau II', 'Niveau Licence pro']);

        $niveaux->each(fn ($niveau) => Niveau::create([
            'nom' => $niveau,
            'slug' => Str::slug($niveau),
        ]));
    }
}
