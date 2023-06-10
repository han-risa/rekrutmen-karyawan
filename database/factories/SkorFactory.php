<?php

namespace Database\Factories;

use App\Models\Skor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skor>
 */
class SkorFactory extends Factory
{
    protected $model = Skor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'komunikasi' => $this->faker->numberBetween(0, 40),
            'kerjasama' => $this->faker->numberBetween(0, 40),
            'kejujuran' => $this->faker->numberBetween(0, 40),
            'interpersonal' => $this->faker->numberBetween(0, 40),
        ];
    }
}
