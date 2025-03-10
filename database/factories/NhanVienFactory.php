<?php

namespace Database\Factories;

use App\Models\Luong;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhanVien>
 */
class NhanVienFactory extends Factory
{
    

    protected $model = NhanVien::class;
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
            'trangthai'   => $this->faker->boolean(), // true: Hoạt động, false: Không hoạt động
            'maTK' => TaiKhoan::inRandomOrder()->first()->maTK, // Lấy tài khoản ngẫu nhiên
            'maLuong' => Luong::inRandomOrder()->first()->maLuong, // Lấy tài khoản ngẫu nhiên
        ];
    }
}
