<?php

namespace Database\Seeders;

use App\Models\DiaDiem;
use App\Models\DiaDiemLichLamViec;
use App\Models\LichLamViec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaDiemLichLamViecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách mã lịch làm việc và mã địa chỉ IP
        $dsLLV = LichLamViec::pluck('maLLV')->toArray();
        $dsDiaDiem = DiaDiem::pluck('maDD')->toArray();

        foreach ($dsLLV as $maLLV) {
            // Chọn ngẫu nhiên 1-2 địa điểm cho mỗi lịch làm việc
            $ddNgauNghien = collect($dsDiaDiem)->random(rand(1, 2));

            foreach ($ddNgauNghien as $maDD) {
                // Tạo mới nếu chưa tồn tại
                DiaDiemLichLamViec::firstOrCreate(
                    [
                        'maDD' => $maDD,
                        'maLLV' => $maLLV,
                    ],
                    [
                        'trangThai' => (bool)rand(0, 1),
                    ]
                );
            }
        }
    }
}
