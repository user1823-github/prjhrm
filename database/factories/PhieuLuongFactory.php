<?php

namespace Database\Factories;

use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PhieuLuongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $luongCoBan = $this->faker->numberBetween(5000000, 10000000);
        $phuCap = $this->faker->numberBetween(500000, 1000000);
        $gioLam = $this->faker->numberBetween(120, 180);
        $gioOT = $this->faker->numberBetween(0, 20);
        $luongGio = $luongCoBan / $gioLam;
        $luongOT = $gioOT * $luongGio;
        $luongThuong = $this->faker->numberBetween(0, 200000);
        $tongCong = $gioLam * $luongGio + $luongOT + $luongThuong;
        $luongHeSo = $tongCong - $luongCoBan;
        $tongCongCoHeSo =  $gioLam * $luongGio + $luongOT + $luongThuong + $luongHeSo;
        $luongTinhHeSo = $tongCongCoHeSo - $luongCoBan;

        return [
            'kieuLuong' => $this->faker->randomElement([
                'Lương giờ có trừ trễ',
                'Lương giờ không trừ trễ',
                'Lương giờ làm bao nhiêu tính bấy nhiêu',
                'Lương tháng có trừ trễ',
                'Lương tháng không trừ trễ',
                'Lương tháng làm bao nhiêu tính bấy nhiêu',
            ]),
            'luongCoBan' => $luongCoBan,
            // 'luongGio' => $luongGio,
            // 'gioLam' => $gioLam,
            // 'caLam' => round($gioLam / 8),
            // 'gioOT' => $gioOT,
            // 'caOT' => round($gioOT / 8),
            // 'luongOT' => $luongOT,
            // 'luongHeSo' => $luongTinhHeSo,
            // 'luongThuong' => $luongThuong,
            // 'tongCong' => $tongCong,
            'phuCap' => $phuCap,
            'maNV' => NhanVien::inRandomOrder()->first()->maNV,
        ];
    }
}
