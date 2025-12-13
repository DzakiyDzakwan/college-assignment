<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\EditAdminController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TEST

Route::middleware('guest')->group(function(){

// LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');

Route::post('/', [LoginController::class, 'authenticate']);

// REGISTER
Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/register', [RegisterController::class, 'store']);

});

Route::middleware('auth')->group(function() {

  Route::middleware('checkprofile')->group(function(){

      // USER
      //Enrollment Kelas
      Route::get('/user/sitehome', [EnrollController::class, 'sitehome']);
      Route::get('/user/pilihanjurusan/{id}', [EnrollController::class, 'jurusan']);
      Route::get('/user/pilihanmatkul/{id}', [EnrollController::class, 'pilihanmatkul']);
      Route::get('/user/enrollmatkul/{id}', [EnrollController::class, 'enrollmatkul']);
      Route::post('/user/enrollme', [EnrollController::class, 'enroll']);


      //Dashboard User
      Route::get('/dashboard', [DashboardController::class, 'index']);

      //Profil User
      Route::get('/user/profile', [ProfilController::class, 'profile']);
      Route::get('/user/editprofil/{id}', [ProfilController::class, 'editprofil']);
      Route::put('/user/updateprofile/{id}', [ProfilController::class, 'updateprofile']);

      //Kelas
      Route::get('/user/matakuliah/{id}', [KelasController::class, 'kelas']);
      

      // Route::middleware('dosen')->group(function(){
        //Pertemuan
        Route::post('/user/matakuliah/createPertemuan', [PertemuanController::class, 'pertemuanStore']);
        Route::delete('/user/matakuliah/deletePertemuan/{id}', [PertemuanController::class, 'pertemuanDelete']);
        Route::get('/user/matakuliah/editPertemuan/{id}', [PertemuanController::class, 'pertemuanEdit']);
        Route::put('/user/matakuliah/updatePertemuan/{id}', [PertemuanController::class, 'pertemuanUpdate']);

        //materi
        Route::post('/user/matakuliah/createMateri', [MateriController::class, 'materiStore']);
        Route::get('/user/matakuliah/createMateripage/{id}', [MateriController::class, 'createmateri']);
        Route::post('/user/matakuliah/tambahpertemuan', [MateriController::class, 'showmateri']);
        Route::get('/user/matakuliah/editmateri/{id}', [MateriController::class, 'editmateri']);
        Route::put('/user/matakuliah/updatemateri/{id}', [MateriController::class, 'updatemateri']);
        Route::delete('/user/matakuliah/deletemateri/{id}', [MateriController::class, 'deletemateri']);

        //zoom
        /* Route::get('/user/matakuliah/createzoom/{id}', [MateriController::class, 'createzoom']); */
      // });

      //Participant
      Route::get('/user/participants/{id}', [ParticipantController::class, 'index']);
      // });

      //Absensi
      Route::get('/user/absen/{id}', [AbsensiController::class, 'absen']);
      Route::post('/user/absen/add-absen', [AbsensiController::class, 'absenStore']);

      
      //Tugas
      Route::get('/user/tugas/{id}', [TugasController::class, 'tugas']);
      Route::post('/user/tugas/create', [TugasController::class, 'store']);
      Route::get('/user/matakuliah/edittugas/{id}', [TugasController::class, 'edit']);
      Route::put('/user/matakuliah/updatetugas/{id}', [TugasController::class, 'update']);
      Route::delete('/user/matakuliah/deletetugas/{id}', [TugasController::class, 'delete']);

      //Jawaban
      Route::post('/user/tugas/store-jawaban', [JawabanController::class, 'store']);
      Route::patch('/user/tugas/createnilai', [JawabanController::class, 'update']);
      Route::delete('/user/jawaban-delete/{id}', [JawabanController::class, 'delete']);
  });

  //Admin
  Route::middleware('admin')->group(function(){

      Route::get('/admin', [AdminController::class, 'dashboard']);

      Route::get('/admin/user', [AdminController::class, 'user']);

      Route::delete('/admin/user/delete-user/{id}', [AdminController::class, 'userDelete']);

      Route::post('/admin/user/create-mahasiswa', [AdminController::class, 'mahasiswaStore']);

      Route::post('/admin/user/create-dosen', [AdminController::class, 'dosenStore']);

      /* ADMIN MAHASISWA */
      Route::get('/admin/mahasiswa', [AdminController::class, 'mahasiswa']);

      Route::delete('/admin/mahasiswa/delete-mahasiswa/{id}', [AdminController::class, 'mahasiswaDelete']);

      /* ADMIN ASLAB */
      Route::post('/admin/mahasiswa/add-aslab/{id}', [AdminController::class , 'addAslab']);

      Route::delete('/admin/mahasiswa/delete-aslab/{id}', [AdminController::class, 'aslabDelete']);

      /* ADMIN DOSEN */
      Route::get('/admin/dosen', [AdminController::class, 'dosen']);

      Route::delete('/admin/dosen/delete-dosen/{id}', [AdminController::class, 'dosenDelete']);

      /* ADMIN FAKULTAS */
      Route::get('/admin/faculty', [AdminController::class, 'faculty']);

      Route::post('/admin/faculty/create-fakultas', [AdminController::class, 'fakultasStore']);

      Route::delete('/admin/faculty/delete-fakultas/{id}', [AdminController::class, 'fakultasDelete']);

      Route::post('/admin/faculty/create-jurusan', [AdminController::class, 'jurusanStore']);

      Route::delete('/admin/faculty/delete-jurusan/{id}', [AdminController::class, 'jurusanDelete']);

      Route::post('/admin/faculty/create-matkul', [AdminController::class, 'matkulStore']);

      Route::delete('/admin/faculty/delete-matkul/{id}', [AdminController::class, 'matkulDelete']);

      Route::post('/admin/faculty/create-kelas', [AdminController::class, 'kelasStore']);

      Route::delete('/admin/faculty/delete-kelas/{id}', [AdminController::class, 'kelasDelete']);

      //Edit
      Route::get('/admin/faculty/{page}/{id}', [EditAdminController::class, 'index']);

      Route::patch('/admin/faculty/edit/{page}', [EditAdminController::class, 'update']);


  });


});

Route::get('/test', [TestController::class, 'index'])->name('test')->middleware('user');



// LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);



