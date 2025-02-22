<?php

namespace Database\Seeders;

use App\Models\HopThoai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HopThoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HopThoai::factory()->count(3)->create();
    }
}
