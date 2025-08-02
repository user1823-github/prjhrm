<?php

namespace Database\Factories;

use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VanTayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'credentialID' => base64_encode(random_bytes(32)),
            'khoaCongKhai' => base64_encode(random_bytes(64)),
            'phuongThucKetNoi' => $this->faker->randomElement(['usb', 'ble']),
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
