<?php

namespace Database\Factories;

use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaiSan>
 */
class TaiSanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenTaiSan'   => $this->faker->words(3, true),  // Ví dụ: "Laptop Dell XPS"
            'loaiTaiSan'  => $this->faker->randomElement(['Máy tính', 'Điện thoại', 'Bàn ghế', 'Xe máy']),
            'soLuong'     => $this->faker->numberBetween(1, 20),
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
