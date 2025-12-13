<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class dosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NIP' => $this->faker->numerify('#########'),
            'NIDN' => $this->faker->numerify('#########'),
            'status' => $this->faker->randomElement(['aktif', 'inaktif']),
            'user' => User::factory()->create()->NIK
        ];
    }
}
