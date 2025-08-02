<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaLam>
 */
class CaLamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tenCa' => $this->faker->randomElement(['Fulltime', 'Part-time', 'Ca Phát', 'Ca Thoại', 'Ca Phát(2)']),
            'gioCheckInSom' => $this->faker->numberBetween(1, 6),
            'gioCheckOutMuon' => $this->faker->numberBetween(1, 6)
        ];
    }
}
