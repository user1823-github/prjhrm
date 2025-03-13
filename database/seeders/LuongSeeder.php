<?php

namespace Database\Seeders;

use App\Models\Luong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Luong::create([
            'kieuLuong' => 'Lương giờ có trừ trễ',
            'maLuong' => 1,
        ]);

        Luong::create([
            'kieuLuong' => 'Lương giờ không trừ trễ',
            'maLuong' => 2,
        ]);

        Luong::create([
            'kieuLuong' => 'Lương giờ làm bao nhiêu tính bấy nhiêu',
            'maLuong' => 3,
        ]);

        Luong::create([
            'kieuLuong' => 'Lương tháng có trừ trễ',
            'maLuong' => 4,
        ]);

        Luong::create([
            'kieuLuong' => 'Lương tháng không trừ trễ',
            'maLuong' => 5,
        ]);

        Luong::create([
            'kieuLuong' => 'Lương tháng làm bao nhiêu tính bấy nhiêu',
            'maLuong' => 6,
        ]);
    }
}
