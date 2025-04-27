<?php

namespace Database\Seeders;

use App\Models\NgayPhep;
use App\Models\NhanVien;
use App\Models\PhieuLuong;
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
            $nhanVien = NhanVien::factory()->create([
                'maTK' => $taiKhoan->maTK, // Mỗi tài khoản chỉ có một nhân viên
            ]);
            NgayPhep::factory()->create([
                'maNV' => $nhanVien->maNV,
            ]);
            PhieuLuong::factory()->create([
                'maNV' => $nhanVien->maNV,
            ]);
        });
    }
}
