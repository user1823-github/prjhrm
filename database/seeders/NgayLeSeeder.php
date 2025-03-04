<?php

namespace Database\Seeders;

use App\Models\NgayLe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NgayLeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NgayLe::factory()->count(5)->create();
    }
}
