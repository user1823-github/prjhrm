<?php

namespace Database\Factories;

use App\Models\Luong;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Luong>
 */
class LuongFactory extends Factory
{
    protected $model = Luong::class;
    public function definition(): array
    {
        return [
            'kieuLuong' => $this->faker->randomElement([
                'Lương giờ có trừ trễ',
                'Lương giờ không trừ trễ',
                'Lương giờ làm bao nhiêu tính bấy nhiêu',
                'Lương tháng có trừ trễ',
                'Lương tháng không trừ trễ',
                'Lương tháng làm bao nhiêu tính bấy nhiêu',
            ]),
        ];
    }
}
