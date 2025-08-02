<?php

namespace Database\Seeders;

use App\Models\ChiTietCaLam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChiTietCaLamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiTietCaLam::create([
            'thuTrongTuan' => 2,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 1,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 3,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 1,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 4,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 1,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 5,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 1,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 6,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 1,
        ]);

        // Parttime
        ChiTietCaLam::create([
            'thuTrongTuan' => 2,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 2,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 3,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 2,
        ]);


        ChiTietCaLam::create([
            'thuTrongTuan' => 4,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 2,
        ]);

        // Overtime
        ChiTietCaLam::create([
            'thuTrongTuan' => 3,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 3,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 5,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '12:00',
            // 'tgBatDauNghi' => '12:00',
            // 'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 3,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 7,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 3,
        ]);

        // 4
        ChiTietCaLam::create([
            'thuTrongTuan' => 2,
            'tgBatDau' => '13:00',
            'tgKetThuc' => '17:00',
            // 'tgBatDauNghi' => '12:00',
            // 'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 4,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 4,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '12:00',
            // 'tgBatDauNghi' => '12:00',
            // 'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 4,
        ]);

        ChiTietCaLam::create([
            'thuTrongTuan' => 6,
            'tgBatDau' => '08:00',
            'tgKetThuc' => '17:00',
            'tgBatDauNghi' => '12:00',
            'tgKetThucNghi' => '13:00',
            'heSoLuong' => 1,
            'tienThuong' => 0,
            'maCL' => 4,
        ]);
    }
}
