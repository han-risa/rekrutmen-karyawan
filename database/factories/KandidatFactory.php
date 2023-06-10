<?php

namespace Database\Factories;

use App\Models\Kandidat;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kandidat>
 */
class KandidatFactory extends Factory
{
    protected $model = Kandidat::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        return [
            'nama' => $this->faker->name($gender),
            'jenisKelamin' => $this->$gender,
            'alamat' => $this->faker->address,
            'noHp' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
