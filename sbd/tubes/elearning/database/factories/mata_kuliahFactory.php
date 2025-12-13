<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

class mata_kuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_mata_kuliah' => $this->faker->numerify('MK####'),
            'nama_matkul' => $this->faker->numerify('Mata Kuliah ##'),
            'sks' => $this->faker->numerify('##'),
            'jurusan' => Jurusan::factory()->create()->kode_jurusan
        ];
    }
}
