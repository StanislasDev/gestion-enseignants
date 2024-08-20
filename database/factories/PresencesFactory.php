<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presences>
 */
class PresencesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'heure_arrivee' => fake()->time(),
            'heure_depart' => fake()->time(),
            'statut' => fake()->randomElement(['present(e)', 'absent(e)', 'retard']),
            'id_enseignant' => fake()->numberBetween(1, 10), // Assuming you have 10 users in your database
            'id_seance' => fake()->numberBetween(1, 10), // Assuming you have 10 sessions in your database
        ];
    }
}
