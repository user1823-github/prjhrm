<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhanVien>
 */
class NhanVienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hoTen' => $this->faker->name(),
            'chucDanh' => $this->faker->jobTitle(),
            'soDienThoai' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'gioiTinh' => $this->faker->randomElement(['Nam', 'Nữ', 'Khác']),
            'ngayVaoLam' => now()->toDateString(),
            'ngaySinh' => $this->faker->optional()->date(),
        ];
    }
}
