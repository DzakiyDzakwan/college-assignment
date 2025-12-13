<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Dosen::create([
            'NIP'=> '210293001',
            'NIDN'=> '210293001',
            'user'=> '2114021232',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293002',
            'NIDN'=> '210293002',
            'user'=> '2114021231',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293003',
            'NIDN'=> '210293003',
            'user'=> '2114021233',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293004',
            'NIDN'=> '210293004',
            'user'=> '2114021244',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '190481502',
            'NIDN'=> '190481502',
            'user'=> '1945723371',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '190481505',
            'NIDN'=> '190481505',
            'user'=> '1945723372',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '190481507',
            'NIDN'=> '190481507',
            'user'=> '1945723373',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '201643244',
            'NIDN'=> '204651354',
            'user'=> '2114059726',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '206513216',
            'NIDN'=> '203114456',
            'user'=> '2044024384',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '206464487',
            'NIDN'=> '200641987',
            'user'=> '2110464123',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '223120046',
            'NIDN'=> '214652008',
            'user'=> '23154212546',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293013',
            'NIDN'=> '210009013',
            'user'=> '21140271206',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293014',
            'NIDN'=> '210297764',
            'user'=> '21140281229',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293015',
            'NIDN'=> '210292265',
            'user'=> '21140207070',
            'status'=>'aktif'
            
        ]);

        Dosen::create([
            'NIP'=> '210293016',
            'NIDN'=> '211133016',
            'user'=> '21140280555',
            'status'=>'aktif'
            
        ]);

        /* Dosen::factory(4)->create(); */
    }
}
