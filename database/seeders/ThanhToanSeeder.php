<?php

namespace Database\Seeders;

use App\Models\ThanhToan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThanhToan::factory()->count(30)->create();
    }
}
