<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mal_id' => fake()->unique()->numberBetween(1, 99999),
            'image_url' => fake()->imageUrl(),
            'title' => fake()->words(3, true),
            'score' => fake()->randomFloat(2, 1, 10),
            'episodes' => fake()->numberBetween(1, 100),
        ];
    }
}