@extends('main.usertemplate')

@section('title')
<title>Absen</title>
@endsection

@section('content')
  <div class="container my-4 mt-5 bg-light py-3">
    
    @if(($message = Session::get('errors')))
    <div class="alert alert-danger alert-block">	
		  <strong>{{ $message }}</strong>
	  </div>
    {{-- @elseif(($message = Session::get('errors')))
    <div class="alert alert-danger alert-block">	
		  <strong>{{ $message }}</strong>
	  </div> --}}
	@endif
  {{-- judul kelas --}}
    @foreach($pertemuan as $prtm)
    <div class="mx-2 my-3 mb-5 fw-bold pb-2 fs-3">[{{$prtm->mata_kuliah}}] {{$prtm->nama_matkul}} - {{$prtm->kelas}}</div>
    @endforeach

    {{-- Presesnsi Mahasiswa --}}
    @if(auth()->user()->status === 'mahasiswa')
    <div class="card card-body border-0">
      <div class="">Presensi Hari Ini</div>
      <form action="/user/absen/add-absen" method="POST">
        @csrf
        @foreach($mahasiswas as $mahasiswa)
        <input type="hidden" class="col form-control" id="mahasiswa" name="mahasiswa" value="{{$mahasiswa->NIM}}">
        @endforeach

        @foreach($pertemuan as $prtm)
        <input type="hidden" class="col form-control" id="pertemuan" name="pertemuan" value="{{$prtm->pertemuan_id}}">
        @endforeach

        <div class="row px-2 py-2">
          <div class="col-2 form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="hadir" >
            <label class="form-check-label" for="hadir">
              Hadir
            </label>
          </div>
          <div class="col-2 form-check ">
            <input class="form-check-input" type="radio" name="status" id="status" value="terlambat">
            <label class="form-check-label" for="terlambat">
              Terlambat
            </label>
          </div>
          <div class="col-2 form-check ">
            <input class="form-check-input" type="radio" name="status" id="status" value="absen">
            <label class="form-check-label" for="absen">
              Absen
            </label>
          </div>
        </div>  
        
        <div class="">
          <button type="submit" class="btn btn-success">Kirimkan</button>
          @foreach($pertemuan as $mtr)
            <a href="/user/matakuliah/{{$mtr->kelas_id}}"><button type="button" class="btn btn-secondary ">Kembali</button></a>
          @endforeach
        </div>
      </form>
    </div>
    
    {{-- end Presensi Mahasiswa --}}

    <div class="mx-3 mt-5">
    <table class="table table-striped">
      <thead>
        <!-- judul tabel mahasiswa-->
        <tr>
            <th>Date</th>
            <th>Status</th>
            <th>Waktu Absensi</th>
        </tr>
        </thead>
        <!-- data tabel -->
        @foreach($absens as $absen)
        <tr>
          <td>{{$absen->tanggal_pertemuan}}</td>
          <td>{{$absen->status}}</td>
          <td>{{$absen->created_at}}</td>
        </tr>
        @endforeach
    </table>


    @elseif(auth()->user()->status === 'dosen')

    
    <div class="mx-3 mt-5">
      <table class="table table-striped">
        <thead>
          <!-- judul tabel mahasiswa-->
          <tr>
              <th>Date</th>
              <th>Status</th>
              <th>Waktu Absensi</th>
              {{-- @if(auth()->user()->status === 'dosen') --}}
              <th>Nama Siswa</th>
              {{-- @endif --}}
          </tr>
        </thead>
          <!-- data tabel -->
          @foreach($absens as $absen)
          <tr>
            <td>{{$absen->tanggal_pertemuan}}</td>
            <td>{{$absen->status}}</td>
            <td>{{$absen->created_at}}</td>
            {{-- @if(auth()->user()->status === 'dosen') --}}
            <td>{{$absen->first_name}} {{$absen->last_name}}</td>
            {{-- @endif --}}
          </tr>
          @endforeach
      </table>

    </div>
    @endif

  </div>

@endsection