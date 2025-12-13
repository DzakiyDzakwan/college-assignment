<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\Enrollment;
use App\Models\Materi;



class KelasController extends Controller
{
    public function kelas($id){
        $page = 'kelas';
        $nik = auth()->user()->NIK;

        //judul kelas
        $juduls = Kelas::join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
        ->select('kelas.mata_kuliah','kelas.kelas','kelas.kelas_id','mata_kuliahs.nama_matkul')->where('kelas.kelas_id', $id)->get();
        
        //show pertemuan
        $pertemuan = Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')->select('pertemuans.nama_pertemuan','pertemuans.link','pertemuans.tanggal_pertemuan','pertemuans.pertemuan_id','pertemuans.kelas','kelas.kelas_id')->where('kelas.kelas_id', $id)->get();
        
        //Materi
        if(auth()->user()->status === 'mahasiswa'){


            $kelas = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user' , '=', 'users.NIK')->select('enrollments.kelas','kelas.kelas_id', 'kelas.kelas','mata_kuliahs.nama_matkul', 'users.first_name', 'users.last_name', 'mata_kuliahs.kode_mata_kuliah')->where('enrollments.user',$nik)->get();

        } elseif(auth()->user()->status === 'dosen') {

            //sidebar
            $kelas = Kelas::join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user', '=', 'users.NIK')->join('mata_kuliahs', 'kelas.mata_kuliah', '=', 'mata_kuliahs.kode_mata_kuliah')->select('mata_kuliahs.nama_matkul', 'mata_kuliahs.kode_mata_kuliah','kelas.kelas_id', 'kelas.kelas', 'users.first_name', 'users.last_name')->where('dosens.user', $nik)->get();

        }
        //Tugas

        //Show Materi
        $materiis = Materi::join('pertemuans','materis.pertemuan','=','pertemuans.pertemuan_id')->
        join('kelas','pertemuans.kelas','=','kelas.kelas_id')->select('materis.nama_materi','materis.deskripsi','materis.pertemuan','materis.materi_id','pertemuans.pertemuan_id','kelas.kelas_id')
        ->where('pertemuans.pertemuan_id',$id)
        ->get();

        $pertemuans= Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')
        ->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')
        ->select('pertemuans.pertemuan_id','kelas.mata_kuliah','kelas.kelas','mata_kuliahs.nama_matkul')
        ->where('pertemuans.pertemuan_id', $id)->get();

        //Absensi

        //participants
        $participants = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')
        ->join('users','enrollments.user','=','users.id')
        ->select('enrollments.kelas','users.first_name','users.last_name','kelas.kelas_id')->where('kelas.kelas_id', $id)->get();

        return view('user.matakuliah', [
            'enrollmatkul' => $kelas,
            'page'=> $page,
            'pertemuan'=>$pertemuan,
            'kelas'=>$kelas,
            'juduls'=>$juduls,
            'materiis'=>$materiis,
            'pertemuans'=>$pertemuans,
            'participants'=>$participants
        
        ]);

        

        // return view('user.matakuliah', compact('page'));

    }

    public function storePertemuan(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nama_pertemuan' => 'required|max:255',
        //     'deskripsi' => 'required|max:255',
        //     'tanggal_pertemuan' => 'required',
        //     'kelas' => 'required',
        // ]);

        // Pertemuan::create($validatedData);

        Pertemuan::create([

            'nama_pertemuan'=> $request->nama_pertemuan,
            'deskripsi'=> $request->deskripsi,
            'tanggal_pertemuan'=>$request->tanggal_pertemuan,
            'kelas'=>$request->kelas
        ]);

        return back()->with('success', 'mantap bro');
    }   
}
