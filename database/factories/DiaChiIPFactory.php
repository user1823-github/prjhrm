<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiaChiIP>
 */
class DiaChiIPFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenThietBi' => 'Wifi ' . $this->faker->randomElement(['Văn phòng', 'Bảo vệ', 'Sân banh', 'Công ty 01']) . ' - ' . $this->faker->word(),
            'diaChiIP' => $this->faker->ipv4(),
            'trangThai' => $this->faker->boolean(60),
        ];
    }
}
