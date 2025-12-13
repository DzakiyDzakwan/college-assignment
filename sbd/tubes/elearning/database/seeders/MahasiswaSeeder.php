<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Jurusan;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'NIM' => '211002001',
            'NISN' => '1',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '193901001',
            'jurusan' => 'JR001'
        ]);

        Mahasiswa::create([
            'NIM' => '211402002',
            'NISN' => '2',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '193901002',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '211402075',
            'NISN' => '3',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '211402075',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '211402001',
            'NISN' => '4',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '211402001',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '216020109',
            'NISN' => '5',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '216020109',
            'jurusan' => 'JR011'
        ]);

        Mahasiswa::create([
            'NIM' => '216020106',
            'NISN' => '6',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '216020106',
            'jurusan' => 'JR011'
        ]);

        Mahasiswa::create([
            'NIM' => '2194202015',
            'NISN' => '7',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '2194202015',
            'jurusan' => 'JR012'
        ]);

        Mahasiswa::create([
            'NIM' => '219420209',
            'NISN' => '8',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '2194202018',
            'jurusan' => 'JR012'
        ]);

        Mahasiswa::create([
            'NIM' => '2162201001',
            'NISN' => '9',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '2162201001',
            'jurusan' => 'JR013'
        ]);

        Mahasiswa::create([
            'NIM' => '2162201015',
            'NISN' => '10',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '22154685512',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '2162231211',
            'NISN' => '11',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '22132215406',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '2162201132',
            'NISN' => '12',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '211454877651',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '211402091',
            'NISN' => '122226709',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '21140204880',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '211402092',
            'NISN' => '122226710',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '21140299041',
            'jurusan' => 'JR010'
        ]);

        Mahasiswa::create([
            'NIM' => '211402088',
            'NISN' => '122226880',
            'semester' => '1',
            'program' => 'S1',
            'angkatan' => '2021',
            'status' => 'aktif',
            'user' => '21140291041',
            'jurusan' => 'JR025'
        ]);



        /* Mahasiswa::factory(20)->create(); */
    }
}
