<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Pertemuan;


class MateriController extends Controller
{
    //Create Materi, Delete Materi, Update Materi
    public function materiStore(request $request){

        Materi::create([
            'materi_id'=>$request->materi_id,
            'nama_materi'=>$request->nama_materi,
            'deskripsi'=>$request->deskripsi,
            'pertemuan'=>$request->pertemuan
        ]);
        return back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function createmateri($id){
        $page = 'createmateri';

        //SELECT pertemuans.pertemuan_id, kelas.kelas_id FROM pertemuans JOIN kelas ON pertemuans.kelas = kelas.kelas_id
        $materi= Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')
        ->select('pertemuans.pertemuan_id','kelas.kelas_id')
        ->where('pertemuans.pertemuan_id', $id)->get();
        
        return view('user.createmateripage',[
            'page'=>$page,
            'materi'=>$materi ,

        ]);
    }

    public function editmateri($id){
        //SELECT materis.materi_id, materis.nama_materi, materis.deskripsi, kelas.kelas_id FROM materis JOIN pertemuans ON materis.pertemuan = pertemuans.pertemuan_id JOIN kelas ON pertemuans.kelas = kelas.kelas_id
        $materis = Materi::join('pertemuans','materis.pertemuan','=','pertemuans.pertemuan_id')
        ->join('kelas','pertemuans.kelas','=','kelas.kelas_id')
        ->select('materis.materi_id','materis.nama_materi','materis.deskripsi','kelas.kelas_id')->where('materis.materi_id', $id)->get();

        return view('user.editmateri',[
            'materis'=>$materis
        ]);
    }

    public function updatemateri(Request $request){

        Materi::where('materi_id',$request->id)->update([
            'nama_materi'=>$request->nama_materi,
            'deskripsi'=>$request->deskripsi

        ]);
        return back()->with('success', 'Materi berhasil diupdate');

    }

    public function deletemateri($id) {

        Materi::where('materi_id', $id)->delete();

        return back();

    }

    //zoom
    public function createzoom($id){


        $materi= Pertemuan::join('kelas','pertemuans.kelas','=','kelas.kelas_id')
        ->select('pertemuans.pertemuan_id','kelas.kelas_id')
        ->where('pertemuans.pertemuan_id', $id)->get();

        return view('user.createzoom',[
            'materi'=>$materi
        ]);
    }

    // public function editzoom($id){

    //     $materis = Materi::join('pertemuans','materis.pertemuan','=','pertemuans.pertemuan_id')
    //     ->join('kelas','pertemuans.kelas','=','kelas.kelas_id')
    //     ->select('materis.nama_materi','materis.deskripsi','pertemuans.pertemuan_id','kelas.kelas_id','materis.materi_id')->where('materis.materi_id', $id)->get();

    //     return view('user.editzoom',[
    //         'materis'=>$materis
    //     ]);
    // }
}
