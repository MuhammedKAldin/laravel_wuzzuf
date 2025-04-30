<?php

namespace Database\Factories;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => \App\Models\User::factory(), // or a specific employer ID
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->sentence(),
            'responsibility' => $this->faker->sentence(),
            'qualifications' => $this->faker->sentence(),
            'level' => $this->faker->sentence(),
            'benifits' => $this->faker->sentence(),
            'location' => $this->faker->city(),
            'availability' => 'Freelance',
            'category_id' => rand(1, 8), // Categories are from 1 to 8
        ];
    }
}
