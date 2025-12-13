<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DosenSeeder::class,
            FakultasSeeder::class,
            JurusanSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
            KelasSeeder::class
        ]);
    }
}
