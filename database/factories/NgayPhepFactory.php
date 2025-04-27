<?php

namespace Database\Factories;

use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NgayPhep>
 */
class NgayPhepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $soNgay = $this->faker->numberBetween(6, 12);
        $daNghi = $this->faker->numberBetween(0, $soNgay);
        return [
            'namPhep' => $this->faker->numberBetween(2024, 2025),
            'soNgay' => $soNgay,
            'daNghi' => $daNghi,
            'conLai' => $soNgay - $daNghi,
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
