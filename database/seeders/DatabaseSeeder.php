<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\SeanceSeeder;
use Database\Seeders\PresenceSeeder;
use Database\Seeders\EnseignantSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call(
            [
                NiveauSeeder::class,
                ClasseSeeder::class,
                EnseignantSeeder::class,
                JourSeeder::class,
                SeanceSeeder::class,
                PresenceSeeder::class,
            ]
        );
    }
}
