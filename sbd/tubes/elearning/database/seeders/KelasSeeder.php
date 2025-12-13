<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Kelas::create([

            'kelas_id'=>'KLS001',
            'kelas'=>'KOM A',
            'dosen'=>'210293003',
            'mata_kuliah'=>'MK013'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS002',
            'kelas'=>'KOM A',
            'dosen'=>'210293003',
            'mata_kuliah'=>'MK021'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS003',
            'kelas'=>'KOM A',
            'dosen'=>'210293002',
            'mata_kuliah'=>'MK020'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS004',
            'kelas'=>'KOM B',
            'dosen'=>'210293002',
            'mata_kuliah'=>'MK021'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS005',
            'kelas'=>'KOM A',
            'dosen'=>'210293004',
            'mata_kuliah'=>'MK022'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS006',
            'kelas'=>'KOM C',
            'dosen'=>'190481502',
            'mata_kuliah'=>'MK023'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS007',
            'kelas'=>'KOM A',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK024'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS008',
            'kelas'=>'KOM C',
            'dosen'=>'190481507',
            'mata_kuliah'=>'MK025'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS009',
            'kelas'=>'KOM C',
            'dosen'=>'190481507',
            'mata_kuliah'=>'MK026'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS010',
            'kelas'=>'KOM A',
            'dosen'=>'190481502',
            'mata_kuliah'=>'MK026'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS011',
            'kelas'=>'KOM B',
            'dosen'=>'190481502',
            'mata_kuliah'=>'MK022'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS012',
            'kelas'=>'KOM C',
            'dosen'=>'190481502',
            'mata_kuliah'=>'MK022'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS013',
            'kelas'=>'KOM A',
            'dosen'=>'210293004',
            'mata_kuliah'=>'MK029'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS014',
            'kelas'=>'KOM B',
            'dosen'=>'190481502',
            'mata_kuliah'=>'MK029'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS015',
            'kelas'=>'KOM C',
            'dosen'=>'190481502',
            'mata_kuliah'=>'MK029'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS016',
            'kelas'=>'KOM A',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK030'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS017',
            'kelas'=>'KOM B',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK030'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS018',
            'kelas'=>'KOM C',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK030'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS019',
            'kelas'=>'KOM A',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK031'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS020',
            'kelas'=>'KOM B',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK031'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS021',
            'kelas'=>'KOM C',
            'dosen'=>'190481505',
            'mata_kuliah'=>'MK031'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS022',
            'kelas'=>'KOM A',
            'dosen'=>'210293014',
            'mata_kuliah'=>'MK038'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS023',
            'kelas'=>'KOM B',
            'dosen'=>'210293014',
            'mata_kuliah'=>'MK038'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS024',
            'kelas'=>'KOM A',
            'dosen'=>'210293014',
            'mata_kuliah'=>'MK039'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS025',
            'kelas'=>'KOM C',
            'dosen'=>'210293015',
            'mata_kuliah'=>'MK036'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS026',
            'kelas'=>'KOM B',
            'dosen'=>'210293015',
            'mata_kuliah'=>'MK037'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS027',
            'kelas'=>'KOM A',
            'dosen'=>'210293015',
            'mata_kuliah'=>'MK040'

        ]);

        Kelas::create([

            'kelas_id'=>'KLS028',
            'kelas'=>'KOM B',
            'dosen'=>'210293015',
            'mata_kuliah'=>'MK040'

        ]);
        /* Kelas::factory(16)->create(); */
    }
}
