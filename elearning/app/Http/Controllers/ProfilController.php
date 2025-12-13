<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Enrollment;
use App\Models\Kelas;

class ProfilController extends Controller
{
    
    public function profile(){
        $page = 'profile';

        $nik = auth()->user()->NIK;

        //Pembatasan User dan Dosen
        if(auth()->user()->status === "mahasiswa") {
            //SELECT mahasiswas.NIM, users.id, users.first_name, users.last_name, users.email, users.nomor_hp, users.jenis_kelamin, users.agama, users.kewarganegaraan, users.alamat, users.tgl_lahir FROM mahasiswas JOIN users ON mahasiswas.user = users.NIK WHERE users.NIK = $nik
            $profil = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.id','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->where('users.NIK', $nik)->get();

            //SELECT kelas.kelas, mata_kuliahs.nama_matkul, mata_kuliahs.kode_mata_kuliah FROM enrollments JOIN kelas ON enrollments.kelas = kelas.kelas_id JOIN mata_kuliahs ON kelas.mata_kuliah = mata_kuliahs.kode_mata_kuliah WHERE enrollments.user = $nik
            $kelas = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('kelas.kelas','mata_kuliahs.nama_matkul', 'mata_kuliahs.kode_mata_kuliah')->where('enrollments.user',$nik)->get();

        } elseif(auth()->user()->status === "dosen") {
            //SELECT dosens.NIP, dosens.NIDN, users.id, users.first_name, users.last_name, users.email, users.nomor_hp, users.jenis_kelamin, users.agama, users.kewarganegaraan, users.alamat, users.tgl_lahir FROM dosens JOIN users ON dosens.user = users.NIK WHERE users.NIK = $nik
            $profil = Dosen::join('users','dosens.user','=','users.NIK')->select('dosens.NIP','dosens.NIDN','users.id','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->where('users.NIK', $nik)->get();

            //SELECT mata_kuliahs.nama_matkul, mata_kuliahs.kode_mata_kuliah, kelas.kelas FROM kelas JOIN dosens ON kelas.dosen = dosens.NIP JOIN users ON dosens.user = users.NIK JOIN mata_kuliahs ON kelas.mata_kuliah = mata_kuliahs.kode_mata_kuliah WHERE dosens.user = $nik
            $kelas = Kelas::join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user', '=', 'users.NIK')->join('mata_kuliahs', 'kelas.mata_kuliah', '=', 'mata_kuliahs.kode_mata_kuliah')->select('mata_kuliahs.nama_matkul', 'mata_kuliahs.kode_mata_kuliah', 'kelas.kelas')->where('dosens.user', $nik)->get();

        }

        return view('user.profile', [
            'page'=> $page,
            'profil'=>$profil,
            //'mahasiswa'=>$mahasiswa[0],
            //'dosen'=>$dosen[0],
            'kelas'=>$kelas,

        ]);

        // return view('user.profile', compact('users'));

    }

    public function editprofil($id){
        $page = 'editprofil';

        $id = auth()->user()->id;


         //Pembatasan User dan Dosen
         if(auth()->user()->status === "mahasiswa") {

            //show data user
            //SELECT mahasiswas.NIM, users.first_name, users.last_name, users.email, users.nomor_hp, users.jenis_kelamin, users.agama, users.kewarganegaraan, users.alamat, users.tgl_lahir FROM mahasiswas JOIN users ON mahasiswas.user = users.NIK WHERE users.id = $id
            $editprofil = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->where('users.id', $id)->get();

        } elseif(auth()->user()->status === "dosen") {

            //show data dosen
            $editprofil = Dosen::join('users','dosens.user','=','users.NIK')->select('dosens.NIP','dosens.NIDN','users.NIK','users.id','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->where('users.id', $id)->get();


        }

        //sidebar user
        //$enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
    

        return view('user.editprofil', [
            'page'=> $page,
            'editprofil' => $editprofil
            // 'mahasiswa' => $mahasiswa[0],
            //'enrollmatkul'=> $enrollmatkul
        
        ]);

        //return view('user.editprofil', compact('page'));

    }

    public function updateprofile(Request $request){

        //Pembatasan User dan Dosen
        if(auth()->user()->status === "mahasiswa") {

            //update data user
            User::where('id', $request->id)->update([
            
                'id' => $request->id,
                'NIK' => $request->NIK,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'email' => $request->email,
                'nomor_hp' => $request->nomor_hp,
                // 'password' => $request->password
    
            ]);
            return redirect('/user/profile')->with('success', 'Data berhasil diperbarui');


        } elseif(auth()->user()->status === "dosen") {

            //update data dosen
            User::where('id', $request->id)->update([
            
                'id' => $request->id,
                'NIK' => $request->NIK,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'email' => $request->email,
                'nomor_hp' => $request->nomor_hp,
                // 'password' => $request->password
    
            ]);
            return redirect('/user/profile')->with('success', 'Data berhasil diperbarui');

        }

    }

}
