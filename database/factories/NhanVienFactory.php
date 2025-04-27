<?php

namespace Database\Factories;

use App\Models\NhanVien;
use App\Models\PhieuLuong;
use App\Models\TaiKhoan;
use App\Models\ThanhToan;
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
            
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (NhanVien $nhanVien) {
            // Mỗi nhân viên sẽ có từ 1 đến 3 phương thức thanh toán
            ThanhToan::factory()->count(rand(1, 3))->create(['maNV' => $nhanVien->maNV]);
        });
    }
}
