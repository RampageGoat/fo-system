<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numOfRoom' => mt_rand(1,3),
            'checkIn' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'checkOut' => fake()->dateTimeThisMonth('+12 days'),
            'priceSum' => 250000,
            'customers_id' => mt_rand(1,9),
            'room_id' => mt_rand(1,5),
            'status' => mt_rand(1,3),
            'note' => ''
        ];
    }
}
