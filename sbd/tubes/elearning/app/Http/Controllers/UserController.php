<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Aslab;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mata_kuliah;
use App\Models\Kelas;
use App\Models\Enrollment;
use App\Models\Pertemuan;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\Jawaban;
use App\Models\Absen;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard(){
        $page = 'dashboard';

        //sidebar
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')
        // ->where('user','1208014206030003')
        ->get();

        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        // $dosen = Dosen::join('users','dosens.user','=','users.NIK')->select('dosens.NIP','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->get();

        
        return view('user.dashboarduser', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            // 'dosen'=>$dosen[0],
            'enrollmatkul'=> $enrollmatkul
        
        ]);

        // return view('user.dashboarduser', compact('page'));

    }

    public function sitehome(){
        $page = 'sitehome';

        $fakultas = Fakultas::all();
        // return view('user.sitehome', compact('fakultas'));

        // $fakultas = Fakultas::join('jurusans','')

        $jurusans = Jurusan::join('fakultas','jurusans.fakultas_id','=','fakultas.kode_fakultas')->select('jurusans.kode_jurusan','jurusans.nama_jurusan','jurusans.fakultas_id','fakultas.kode_fakultas','fakultas.nama_fakultas')->get();

        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
        
        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        return view('user.sitehome', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul,
            'jurusans'=>$jurusans,
            'fakultas'=>$fakultas
        ]);

        // return view('user.sitehome', compact('page'));

    }

    public function pilihanjurusan( $id){
        $page = 'pilihanjurusan';

        // $jurusans = Jurusan::all();
        // return view('user.pilihanjurusan', compact('jurusans'));

        $jurusans = Jurusan::join('fakultas','jurusans.fakultas_id','=','fakultas.kode_fakultas')->select('jurusans.kode_jurusan','jurusans.nama_jurusan','jurusans.fakultas_id','fakultas.kode_fakultas','fakultas.nama_fakultas')->where('fakultas.kode_fakultas', $id )->get();
        
        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
        
        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        return view('user.pilihanjurusan', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul,
            'jurusans'=>$jurusans
        
        ]);
        
        //return view('user.pilihanjurusan', compact('page'));

    }

    public function enrollmatkul(){
        $page = 'enrollmatkul';

        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
        
        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        return view('user.enrollmatkul', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul
        
        ]);

        //return view('user.enrollmatkul', compact('page'));

    }

    public function participants(){
        $page = 'participants';

        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
        
        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        return view('user.participants', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul
        
        ]);


        // return view('user.participants', compact('page'));

    }

    public function matakuliah(){
        $page = 'matakuliah';

        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();

        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        $pertemuan = Kelas::select('kelas')->get();
        
        return view('user.matakuliah', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'pertemuan'=>$pertemuan,
            'enrollmatkul'=> $enrollmatkul,
        
        ]);

        // return view('user.matakuliah', compact('page'));

    }

    public function pertemuanStore(request $request){
        
        $request->validate([
            'nama_pertemuan'=>'required',
        
        ]);


        Pertemuan::create([
            'nama_pertemuan'=>$request->nama_pertemuan,
            'deskripsi'=>$request->deskripsi,
            'tanggal_pertemuan'=>$request->tanggal_pertemuan,
            'kelas'=>$request->kelas
        ]);
        return back();

    }

    public function absen(){
        $page = 'absen';
        
        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
        
        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        return view('user.absen', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul
        
        ]);

        //return view('user.absen', compact('page'));

    }

    public function absenStore(Request $request){
        // $page = 'submitabsen';

        Absensi::create([
            'status'=>$status
        ]);

        return back();

    }

    public function tugas(){
        $page = 'tugas';

        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
        
        //navbar user
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.first_name','users.last_name')->get();

        return view('user.tugas', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul
        
        ]);

        //return view('user.tugas', compact('page'));

    }

    public function profile(){
        $page = 'profile';

        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.NIK','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->get();

        $dosen = Dosen::join('users','dosens.user','=','users.NIK')->select('dosens.NIP','users.NIK','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir')->get();

        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();

        return view('user.profile', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'dosen'=>$dosen[0],
            'enrollmatkul'=>$enrollmatkul

        ]);

        // return view('user.profile', compact('users'));

    }

    public function editprofil($id){
        $page = 'editprofil';

        //yg ini jalan
        $mahasiswa = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->join('jurusans','mahasiswas.jurusan','=','jurusans.kode_jurusan')->select('mahasiswas.NIM','mahasiswas.jurusan','users.NIK','users.first_name','users.last_name','users.email','users.nomor_hp','users.jenis_kelamin','users.agama','users.kewarganegaraan','users.alamat','users.tgl_lahir','users.password','jurusans.nama_jurusan')
        // ->where('NIK',$id)
        // ->first();
        ->get();

        //blm sukses
        //$mahasiswa = User::find($id);

        

        // $mahasiswa = User::where('NIK')->first();

        //$data= Mahasiswa::find('NIM', $id);
        //dd($data);


        //sidebar user
        $enrollmatkul = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->select('enrollments.user','enrollments.kelas','mata_kuliahs.kode_mata_kuliah','mata_kuliahs.nama_matkul')->get();
    

        return view('user.editprofil', [
            'page'=> $page,
            'mahasiswa'=>$mahasiswa[0],
            'enrollmatkul'=> $enrollmatkul
        
        ]);

        //return view('user.editprofil', compact('page'));

    }

    public function updateprofile(Request $request){

        DB::table('users')->where('NIK', $request->id)->update([

            'NIK' => $request->NIK,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'email' => $request->email,
            'password' => $request->password

        ]);

        // $mahasiswa = User::find($id);

        // return back();
        return redirect('/user/profile')->with('status', 'Data siswa Berhasil Diubah');

        // return redirect('/user/profile');
    }




}
