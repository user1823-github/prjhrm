<?php

namespace Database\Seeders;

use App\Models\LichLamViec;
use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LichLamViecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LichLamViec::create([
        //     'thuTrongTuan' => 2,
        //     'tgBatDau' => '08:00',
        //     'tgKetThuc' => '17:00',
        //     'tgBatDauNghi' => '12:00',
        //     'tgKetThucNghi' => '13:00',
        //     'heSoLuong' => 1,
        //     'tienThuong' => 0,
        //     'maCL' => 1,
        // ]);
        // $nhanViens = NhanVien::factory(10)->create();

        // // Tạo nhân viên và gán mỗi tài khoản cho một nhân viên
        // $nhanViens->each(function ($nhanVien) {
        //     LichLamViec::factory()->create([
        //         'maNV' => $nhanVien->maNV, // Mỗi tài khoản chỉ có một nhân viên
        //     ]);
        // });
        LichLamViec::factory(10)->create();
    }
}
