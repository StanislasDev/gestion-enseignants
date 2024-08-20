<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->dateTimeBetween('-1 year' );
        return [
            'nom_classe' => fake()->randomElement(['Génie Logiciel', 'Génie Civil', 'Génie Electrique', 'Génie Mécanique', 'Génie Informatique', 'Génie Chimique', 'Génie Biomédical', 'Génie Industriel', 'Génie des Matériaux', 'Génie des Procédés']),
            'niveau' => fake()->randomElement(['Niveau I', 'Niveau II', 'Niveau Licence', 'Niveau Licence-pro']),
            'created_at' => $created_at,
            'updated_at' => $created_at,

        ];
    }
}
