<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mata_kuliah;
use App\Models\Kelas;
use App\Models\Enrollment;
use App\Models\Mahasiswa;

class EnrollController extends Controller
{
    
    public function sitehome(){
        $page = 'sitehome';

        $fakultas = Fakultas::all();
        // return view('user.sitehome', compact('fakultas'));

        // $fakultas = Fakultas::join('jurusans','')

        // $jurusans = Jurusan::join('fakultas','jurusans.fakultas_id','=','fakultas.kode_fakultas')->select('jurusans.kode_jurusan','jurusans.nama_jurusan','jurusans.fakultas_id','fakultas.kode_fakultas','fakultas.nama_fakultas')->get();

        return view('user.sitehome', [
            'page'=> $page,
            // 'jurusans'=>$jurusans,
            'fakultas'=>$fakultas
        ]);

        // return view('user.sitehome', compact('page'));

    }

    public function jurusan( $id){
        $page = 'pilihanjurusan';

        // $jurusans = Jurusan::all();
        // return view('user.pilihanjurusan', compact('jurusans'));

        // $matkuls = Mata_kuliah::join('jurusans','mata_kuliahs.jurusan','=','jurusans.kode_jurusan')->join('fakultas','jurusans.fakultas_id','=','fakultas.kode_fakultas')->select('jurusans.nama_jurusan','fakultas.nama_fakultas')->where('fakultas.kode_fakultas', $id )->get();

        //SELECT jurusans.kode_jurusan, jurusans.nama_jurusan FROM jurusans JOIN fakultas ON jurusans.fakultas_id = fakultas.kode_fakultas WHERE fakultas.kode_fakultas = $id
        $jurusans = Jurusan::join('fakultas','jurusans.fakultas_id','=','fakultas.kode_fakultas')->select('jurusans.kode_jurusan','jurusans.nama_jurusan')->where('fakultas.kode_fakultas', $id )->get();

        //SELECT nama_fakultas FROM fakultas WHERE kode_fakultas = $id
        $juduls = Fakultas::select('nama_fakultas')->where('kode_fakultas', $id)->get(); 

        return view('user.pilihanjurusan', [
            'page'=> $page,
            'jurusans'=>$jurusans,
            'juduls'=>$juduls
            // 'matkuls'=>$matkuls
        
        ]);
        
        //return view('user.pilihanjurusan', compact('page'));

    }

    public function pilihanmatkul($id){
        $page = 'pilihanmatkul';

        //SELECT kelas.kelas_id, kelas.kelas, kelas.mata_kuliah, kelas.dosen, dosens.NIP, dosens.user, mata_kuliahs.nama_matkul, mata_kuliahs.jurusan, users.first_name, users.last_name, jurusans.nama_jurusan FROM kelas JOIN dosens ON kelas.dosen = dosens.NIP JOIN mata_kuliahs ON kelas.mata_kuliah = mata_kuliahs.kode_mata_kuliah JOIN users ON dosens.user = users.NIK JOIN jurusans ON mata_kuliahs.jurusan = jurusans.kode_jurusan WHERE jurusans.kode_jurusan = $ID
        $kelas = Kelas::join('dosens','kelas.dosen','=','dosens.NIP')
        ->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
        ->join('users','dosens.user','=','users.NIK')
        ->join('jurusans','mata_kuliahs.jurusan','=','jurusans.kode_jurusan')
        ->select('kelas.kelas_id','kelas.kelas','kelas.mata_kuliah','kelas.dosen','dosens.NIP','dosens.user','mata_kuliahs.nama_matkul','mata_kuliahs.jurusan','users.first_name','users.last_name','jurusans.nama_jurusan')
        ->where('jurusans.kode_jurusan', $id)
        ->get();

        return view('user.pilihanmatkul', [
            'page'=>$page,
            'kelas'=>$kelas
        ]);
    }

    public function enrollmatkul($id){
        $page = 'enrollmatkul';

        $nik = auth()->user()->NIK;
        //Ambil kelas bedasarkan id jurusan yang dipilih

        $kelas = Kelas::join('dosens','kelas.dosen','=','dosens.NIP')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->join('users','dosens.user','=','users.NIK')->join('jurusans','mata_kuliahs.jurusan','=','jurusans.kode_jurusan')->select('kelas.kelas_id','kelas.kelas','kelas.mata_kuliah','kelas.dosen','dosens.NIP','dosens.user','mata_kuliahs.nama_matkul','mata_kuliahs.jurusan','users.first_name','users.last_name','jurusans.nama_jurusan','users.NIK')
        ->where('kelas.kelas_id', $id)
        ->get();

        return view('user.enrollmatkul', [
            'page'=> $page,
            'kelas'=>$kelas
        ]);

        //return view('user.enrollmatkul', compact('page'));

    }

    public function enroll(Request $request) {

        $nik = auth()->user()->NIK;

        //mengambil jurusan mahasiswa
        $jurusanmhs = Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.jurusan')->where('users.NIK', $nik)->get()[0]['jurusan'];
        // dd($jurusanmhs);

        //check apakah enroll melebihi batasa sks
        $check = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')
        ->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
        ->where('enrollments.user', $nik)->sum('mata_kuliahs.sks');
        // dd($check);
        if($check >= 15){
            return redirect('/dashboard')->with('warning', 'SKS melebihi batas');
        }

        //check agar enroll sesusai jurusan
        $checkjurusan = Kelas::join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
        ->where('kelas.kelas_id', $request->kelas)
        ->where('mata_kuliahs.jurusan', $jurusanmhs)
        // ->where()
        ->exists();
        // dd($checkjurusan);

        if(!$checkjurusan){
            return redirect('/user/sitehome')->with('warning', 'Jurusan Tidak sesuai');
        }

        //Check Apakah siswa sudah berada di dalam kelas
        $checkKelas = Enrollment::where('enrollments.user', $nik)->where('enrollments.kelas', $request->kelas)->exists();

        if($checkKelas){
            return back()->with('warning', 'Anda Sudah mengenroll kelas ini');
        }
        
        //Create data tabel enrollment kelas
        Enrollment::create([
            'enroll_id' => $request->enroll_id,
            'user' => $request->user,
            'kelas' => $request->kelas,
            'role'=>'student'

        ]);
        return redirect('/user/sitehome/')->with('success', 'Enroll Berhasil');

    }


}
