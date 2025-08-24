<?php

namespace Database\Factories;

use App\Models\LichLamViec;
use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonPhep>
 */
class DonPhepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 months', '+1 months');
        $end = (clone $start)->modify('+' . rand(1, 3) . ' days');

        return [
            'ngayTao' => now()->toDateTimeString(), // Ví dụ: "2025-07-17 14:32:11"
            'loaiNghiPhep' => $this->faker->randomElement(['Nghỉ không lương', 'Nghỉ có việc riêng', 'Nghỉ cưới xin',  'Nghỉ con kết hôn', 'Nghỉ ma chay', 'Nghỉ phép ốm', 'Nghỉ thai sản']),
            'lyDo' => $this->faker->sentence(),
            'ngayNghi' => $this->faker->date(),
            'batDauNghi' => $start->format('H:i'),
            'ketThucNghi' => $end->format('H:i'),
            'hinhAnh' => $this->faker->imageUrl(640, 480, 'documents', true),
            'trangThai' => $this->faker->randomElement(['Chờ duyệt', 'Đã duyệt', 'Từ chối']),
            // 'nhanXet' => NhanVien::inRandomOrder()->first()->hoTen,
            // 'truPhep' => NhanVien::inRandomOrder()->first()->hoTen,
            'maLLV' => LichLamViec::inRandomOrder()->first()->maLLV,
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
