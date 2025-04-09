<?php

namespace Database\Seeders;

use App\Models\DiaChiIP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaChiIPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiaChiIP::factory()->count(7)->create();
    }
}
