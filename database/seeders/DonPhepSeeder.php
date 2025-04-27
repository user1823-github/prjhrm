<?php

namespace Database\Seeders;

use App\Models\DonPhep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonPhepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonPhep::factory()->count(5)->create();
    }
}
