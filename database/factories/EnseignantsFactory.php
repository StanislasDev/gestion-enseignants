<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enseignants>
 */
class EnseignantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->dateTimeBetween('-1 year');
        return [
            'nom' => fake()->unique()->words(1, true),
            'prenom' => fake()->unique()->words(1, true),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->unique()->phoneNumber(),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
