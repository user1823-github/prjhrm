<?php

namespace Database\Seeders;

use App\Models\TaiLieu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaiLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaiLieu::factory()->count(10)->create();
    }
}
