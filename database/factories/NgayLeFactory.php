<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NgayLe>
 */
class NgayLeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('2025-01-01', '2025-12-31');
        $endDate = (clone $startDate)->modify('+1 day'); // Kết thúc sau 1 ngày
        return [
            'tieuDe' => $this->faker->sentence(3), // Tiêu đề ngẫu nhiên
            'tgBatDau' => $startDate,
            'tgKetThuc' => $endDate,
            'mauSac' => $this->faker->hexColor(), // Màu sắc ngẫu nhiên
        ];
    }
}
