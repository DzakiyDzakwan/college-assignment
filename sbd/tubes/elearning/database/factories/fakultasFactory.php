<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dosen;

class fakultasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_fakultas' => $this->faker->numerify('FK####'),
            'nama_fakultas' => $this->faker->numerify('Fakultas ##'),
            'dekan' => Dosen::factory()->create()->NIP
        ];
    }
}
