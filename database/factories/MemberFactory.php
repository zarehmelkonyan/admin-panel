<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'slug' => fake()->slug(),
            'avatar' => fake()->imageUrl(),
            'position' =>fake()->jobTitle(),
            'salary' => fake()->numberBetween(1000000,1000000),
            'gender' => fake()->randomElement(['male', 'female']),
            'age' => fake()->numberBetween(18,63),
            'started_at' => fake()->date()
        ];
    }
}
;




