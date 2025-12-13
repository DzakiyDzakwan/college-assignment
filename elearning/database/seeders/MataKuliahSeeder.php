<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mata_kuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK001',
            'nama_matkul'=>'Ilmu Pendidikan Dokter',
            'sks'=>'3',
            'jurusan'=>'JR001'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK002',
            'nama_matkul'=>'Dasar Dasar Pendidikan Dokter',
            'sks'=>'2',
            'jurusan'=>'JR001'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK003',
            'nama_matkul'=>'Ilmu Biomedika',
            'sks'=>'3',
            'jurusan'=>'JR002'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK004',
            'nama_matkul'=>'Dasar Dasar Biomedika',
            'sks'=>'3',
            'jurusan'=>'JR002'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK005',
            'nama_matkul'=>'Dasar Dasar Kedokteran',
            'sks'=>'2',
            'jurusan'=>'JR003'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK006',
            'nama_matkul'=>'Biologi Lanjutan',
            'sks'=>'2',
            'jurusan'=>'JR003'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK007',
            'nama_matkul'=>'Dasar Dasar Teknik Sipil',
            'sks'=>'2',
            'jurusan'=>'JR004'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK008',
            'nama_matkul'=>'Pengantar Teknik Sipil',
            'sks'=>'2',
            'jurusan'=>'JR004'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK009',
            'nama_matkul'=>'Dasar Dasar Teknik Lingkungan',
            'sks'=>'2',
            'jurusan'=>'JR005'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK010',
            'nama_matkul'=>'Pengantar Teknik Lingkungan',
            'sks'=>'2',
            'jurusan'=>'JR005'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK011',
            'nama_matkul'=>'Web Basic',
            'sks'=>'3',
            'jurusan'=>'JR006'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK012',
            'nama_matkul'=>'Ilmu Pengantar Teknik Informatika',
            'sks'=>'3',
            'jurusan'=>'JR006'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK013',
            'nama_matkul'=>'Dasar Dasar Pemrograman Teknik Informatika',
            'sks'=>'3',
            'jurusan'=>'JR006'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK014',
            'nama_matkul'=>'Sejarah Indonesia',
            'sks'=>'2',
            'jurusan'=>'JR007'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK015',
            'nama_matkul'=>'Puisi',
            'sks'=>'2',
            'jurusan'=>'JR007'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK016',
            'nama_matkul'=>'Sejarah Jepang',
            'sks'=>'2',
            'jurusan'=>'JR008'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK017',
            'nama_matkul'=>'Hakyu',
            'sks'=>'2',
            'jurusan'=>'JR008'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK018',
            'nama_matkul'=>'Pengenalan Perangkat Lunak',
            'sks'=>'2',
            'jurusan'=>'JR009'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK019',
            'nama_matkul'=>'Pengenalan Perangkat Keras',
            'sks'=>'2',
            'jurusan'=>'JR009'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK020',
            'nama_matkul'=>'Pemrograman Web',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK021',
            'nama_matkul'=>'Dasar Dasar Pemrograman Teknologi Informasi',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK022',
            'nama_matkul'=>'Sistem Basis Data',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);
        
        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK023',
            'nama_matkul'=>'Rencana Bisnis',
            'sks'=>'3',
            'jurusan'=>'JR012'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK024',
            'nama_matkul'=>'Marketing',
            'sks'=>'2',
            'jurusan'=>'JR012'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK025',
            'nama_matkul'=>'Statstika Ekonomi dan Bisnis',
            'sks'=>'3',
            'jurusan'=>'JR013'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK026',
            'nama_matkul'=>'Sistem Akuntansi Sektor Publik',
            'sks'=>'3',
            'jurusan'=>'JR013'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK027',
            'nama_matkul'=>'Manajemen Kinerja SDM',
            'sks'=>'2',
            'jurusan'=>'JR014'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK028',
            'nama_matkul'=>'Manajemen Investasi',
            'sks'=>'3',
            'jurusan'=>'JR014'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK029',
            'nama_matkul'=>'Praktikum Sistem Basis Data',
            'sks'=>'1',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK030',
            'nama_matkul'=>'Pemrograman Web Lanjutan',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK031',
            'nama_matkul'=>'Praktikum Pemrograman Web Lanjutan',
            'sks'=>'1',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK032',
            'nama_matkul'=>'Struktur Data dan Algoritma',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK033',
            'nama_matkul'=>'Praktikum Struktur Data dan Algoritma',
            'sks'=>'1',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK034',
            'nama_matkul'=>'Pemrograman Berorientasi Objek',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK035',
            'nama_matkul'=>'Pemrograman Berorientasi Objek',
            'sks'=>'1',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK036',
            'nama_matkul'=>'Organisasi dan Arsitektur Komputer',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK037',
            'nama_matkul'=>'Pengantar Teknologi Informasi',
            'sks'=>'2',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK038',
            'nama_matkul'=>'Routing Jaringan',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK039',
            'nama_matkul'=>'Efek Visual dan Animasi',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK040',
            'nama_matkul'=>'Pemrograman Integrative',
            'sks'=>'3',
            'jurusan'=>'JR010'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK041',
            'nama_matkul'=>'Etika Politik',
            'sks'=>'3',
            'jurusan'=>'JR021'
        ]);

        Mata_kuliah::create([
            'kode_mata_kuliah'=>'MK042',
            'nama_matkul'=>'Sistem Perwakilan Politik',
            'sks'=>'2',
            'jurusan'=>'JR021'
        ]);


        /* Mata_kuliah::factory(8)->create(); */
    }
}
