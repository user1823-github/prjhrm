<?php

namespace Database\Seeders;

use App\Models\Luong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Luong::factory()->count(10)->create();
    }
}
