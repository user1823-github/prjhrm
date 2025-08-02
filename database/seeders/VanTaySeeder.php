<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use App\Models\VanTay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VanTaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Lấy danh sách nhân viên (tối đa 8)
        // $nhanViens = NhanVien::inRandomOrder()->take(8)->get();

        // foreach ($nhanViens as $nv) {
        //     VanTay::updateOrCreate(
        //         ['maNV' => $nv->maNV],
        //         [
        //             'credentialID' => fake()->uuid(),
        //             'khoaCongKhai' => fake()->sha256(),
        //             'phuongThucKetNoi' => fake()->randomElement(['usb', 'nfc', 'ble']),
        //         ]
        //     );
        // }
    }
}
