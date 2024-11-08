<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title'=> fake()->jobTitle(),
            'company'=> fake()->company(),
            'location'=> fake()->city(),
            'type' => fake()->randomElement(['Vollzeit', 'Teilzeit', 'Remote']),
            'salary_min' => fake()->numberBetween(30000, 50000),
            'salary_max' => fake()->numberBetween(51000, 120000),
            'description' => fake()->paragraphs(3, true),
            'requirements' => fake()->paragraphs(2, true),
            'benefits' => fake()->paragraphs(1, true),
            'status' => 'active',

        ];
    }
}
