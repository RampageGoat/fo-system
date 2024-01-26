<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(10, 35),
            'class' => mt_rand(1,5),
            'describe' => fake()->sentence(),
            'last_seen' => fake()->dateTimeBetween('-1 week', '+1 week')
        ];
    }
}
