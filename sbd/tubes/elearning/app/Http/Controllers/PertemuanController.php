<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertemuan;
use App\Models\Enrollment;
use App\Models\Kelas;


class PertemuanController extends Controller
{

    //Create Pertemuan, Delete Pertemuan
    

    public function pertemuanStore(request $request){
        
        $request->validate([
            'nama_pertemuan'=>'required',
            'link'=>'required',
            'tanggal_pertemuan'=>'required'
        
        ]);


        Pertemuan::create([
            'pertemuan_id'=>$request->pertemuan_id,
            'nama_pertemuan'=>$request->nama_pertemuan,
            'link'=>$request->link,
            'tanggal_pertemuan'=>$request->tanggal_pertemuan,
            'kelas'=>$request->kelas
        ]);
        return back()->with('success', 'Pertemuan Berhasil dibuat');

    }

    // public function pertemuan(){
    //     $pertemuans = pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')->select('pertemuans.nama_pertemuan','pertemuans.deskripsi','pertemuans.tanggal_pertemuan')->get();
    // }

    public function pertemuanDelete($id) {

        Pertemuan::where('pertemuan_id', $id)->delete();

        return back()->with('success', 'Pertemuan Berhasil dihapus');

    }

    public function pertemuanEdit($id) {
        
        $nik = auth()->user()->NIK;

        //sidebar
        if(auth()->user()->status === 'mahasiswa'){


            $kelas = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user' , '=', 'users.NIK')->select('enrollments.kelas','kelas.kelas_id', 'kelas.kelas','mata_kuliahs.nama_matkul', 'users.first_name', 'users.last_name', 'mata_kuliahs.kode_mata_kuliah')->where('enrollments.user',$nik)->get();

        } elseif(auth()->user()->status === 'dosen') {

            $kelas = Kelas::join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user', '=', 'users.NIK')->join('mata_kuliahs', 'kelas.mata_kuliah', '=', 'mata_kuliahs.kode_mata_kuliah')->select('mata_kuliahs.nama_matkul', 'mata_kuliahs.kode_mata_kuliah','kelas.kelas_id', 'kelas.kelas', 'users.first_name', 'users.last_name')->where('dosens.user', $nik)->get();

        }


        $pertemuan = Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')->select('pertemuans.nama_pertemuan','pertemuans.deskripsi','pertemuans.tanggal_pertemuan','pertemuans.pertemuan_id','pertemuans.kelas','kelas.kelas_id')->where('pertemuans.pertemuan_id', $id)->get();

        return view('user.editpertemuan', [
            'pertemuan'=>$pertemuan,
            'enrollmatkul'=>$kelas
        
        ]);

    }

    public function pertemuanUpdate(Request $request){

        Pertemuan::where('pertemuan_id', $request->id)->update([
            
           'nama_pertemuan'=>$request->nama_pertemuan,
           'deskripsi'=>$request->deskripsi,
           'tanggal_pertemuan'=>$request->tanggal_pertemuan

        ]);
        return back()->with('success', 'Data berhasil diupdate');

    }

}
