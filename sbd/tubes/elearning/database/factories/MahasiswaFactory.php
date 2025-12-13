<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Jurusan;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NIM' => $this->faker->numerify('#########'),
            'NISN' => $this->faker->numerify('#########'),
            'semester' => $this->faker->numerify('##'),
            'program' => $this->faker->randomElement(['D3', 'S1', 'S2', 'S3']),
            'angkatan' => $this->faker->year(),
            'status' => $this->faker->randomElement(['aktif', 'inactive']),
            'user' => User::factory()->create()->NIK,
            'jurusan' => Jurusan::factory()->create()->kode_jurusan
        ];
    }
}
