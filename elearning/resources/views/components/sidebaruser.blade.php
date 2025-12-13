<?php
use App\Models\Enrollment;
use App\Models\Kelas;

$nik = auth()->user()->NIK;

if(auth()->user()->status === 'mahasiswa'){


  $kelas = Enrollment::join('kelas','enrollments.kelas','=','kelas.kelas_id')->join('mata_kuliahs','kelas.mata_kuliah','=','mata_kuliahs.kode_mata_kuliah')->join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user' , '=', 'users.NIK')->select('enrollments.kelas','kelas.kelas_id', 'kelas.kelas','mata_kuliahs.nama_matkul', 'users.first_name', 'users.last_name', 'mata_kuliahs.kode_mata_kuliah')->where('enrollments.user',$nik)->get();

} elseif(auth()->user()->status === 'dosen') {

  //sidebar
  $kelas = Kelas::join('dosens', 'kelas.dosen', '=', 'dosens.NIP')->join('users', 'dosens.user', '=', 'users.NIK')->join('mata_kuliahs', 'kelas.mata_kuliah', '=', 'mata_kuliahs.kode_mata_kuliah')->select('mata_kuliahs.nama_matkul', 'mata_kuliahs.kode_mata_kuliah','kelas.kelas_id', 'kelas.kelas', 'users.first_name', 'users.last_name')->where('dosens.user', $nik)->get();

} ?>
<!-- sidebar -->
<div class="sidebar-container sticky-top col-auto px-0 mx-0 py-5 flex-nowrap vh-100 overflow-auto shadow">
  <div id="sidebar" class="sidebar-menu collapse show">

    <!-- Sidebar Menu -->
    <ul id="sidebar-nav" class="list-group mt-3" style="width: 260px">
      <a class="menu border-0 py-3 
        {{Request::is('dashboard')?'active':''}}" href="{{url('/dashboard')}}">
        <li><i class="fas fa-tachometer-fast"></i> Dashboard</li>
      </a>
      <a class="menu border-0 py-3 
        {{Request::is('user/sitehome')?'active':''}}" href="{{url('/user/sitehome')}}">
        <li><i class="fas fa-home"></i> Site home</li>
      </a>

      <!-- mata kuliah -->
      <a class="menu border-0 py-3">
        <li><i class="fas fa-graduation-cap"></i> My courses</li>
      </a>

       @foreach($kelas as $matkul)
      <a href="/user/matakuliah/{{$matkul['kelas_id']}}" class="menu border-0 py-3 
      {{Request::is('user/matakuliah')?'active':''}}" href="{{url('/user/matakuliah')}}
      ">
          <li><i class="fas fa-graduation-cap"></i> [{{$matkul['kode_mata_kuliah']}}] {{$matkul['nama_matkul']}} - Kelas  {{$matkul['kelas']}}</li>
      </a>
      @endforeach

        {{-- <ul class="collapse list-unstyled nav flex-column " id="submenu">
          <a class="nav-link menu border-0 py-3 
            {{Request::is('user/participants')?'active':''}}" href="{{url('/user/participants')}}">
            <li><i class="fa-solid fa-users"></i> Participants</li></a>

          <a class="nav-link menu border-0 py-3 
            {{Request::is('user/matakuliah')?'active':''}}" href="{{url('/user/matakuliah')}}">
            <li><i class="fa-solid fa-folder"></i> Pertemuan 1</li></a>
        </ul> --}} 
        <!-- end mata kuliah -->
        
    </ul>
    <!-- end sidebar menu -->

  </div>
</div>
<!-- End sidebar-->