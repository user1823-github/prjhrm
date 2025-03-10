<?php

namespace Database\Factories;

use App\Models\NhanVien;
use App\Models\ThanhToan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThanhToan>
 */
class ThanhToanFactory extends Factory
{
    protected $model = ThanhToan::class;
    public function definition(): array
    {
        return [
            'tenDVhoacNH' => $this->faker->randomElement(['Momo', 'Vietcombank', 'Techcombank', 'BIDV', 'ZaloPay']),
            'soDThoacSTK' => $this->faker->numerify('##########'), // Random số điện thoại hoặc số tài khoản
            'tenChuTaiKhoan' => $this->faker->name(),
            'hinhAnh' => $this->faker->imageUrl(200, 200, 'finance', true, 'QR Code'), // Random ảnh QR
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
