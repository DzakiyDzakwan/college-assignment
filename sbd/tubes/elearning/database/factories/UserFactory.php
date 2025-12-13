<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NIK' => $this->faker->nik(),
            'email' => $this->faker->unique()->safeEmail(),
            'nomor_hp' => $this->faker->phoneNumber(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'jenis_kelamin' => $this->faker->randomElement(['pria', 'wanita']),
            'agama' => $this->faker->randomElement(['kristen', 'katolik']),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA']),
            'email_verified_at' => now(),
            'alamat' => $this->faker->address(),
            'tgl_lahir' => $this->faker->date(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => $this->faker->randomElement(['mahasiswa', 'dosen']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
