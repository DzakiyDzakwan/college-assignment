<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Dosen;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'NIK' => '211402030',
            'email' => 'admin@gmail.com',
            'nomor_hp' => '08696124249',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'admin',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('admin'), // password
            'status' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '193901001',
            'email' => 'siswa@gmail.com',
            'nomor_hp' => '086969123123',
            'first_name' => 'siswa',
            'last_name' => 'siswa',
            'jenis_kelamin' => 'pria',
            'agama' => 'siswa',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Kristen',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('siswa'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '193901002',
            'email' => 'siswa2@gmail.com',
            'nomor_hp' => '086969123124',
            'first_name' => 'Siswa',
            'last_name' => 'Dua',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'islam',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('siswa2'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '211402075',
            'email' => 'siswa3@gmail.com',
            'nomor_hp' => '082360360216',
            'first_name' => 'Dzakiy',
            'last_name' => 'Dzakwan',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Medan Binjai km 14',
            'tgl_lahir' => '2002-12-01',
            'password' => bcrypt('siswa3'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '211402001',
            'email' => 'siswa4@gmail.com',
            'nomor_hp' => '081223456780',
            'first_name' => 'Siapa',
            'last_name' => 'Iya',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Medan Binjai km 14',
            'tgl_lahir' => '2002-12-01',
            'password' => bcrypt('siswa4'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2114021232',
            'email' => 'dosen@gmail.com',
            'nomor_hp' => '086969696969',
            'first_name' => 'dosen',
            'last_name' => 'test',
            'jenis_kelamin' => 'pria',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'guru',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('dosen'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2114021231',
            'email' => 'dosen2@gmail.com',
            'nomor_hp' => '0869696969700',
            'first_name' => 'Dosen',
            'last_name' => 'Dua',
            'jenis_kelamin' => 'pria',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Dosen 2',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('dosen2'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2114021233',
            'email' => 'dosen3@gmail.com',
            'nomor_hp' => '086969696980',
            'first_name' => 'Ryan',
            'last_name' => 'Azhari',
            'jenis_kelamin' => 'pria',
            'agama' => 'islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Buku',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('dosen3'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2114021244',
            'email' => 'dosen4@gmail.com',
            'nomor_hp' => '086969696981',
            'first_name' => 'Lasasti',
            'last_name' => 'Sandra',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Rol',
            'tgl_lahir' => '1969-01-01',
            'password' => bcrypt('dosen4'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '1945723371',
            'email' => 'dosen5@gmail.com',
            'nomor_hp' => '085283662001',
            'first_name' => 'Dewi',
            'last_name' => 'Lestari',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Kenanga',
            'tgl_lahir' => '1964-07-21',
            'password' => bcrypt('dosen5'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'NIK' => '1945723372',
            'email' => 'dosen6@gmail.com',
            'nomor_hp' => '082287320121',
            'first_name' => 'Budi',
            'last_name' => 'Irawan',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Bahagia',
            'tgl_lahir' => '1968-09-08',
            'password' => bcrypt('dosen6'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'NIK' => '1945723373',
            'email' => 'dosen7@gmail.com',
            'nomor_hp' => '081334110030',
            'first_name' => 'Haryanto',
            'last_name' => 'Sudrajat',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Merak',
            'tgl_lahir' => '1962-02-14',
            'password' => bcrypt('dosen7'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '216020109',
            'email' => 'siswa5@gmail.com',
            'nomor_hp' => '081284326671',
            'first_name' => 'Vica',
            'last_name' => 'Lina',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Mawar',
            'tgl_lahir' => '2003-03-03',
            'password' => bcrypt('siswa5'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '216020106',
            'email' => 'siswa6@gmail.com',
            'nomor_hp' => '081142137706',
            'first_name' => 'Diana',
            'last_name' => 'Putri',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Melati',
            'tgl_lahir' => '2004-01-25',
            'password' => bcrypt('siswa6'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2194202015',
            'email' => 'siswa7@gmail.com',
            'nomor_hp' => '081193547210',
            'first_name' => 'Adrian',
            'last_name' => 'Prakoso',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Karet',
            'tgl_lahir' => '2003-02-04',
            'password' => bcrypt('siswa7'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'NIK' => '2194202018',
            'email' => 'siswa8@gmail.com',
            'nomor_hp' => '082144028113',
            'first_name' => 'Mangun',
            'last_name' => 'Pratama',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Mangga',
            'tgl_lahir' => '2003-07-01',
            'password' => bcrypt('siswa8'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2162201001',
            'email' => 'siswa9@gmail.com',
            'nomor_hp' => '082144023204',
            'first_name' => 'Keren',
            'last_name' => 'Andini',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Kerucut',
            'tgl_lahir' => '2002-12-21',
            'password' => bcrypt('siswa9'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);


        User::create([
            'NIK' => '2114059726',
            'email' => 'dosen8@gmail.com',
            'nomor_hp' => '0875431354972',
            'first_name' => 'Kirana',
            'last_name' => 'Syahira',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Rantang',
            'tgl_lahir' => '1976-04-10',
            'password' => bcrypt('dosen8'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'NIK' => '2044024384',
            'email' => 'dosen9@gmail.com',
            'nomor_hp' => '086310548512',
            'first_name' => 'Muhammad',
            'last_name' => 'Radja',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Thhamrin',
            'tgl_lahir' => '1955-01-14',
            'password' => bcrypt('dosen9'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '2110464123',
            'email' => 'dosen10@gmail.com',
            'nomor_hp' => '087454121643',
            'first_name' => 'Prima',
            'last_name' => 'Riyanti',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Pelangi',
            'tgl_lahir' => '1970-10-15',
            'password' => bcrypt('dosen10'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '23154212546',
            'email' => 'dosen11@gmail.com',
            'nomor_hp' => '086513218762',
            'first_name' => 'Saka',
            'last_name' => 'Pramudya',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Deli',
            'tgl_lahir' => '1985-09-17',
            'password' => bcrypt('dosen11'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '22154685512',
            'email' => 'siswa10@gmail.com',
            'nomor_hp' => '08774133256',
            'first_name' => 'Zahra',
            'last_name' => 'Sania',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Bakti',
            'tgl_lahir' => '2004-01-22',
            'password' => bcrypt('siswa10'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '22132215406',
            'email' => 'siswa11@gmail.com',
            'nomor_hp' => '08845312975',
            'first_name' => 'Nasywa',
            'last_name' => 'Aqila',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Pelangi',
            'tgl_lahir' => '2003-12-15',
            'password' => bcrypt('siswa11'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '211454877651',
            'email' => 'siswa12@gmail.com',
            'nomor_hp' => '0895641132',
            'first_name' => 'Naura',
            'last_name' => 'Ayu',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Garu',
            'tgl_lahir' => '2003-07-21',
            'password' => bcrypt('siswa12'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140204880',
            'email' => 'siswa13@gmail.com',
            'nomor_hp' => '081223450000',
            'first_name' => 'Andri',
            'last_name' => 'Putra',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Rajawali km 9',
            'tgl_lahir' => '2002-09-08',
            'password' => bcrypt('siswa13'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140299041',
            'email' => 'siswa14@gmail.com',
            'nomor_hp' => '081223450099',
            'first_name' => 'Farhan',
            'last_name' => 'Anggara',
            'jenis_kelamin' => 'pria',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Merdeka km 8',
            'tgl_lahir' => '2003-12-06',
            'password' => bcrypt('siswa14'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140291041',
            'email' => 'siswa15@gmail.com',
            'nomor_hp' => '081265450099',
            'first_name' => 'Annisa',
            'last_name' => 'Aulia',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Bahagia km 2',
            'tgl_lahir' => '2003-09-06',
            'password' => bcrypt('siswa15'), // password
            'status' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140271206',
            'email' => 'dosen12@gmail.com',
            'nomor_hp' => '086969696771',
            'first_name' => 'Amanda',
            'last_name' => 'Alya',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Merpati',
            'tgl_lahir' => '1988-03-01',
            'password' => bcrypt('dosen12'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140281229',
            'email' => 'dosen13@gmail.com',
            'nomor_hp' => '086933396981',
            'first_name' => 'Faiz',
            'last_name' => 'Chandra',
            'jenis_kelamin' => 'pria',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jalan Nusa Indah',
            'tgl_lahir' => '1985-09-01',
            'password' => bcrypt('dosen13'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140207070',
            'email' => 'dosen14@gmail.com',
            'nomor_hp' => '081223451199',
            'first_name' => 'keysha',
            'last_name' => 'Ananda',
            'jenis_kelamin' => 'wanita',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Sutomo km 1',
            'tgl_lahir' => '1990-02-06',
            'password' => bcrypt('dosen14'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'NIK' => '21140280555',
            'email' => 'dosen15@gmail.com',
            'nomor_hp' => '081223001099',
            'first_name' => 'Tio',
            'last_name' => 'Hardi',
            'jenis_kelamin' => 'pria',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'WNI',
            'alamat' => 'Jln Pasar Baru km 5',
            'tgl_lahir' => '1986-02-09',
            'password' => bcrypt('dosen15'), // password
            'status' => 'dosen',
            'remember_token' => Str::random(10),
        ]);

        /* User::factory(6)->create(); */

    }
}
