<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fakultas;

class jurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_jurusan' => $this->faker->numerify('JR####'),
            'nama_jurusan' => $this->faker->numerify('Jurusan ##'),
            'degree' => $this->faker->randomElement(['S1', 'S2', 'S3']),
            'fakultas_id' => Fakultas::factory()->create()->kode_fakultas
        ];
    }
}
