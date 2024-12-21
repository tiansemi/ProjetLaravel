<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'abonne_id' => \App\Models\Abonne::factory(),
            'libelle' => $this->faker->word,
            'description' => $this->faker->sentence,
            'banque' => 'CI123',
            'agence' => '01234',
            'numerocompte' => $this->faker->numerify('###########'),
            'clerib' => '01',
            'montant' => $this->faker->randomFloat(2, 1000, 50000),
            'domiciliation' => $this->faker->city,
            'statut' => true,
        ];
    }
}
