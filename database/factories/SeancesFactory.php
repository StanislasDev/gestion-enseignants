<?php

namespace Database\Factories;

use App\Models\Enseignants;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seances>
 */
class SeancesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'heure_debut' => fake()->time(),
            'heure_fin' => fake()->time(),
            'id_classe' => fake()->numberBetween(1, 10),
            'id_enseignant' => Enseignants::factory(),


        ];
    }
}
