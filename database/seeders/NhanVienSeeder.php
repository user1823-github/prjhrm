<?php

namespace Database\Seeders;

use App\Models\CaLam;
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

        // Thêm 3 tài khoản cố định
        $customAccounts = [
            ['tenTaiKhoan' => 'admin', 'matKhau' => bcrypt('123'), 'quyenHan' => 'admin'],
            ['tenTaiKhoan' => '11111', 'matKhau' => bcrypt('123'), 'quyenHan' => 'user'],
            ['tenTaiKhoan' => 'test1', 'matKhau' => bcrypt('123'), 'quyenHan' => 'user'],
        ];

        foreach ($customAccounts as $accountData) {
            $taiKhoan = TaiKhoan::create($accountData);

            $nhanVien = NhanVien::factory()->create([
                'maTK' => $taiKhoan->maTK,
            ]);

            NgayPhep::factory()->create([
                'maNV' => $nhanVien->maNV,
            ]);

            PhieuLuong::factory()->create([
                'maNV' => $nhanVien->maNV,
            ]);
        }

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
