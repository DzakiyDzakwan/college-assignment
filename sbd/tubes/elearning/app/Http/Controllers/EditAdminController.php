<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mata_kuliah;
use App\Models\Kelas;

class EditAdminController extends Controller
{
    
    public function index($page, $id) {

        /* dd($page, $id); */

        if($page === 'edit-fakultas') {
            $data = Fakultas::where('kode_fakultas', $id)->get()[0];
        }elseif($page === 'edit-jurusan'){
            $data = Jurusan::where('kode_jurusan', $id)->get()[0];
        } elseif($page === 'edit-matkul') {
            $data = Mata_kuliah::where('kode_mata_kuliah', $id)->get()[0];
        } elseif($page === 'edit-kelas'){
            $data = Kelas::where('kelas_id', $id)->get()[0];
        } else {
            return back();
        }

        /* dd($data); */

        $dosen =  Dosen::join('users', 'dosens.user', '=', 'users.NIK')->select('dosens.NIP', 'users.first_name', 'users.last_name')->get();
        $fakultas = Fakultas::get();
        $jurusan = Jurusan::join('fakultas', 'jurusans.fakultas_id' , '=', 'fakultas.kode_fakultas')->get();
        $matakuliah = Mata_kuliah::join('jurusans', 'mata_kuliahs.jurusan', '=', 'jurusans.kode_jurusan')->get();
        $kelas = Kelas::join('mata_kuliahs', 'kelas.mata_kuliah', '=', 'mata_kuliahs.kode_mata_kuliah')->join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user', '=', 'users.NIK')->select('kelas.kelas_id', 'kelas.kelas', 'mata_kuliahs.nama_matkul', 'users.first_name', 'users.last_name')->get();

        return view('admin.edit', [
            'data'=>$data,
            'page'=>$page,
            'dosens'=>$dosen,
            'fakultas'=>$fakultas,
            'jurusans'=>$jurusan,
            'matakuliah'=>$matakuliah
        ]);
    }

    public function update($page, Request $request) {

        /* dd($page, $request->all()); */

        if($page === 'fakultas') {

            $validate = $request->validate([
                'kode_fakultas'=>"required",
                'nama_fakultas'=>"required",
            ]);

            Fakultas::where('kode_fakultas', $request->kode_fakultas)->update([
                'kode_fakultas'=>$request->kode_fakultas,
                'nama_fakultas'=>$request->nama_fakultas,
                'dekan'=>$request->dekan
            ]);
            

        } elseif($page === 'jurusan') {

            $validate = $request->validate([
                'kode_jurusan'=>"required",
                'nama_jurusan'=>"required",
            ]);

            Jurusan::where('kode_jurusan', $request->kode_jurusan)->update([
                'kode_jurusan'=>$request->kode_jurusan,
                'nama_jurusan'=>$request->nama_jurusan,
                'fakultas_id'=>$request->fakultas
            ]);

        } elseif($page === 'matkul') {

            $validate = $request->validate([
                'kode_mata_kuliah'=>"required",
                'sks'=> 'required',
                'nama_matkul'=>"required",
            ]);

            Mata_kuliah::where('kode_mata_kuliah', $request->kode_mata_kuliah)->update([
                'kode_mata_kuliah'=>$request->kode_mata_kuliah,
                'nama_matkul'=>$request->nama_matkul,
                'sks'=>$request->sks,
                'jurusan'=>$request->jurusan
            ]);


        } elseif($page === 'kelas') {

            $validate = $request->validate([
                'kelas_id'=>"required",
                'kelas'=>"required",
            ]);

            Kelas::where('kelas_id', $request->kelas_id)->update([
                'kelas_id'=>$request->kelas_id,
                'kelas'=>$request->kelas,
                'mata_kuliah'=>$request->mata_kuliah,
                'dosen'=>$request->dosen
            ]);

        }

        return redirect('/admin/faculty')->with('success', 'data Berhasil diubah');

        

    }

}
