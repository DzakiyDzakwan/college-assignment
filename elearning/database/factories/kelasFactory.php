<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dosen;
use App\Models\Mata_kuliah;

class kelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kelas_id' => $this->faker->numerify('MK####'),
            'kelas' => $this->faker->randomElement(['Kom A', 'Kom B', 'Kom C']),
            'dosen' => Dosen::factory()->create()->NIP,
            'mata_kuliah' => Mata_kuliah::factory()->create()->kode_mata_kuliah
        ];
    }
}
