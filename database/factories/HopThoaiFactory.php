<?php

namespace Database\Factories;

use App\Models\HopThoai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HopThoai>
 */
class HopThoaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = HopThoai::class;
    public function definition(): array
    {
        return [
            'tieuDe' => $this->faker->sentence(6), // Tạo tiêu đề ngẫu nhiên
            'noiDung' => $this->faker->paragraph(3), // Tạo nội dung ngẫu nhiên
            'url' => $this->faker->optional()->url(), // Đôi khi có URL
            'soLanHienThi' => $this->faker->numberBetween(1, 50), // Số lần hiển thị
            'tgBatDau' => $this->faker->dateTimeBetween('-1 month', 'now'), // Ngày bắt đầu
            'tgKetThuc' => $this->faker->dateTimeBetween('now', '+1 month'), // Ngày kết thúc
            'iconHienThi' => 'icons/default.png', // Đường dẫn mặc định cho icon
        ];
    }
}
