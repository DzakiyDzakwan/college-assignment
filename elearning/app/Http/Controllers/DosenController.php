<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard(){
        $page = 'dashboard';

        return view('user.dashboarduser', compact('page'));

    }

    public function sitehome(){
        $page = 'sitehome';

        return view('user.sitehome', compact('page'));

    }

    public function participants(){
        $page = 'participants';

        return view('user.participants', compact('page'));

    }

    public function matakuliah(){
        $page = 'matakuliah';

        return view('user.matakuliah', compact('page'));

    }

    public function absen(){
        $page = 'absen';

        return view('user.absen', compact('page'));

    }

    public function tugas(){
        $page = 'tugas';

        return view('user.tugas', compact('page'));

    }

    public function profile(){
        $page = 'profile';

        return view('user.profile', compact('page'));

    }

    public function editprofil(){
        $page = 'editprofil';

        return view('user.editprofil', compact('page'));

    }

    public function pilihanjurusan(){
        $page = 'pilihanjurusan';

        return view('user.pilihanjurusan', compact('page'));

    }

    public function enrollmatkul(){
        $page = 'enrollmatkul';

        return view('user.enrollmatkul', compact('page'));

    }
}
