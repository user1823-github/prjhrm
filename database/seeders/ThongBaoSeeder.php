<?php

namespace Database\Seeders;

use App\Models\ThongBao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThongBao::factory()->count(10)->create();
    }
}
