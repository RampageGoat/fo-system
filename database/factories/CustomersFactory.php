<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomersFactory extends Factory
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
            'nik' => fake()->nik(),
            'gender' => 'Laki-Laki' || 'Perempuan',
            'telepon' => fake()->e164PhoneNumber(),
            'alamat' => fake()->address(),
            'ttl' => fake()->date('d/m/Y')

        ];
    }
}
