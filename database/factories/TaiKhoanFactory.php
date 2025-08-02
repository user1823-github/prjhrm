<?php

namespace Database\Factories;

use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaiKhoan>
 */
class TaiKhoanFactory extends Factory
{

    protected $model = TaiKhoan::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('vi_VN');
        $name = $faker->lastName . $faker->firstName;
        $username = strtolower(preg_replace('/[^a-z0-9]/', '', iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name)));

        // Nếu ngắn quá, nối số random
        if (strlen($username) < 6) {
            $username .= rand(100, 999);
        }

        return [
            'tenTaiKhoan' => $username,
            'matKhau' => Hash::make('password'), // Mật khẩu mặc định
            'quyenHan' => $faker->randomElement(['admin', 'user']),
        ];

        // return [
        //     'tenTaiKhoan' => $this->faker->unique()->userName(),
        //     'matKhau' => Hash::make('password'), // Mật khẩu mặc định
        //     'quyenHan' => $this->faker->randomElement(['admin', 'user']),
        // ];
    }
}
