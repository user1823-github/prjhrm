<?php

namespace Database\Factories;

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
            'loaiNghiPhep' => $this->faker->randomElement(['Nghỉ phép năm', 'Nghỉ không lương', 'Nghỉ có lương', 'Nghỉ đột xuất', 'Nghỉ phép ốm', 'Nghỉ thai sản']),
            'lyDo' => $this->faker->sentence(),
            'ngayNghi' => $this->faker->date(),
            'batDauNghi' => $start->format('H:i'),
            'ketThucNghi' => $end->format('H:i'),
            'hinhAnh' => $this->faker->imageUrl(640, 480, 'documents', true),
            'trangThai' => $this->faker->randomElement(['Chờ duyệt', 'Đã duyệt', 'Từ chối']),
            'nguoiDuyet' => NhanVien::inRandomOrder()->first()->hoTen,
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
