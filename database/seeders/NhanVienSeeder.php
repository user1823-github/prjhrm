<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // NhanVien::factory()->count(10)->create();

        $taiKhoans = TaiKhoan::factory(10)->create();

        // Tạo nhân viên và gán mỗi tài khoản cho một nhân viên
        $taiKhoans->each(function ($taiKhoan) {
            NhanVien::factory()->create([
                'maTK' => $taiKhoan->maTK, // Mỗi tài khoản chỉ có một nhân viên
            ]);
        });

        
    }
}
