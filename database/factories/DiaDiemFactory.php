<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiaDiem>
 */
class DiaDiemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenDiaDiem' => $this->faker->company . ' - ' . $this->faker->city,
            'viDo' => $this->faker->latitude(8, 23),   // Trong khoảng của Việt Nam
            'kinhDo' => $this->faker->longitude(102, 110),
            'banKinh' => $this->faker->numberBetween(50, 1000), // mét
            'trangThai' => $this->faker->boolean(90), // 90% true
        ];
    }
}
