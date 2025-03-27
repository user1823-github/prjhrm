<?php

namespace Database\Factories;

use App\Models\ChiTietCaLam;
use App\Models\NgayLe;
use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LichLamViec>
 */
class LichLamViecFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenCa' => $this->faker->randomElement(['Ca Sáng', 'Ca Chiều', 'Ca Đêm']),
            'ngayLamViec' => $this->faker->date(),
            'tgBatDau' => $this->faker->time(),
            'tgKetThuc' => $this->faker->time(),
            'tgBatDauNghi' => $this->faker->optional()->time(),
            'tgKetThucNghi' => $this->faker->optional()->time(),
            'tgCheckInSom' => $this->faker->numberBetween(1, 5),
            'tgCheckOutMuon' => $this->faker->numberBetween(1, 5),
            'heSoLuong' => $this->faker->randomFloat(2, 1, 3),
            'tienThuong' => $this->faker->randomFloat(2, 100, 1000),
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
            'maNL' => NgayLe::inRandomOrder()->first()->maNL,
            'maCTCL' => ChiTietCaLam::inRandomOrder()->first()->maCTCL
        ];
    }
}
