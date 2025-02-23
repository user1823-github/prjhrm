<?php

namespace Database\Seeders;

use App\Models\CaLam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaLamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaLam::factory()->count(3)->create();
    }
}
