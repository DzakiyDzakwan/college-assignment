<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Pertemuan;
use App\Models\Kelas;

class AbsensiController extends Controller
{
    //create absensi, store absensi, delete absensi, edit absensi

    public function absen($id){
        $page = 'absen';

        

        // dd($nim);

        // $pertemuan = Pertemuan::select('pertemuan_id')
        // ->where('pertemuan_id', $id)->get();

        //menampilkan judul matakuliah dan tombol back
        //SELECT pertemuans.pertemuan_id, kelas.mata_kuliah, kelas.kelas, kelas.kelas_id, mata_kuliahs.nama_matkul FROM pertemuans JOIN kelas ON pertemuans.kelas = kelas.kelas_id JOIN mata_kuliahs ON kelas.mata_kuliah = mata_kuliahs.kode_mata_kuliah
        $pertemuan= Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')
        ->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
        ->select('pertemuans.pertemuan_id','kelas.mata_kuliah','kelas.kelas','kelas.kelas_id','mata_kuliahs.nama_matkul')
        ->where('pertemuans.pertemuan_id', $id)->get();

        if(auth()->user()->status === "mahasiswa"){
            $nik = auth()->user()->NIK;

        $mahasiswas=Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.NIK')->where('users.NIK', $nik)->get();

        $nim = $mahasiswas[0]['NIM'];
            //SELECT  absensis.status, absensis.created_at, pertemuans.tanggal_pertemuan, users.first_name, users.last_name FROM absensis JOIN pertemuans ON absensis.pertemuan = pertemuans.pertemuan_id JOIN mahasiswas ON absensis.mahasiswa = mahasiswas.NIM JOIN users ON mahasiswas.user = users.NIK WHERE pertemuans.pertemuan_id = $id AND mahasiswa $nim
            $absens = Absensi::join('pertemuans','absensis.pertemuan','=','pertemuans.pertemuan_id')
        ->join('mahasiswas','absensis.mahasiswa','=','mahasiswas.NIM')
        ->join('users','mahasiswas.user','=','users.NIK')
        ->select('absensis.status','absensis.status','absensis.created_at','pertemuans.tanggal_pertemuan','users.first_name','users.last_name','mahasiswas.NIM','users.NIK')
        ->where('pertemuans.pertemuan_id', $id)
        ->where('mahasiswa', $nim )
        ->get();

        return view('user.absen', [
            'page'=> $page,
            'absens' => $absens,
            'mahasiswas'=>$mahasiswas,
            'pertemuan'=>$pertemuan,
            // 'tombols'=>$tombols
        ]);
        }elseif(auth()->user()->status === "dosen") {
            //SELECT  absensis.status, absensis.created_at, pertemuans.pertemuan_id, pertemuans.tanggal_pertemuan, users.first_name, users.last_name FROM absensis JOIN pertemuans ON absensis.pertemuan = pertemuans.pertemuan_id JOIN mahasiswas ON absensis.mahasiswa = mahasiswas.NIM JOIN users ON mahasiswas.user = users.NIK WHERE pertemuans.pertemuan_id = $id AND mahasiswa $nim
        $absens = Absensi::join('pertemuans','absensis.pertemuan','=','pertemuans.pertemuan_id')
        ->join('mahasiswas','absensis.mahasiswa','=','mahasiswas.NIM')
        ->join('users','mahasiswas.user','=','users.NIK')
        ->select('absensis.status','absensis.status','absensis.created_at','pertemuans.pertemuan_id','pertemuans.tanggal_pertemuan','users.first_name','users.last_name','mahasiswas.NIM','users.NIK')
        ->where('pertemuans.pertemuan_id', $id)
        // ->where('mahasiswa', $nim )
        ->get();

        return view('user.absen', [
            'page'=> $page,
            'absens' => $absens,
            // 'mahasiswas'=>$mahasiswas,
            'pertemuan'=>$pertemuan,
            // 'tombols'=>$tombols
        ]);
        }


        



        //SELECT pertemuans.pertemuan_id, kelas.kelas_id FROM pertemuans JOIN kelas ON pertemuans.kelas = kelas.kelas_id
        // $tombols= Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')
        // ->select('pertemuans.pertemuan_id','kelas.kelas_id')
        // ->where('pertemuans.pertemuan_id', $id)->get();

        // return view('user.absen', [
        //     'page'=> $page,
        //     'absens' => $absens,
        //     'mahasiswas'=>$mahasiswas,
        //     'pertemuan'=>$pertemuan,
        //     // 'tombols'=>$tombols
        // ]);

        //return view('user.absen', compact('page'));

    }

    //submit absen mahasiswa
    public function absenStore(Request $request){
        // $page = 'submitabsen';

        
        $nik = auth()->user()->NIK;

        $mahasiswas=Mahasiswa::join('users','mahasiswas.user','=','users.NIK')->select('mahasiswas.NIM','users.NIK')->where('users.NIK', $nik)->get();

        $check = Absensi::where('mahasiswa', $request->mahasiswa )->where('pertemuan', $request->pertemuan)->exists();

        /* dd($check); */
        if($check){
            return back()->with('errors', 'Anda Telah Melakukan Absensi');
        }
        //INSERT * INTO absensis (absensi_id, mahasiswa, status, pertemuan ) VALUES ($absensi_id,$mahasiswa, $status, $pertemuan)
        Absensi::create([
            'absensi_id'=>$request->absensi_id,
            'mahasiswa'=>$request->mahasiswa,
            'status'=>$request->status,
            'pertemuan'=>$request->pertemuan
        ]);

        return back()->with('success', 'Anda Berhasil Melakukan Absensi');

    }
}
