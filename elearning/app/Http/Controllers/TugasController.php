<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Tugas;


class TugasController extends Controller
{
    //create tugas, delete tugas, edit tugas

    public function tugas($id){

        //NIK
        $nik  = auth()->user()->NIK;

        $page = 'tugas';

        $tugas = Tugas::select('tugas_id','deadline_tugas', 'nama_tugas', 'deskripsi')->where('tugas_id', $id)->get()[0];

        if(auth()->user()->status === 'dosen') {
            $jawaban = Jawaban::select('users.first_name', 'users.last_name', 'jawabans.jawaban_id' ,'mahasiswas.NIM', 'jawabans.submited_status', 'jawabans.nilai', 'jawabans.file' , 'jawabans.text_jawaban', 'jawabans.updated_at')->where('tugas', $id)->join('mahasiswas', 'jawabans.mahasiswa', '=', 'mahasiswas.NIM')->join('users', 'mahasiswas.user', '=', 'users.NIK')->get();

            /* dd($jawaban); */

            return view('user.tugas', [
                'page'=> $page,
                'tugas'=>$tugas,
                'jawaban'=>$jawaban,
                'id'=>$id
            ]);
        } else {
            $nim = Mahasiswa::select('NIM')->where('user', $nik)->get()[0]["NIM"];

            $checkJawaban =  Jawaban::select('jawabans.submited_status', 'jawabans.nilai', 'jawabans.updated_at', 'jawabans.file', 'jawabans.komentar')->where('tugas', $id)->where('mahasiswa', $nim)->exists();

            if($checkJawaban) {
                 $jawaban = Jawaban::select('jawabans.jawaban_id','jawabans.submited_status', 'jawabans.nilai', 'jawabans.updated_at', 'jawabans.file', 'jawabans.komentar')->where('tugas', $id)->where('mahasiswa', $nim)->get()[0];    
            } else {
                $jawaban = Jawaban::select('jawabans.submited_status', 'jawabans.nilai', 'jawabans.updated_at', 'jawabans.file', 'jawabans.komentar')->where('tugas', $id)->where('mahasiswa', $nim)->get();
            }

            /* dd($checkJawaban); */

            return view('user.tugas', [
                'page'=> $page,
                'tugas'=>$tugas,
                'nim'=>$nim,
                'jawaban'=>$jawaban,
                'id' => $id
            ]);

            

           

            
        }
        

       

        /* dd($jawabanSiswa); */


        //return view('user.tugas', compact('page'));

    }

    public function store(Request $request) {

        /* dd($request->all()); */

        Tugas::create([
            'nama_tugas'=>$request->nama_tugas,
            'deskripsi'=>$request->deskripsi,
            'deadline_tugas'=>$request->deadline,
            'pertemuan'=>$request->pertemuan
        ]);

        return back()->with('success', 'Tugas Berhasil Dibuat');

    }

    public function delete($id) {


        Tugas::where('tugas_id', $id)->delete();

        return back()->with('success', 'Tugas Berhasil dihapus');

    }
}
