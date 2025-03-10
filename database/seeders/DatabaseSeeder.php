<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NgayLeSeeder::class);
        $this->call(CaLamSeeder::class);
        $this->call(ChiTietCaLamSeeder::class);
        $this->call(HopThoaiSeeder::class);
        $this->call(ThongBaoSeeder::class);
        $this->call(TaiLieuSeeder::class);
        $this->call(TaiKhoanSeeder::class);
        $this->call(LuongSeeder::class);
        $this->call(NhanVienSeeder::class);
    }
}
