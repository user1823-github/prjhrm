<?php

namespace Database\Seeders;

use App\Models\CaLam;
use App\Models\NhanVien;
use App\Models\NhanVienCaLam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhanVienCaLamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dsNV = NhanVien::pluck('maNV')->toArray();
        $dsCL = CaLam::pluck('maCL')->toArray();

        foreach ($dsNV as $maNV) {
            $caLamNgauNhien = collect($dsCL)->random();
            
            NhanVienCaLam::firstOrCreate(
                [
                    'maNV' => $maNV,
                    'maCL' => $caLamNgauNhien,
                ],
            );
        }
    }
}
