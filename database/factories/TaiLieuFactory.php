<?php

namespace Database\Factories;

use App\Models\TaiLieu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaiLieuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TaiLieu::class;
    public function definition(): array
    {
        return [
            'tieuDe' => $this->faker->sentence(6),
            'url' => $this->faker->url(),
            'tgBatDau' => now(),
            'tgKetThuc' => now()->addDays(rand(1, 10)), // Kết thúc sau 1-10 ngày
        ];
    }
}
