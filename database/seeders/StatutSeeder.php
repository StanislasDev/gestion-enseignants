<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuts = collect([
            'Présent(e)',
            'Absent(e)',
            'Retard',
        ]);

        $statuts->each(fn ($statut) => Statut::create([
            'nom' => $statut,
            'slug' => Str::slug($statut),
        ]));
    }
}
