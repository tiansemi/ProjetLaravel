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
            'banque' => 'CI'.rand(100,999),
            'agence' => $this->faker->numerify('#####'),
            'numerocompte' => $this->faker->numerify('###########'),
            'clerib' => $this->faker->numerify('##'),
            'montant' => $this->faker->randomFloat(2, 1000, 50000),
            'domiciliation' => $this->faker->city,
            'statut' => true,
        ];
    }
}
