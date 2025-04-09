<?php

namespace Database\Seeders;

use App\Models\DiaChiIP;
use App\Models\DiaChiIPLichLamViec;
use App\Models\LichLamViec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaChiIPLichLamViecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy tất cả ID
        // $dsLLV = LichLamViec::pluck('maLLV')->toArray();
        // $dsIP = DiaChiIP::pluck('maDCIP')->toArray();

        // // Mỗi lịch làm việc gán ngẫu nhiên 1-2 IP
        // foreach ($dsLLV as $maLLV) {
        //     $ipNgauNhien = collect($dsIP)->random(rand(1, 2));

        //     foreach ($ipNgauNhien as $maDCIP) {
        //         // Kiểm tra tránh trùng
        //         $tonTai = DiaChiIPLichLamViec::where('maDCIP', $maDCIP)
        //             ->where('maLLV', $maLLV)
        //             ->exists();

        //         if (!$tonTai) {
        //             DiaChiIPLichLamViec::create([
        //                 'maDCIP' => $maDCIP,
        //                 'maLLV' => $maLLV,
        //                 'trangThai' => (bool)rand(0, 1),
        //             ]);
        //         }
        //     }
        // }

        // Lấy danh sách mã lịch làm việc và mã địa chỉ IP
        $dsLLV = LichLamViec::pluck('maLLV')->toArray();
        $dsIP = DiaChiIP::pluck('maDCIP')->toArray();

        foreach ($dsLLV as $maLLV) {
            // Chọn ngẫu nhiên 1-2 địa chỉ IP cho mỗi lịch làm việc
            $ipNgauNhien = collect($dsIP)->random(rand(1, 2));

            foreach ($ipNgauNhien as $maDCIP) {
                // Tạo mới nếu chưa tồn tại
                DiaChiIPLichLamViec::firstOrCreate(
                    [
                        'maDCIP' => $maDCIP,
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
