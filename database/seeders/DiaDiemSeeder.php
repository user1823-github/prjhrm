<?php

namespace Database\Seeders;

use App\Models\DiaDiem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaDiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiaDiem::factory()->count(4)->create();
    }
}
