<?php

namespace Database\Factories;

use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaiKhoan>
 */
class TaiKhoanFactory extends Factory
{

    protected $model = TaiKhoan::class;

    public function definition(): array
    {
        return [
            'tenTaiKhoan' => $this->faker->unique()->userName(),
            'matKhau' => Hash::make('password'), // Mật khẩu mặc định
            'quyenHan' => $this->faker->randomElement(['admin', 'user']),
        ];
    }
}
