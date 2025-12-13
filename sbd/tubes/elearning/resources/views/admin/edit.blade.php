@extends('main.admintemplate')

@section('css')
<link rel="stylesheet" href="{{asset('css/mahasiswa.css')}}" />
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}" />
<style>
  .alert {

  }
</style>
@endsection

@section('title')
<title>Edit</title>
@endsection

@section('content')
{{-- <div class="container chart-container my-3 py-3">
  <h3>Dosen</h3>

  <div class="chart">
    <canvas class="my-3" id="dosenChart"></canvas>
  </div>
</div> --}}

@error('kode_fakultas')
  <div class="alert alert-danger alert-dismissible fade show text-center position-absolute container ms-3" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('nama_fakultas')
  <div class="alert alert-danger alert-dismissible fade show text-center position-absolute container ms-3" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('kode_jurusan')
  <div class="alert alert-danger alert-dismissible fade show text-center position-absolute container ms-3" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror

@error('nama_jurusan')
  <div class="alert alert-danger alert-dismissible fade show text-center position-absolute container ms-3" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@enderror


<div class="container table-container my-3 py-3">
  <!-- HEADER -->
  <div class="header-container">
    @if ($page === "edit-fakultas")
      <h3>Edit Fakultas</h3>
    @elseif($page === "edit-matkul")
      <h3>Edit Matkul</h3>
    @elseif($page === "edit-jurusan")
      <h3>Edit Jurusan</h3>
    @else
      <h3>Edit Kelas</h3>
    @endif
  </div>
  <!--  HEADER END -->

 

  {{-- FORM --}}
  @if ($page === "edit-fakultas")

    {{-- Fakultas --}}

    <div class="form-fakultas p-2">
      <h5 class="text-center fw-bold">Create Fakultas</h5>
      <form action="/admin/faculty/edit/fakultas" method="POST" class="text-dark py-3 fw-bold">
        @csrf
        @method('PATCH')
        <label for="id">Kode Fakultas</label>
        <input class="form-control @error('kode_fakultas') is-invalid @enderror" type="text" name="kode_fakultas" id="id" autocomplete="off" value="{{$data['kode_fakultas']}}"/>
        <label for="nama" class="my-2">Nama Fakultas</label>
        <input class="form-control @error('kode_fakultas') is-invalid @enderror" type="text" name="nama_fakultas" id="nama" autocomplete="off" value="{{$data['nama_fakultas']}}"/>
        <label for="dekan" class="my-2">Dekan</label>
        <select class="form-select" aria-label="Default select example" id="dekan" name="dekan">
          <option value= "">NULL</option>
          @foreach ($dosens as $dosen)
            <option value="{{$dosen['NIP']}}">{{$dosen['first_name']}} {{$dosen['last_name']}}</option> 
          @endforeach
        </select>
        <input class="btn btn-success my-3 form-control" type="submit" value="SUBMIT" />
      </form>
    </div>

    {{-- Fakultas End --}}

  @elseif($page === "edit-matkul")
    
    {{-- Matkul --}}
    <div class="form-fakultas p-2">
      <h5 class="text-center fw-bold">Create Matakuliah</h5>
      <form action="/admin/faculty/edit/matkul" method="POST" class="text-dark py-3 fw-bold">
        @csrf
        @method('PATCH')
        <label for="kode_mata_kuliah">Kode Matakuliah</label>
        <input class="form-control @error('kode_mata_kuliah') is-invalid @enderror" type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" autocomplete="off" value="{{$data['kode_mata_kuliah']}}"/>
        <label for="nama_matkul" class="my-2">Nama Matakuliah</label>
        <input class="form-control @error('nama_matkul') is-invalid @enderror" type="text" name="nama_matkul" id="nama_matkul" autocomplete="off" value="{{$data['nama_matkul']}}"/>
        <label for="sks" class="my-2">Jumlah SKS</label>
        <input class="form-control @error('sks') is-invalid @enderror" type="number" name="sks" id="sks" value="{{$data['sks']}}" />
        <label for="fakultas">Jurusan</label>
        <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
          @foreach ($jurusans as $jurusan)
            <option value="{{$jurusan['kode_jurusan']}}">{{$jurusan['nama_jurusan']}}</option>  
          @endforeach    
        </select>
        <input class="btn btn-success my-3 form-control" type="submit" value="SUBMIT" />
      </form>
    </div>
   {{--  Matkul End --}}

  @elseif($page === "edit-jurusan")
    {{-- Jurusan --}}
    <div class="form-fakultas p-2">
      <h5 class="text-center fw-bold">Create Jurusan</h5>
      <form action="/admin/faculty/edit/jurusan" method="POST" class="text-dark py-3 fw-bold">
        @csrf
        @method('PATCH')
        <label for="kode_jurusan">Kode Jurusan</label>
        <input class="form-control @error('kode_jurusan') is-invalid @enderror" type="text" name="kode_jurusan" id="kode_jurusan" autocomplete="off" value="{{$data['kode_jurusan']}}"/>
        <label for="nama_jurusan" class="my-2">Nama Jurusan</label>
        <input class="form-control @error('kode_jurusan') is-invalid @enderror" type="text" name="nama_jurusan" id="nama_jurusan" autocomplete="off" value="{{$data['nama_jurusan']}}"/>
        <label for="fakultas">Fakultas</label>
        <select class="form-select" aria-label="Default select example" id="fakultas" name="fakultas">
          @foreach ($fakultas as $fklts)
          <option value="{{$fklts['kode_fakultas']}}">{{$fklts['nama_fakultas']}}</option>
          @endforeach
        </select>
        <label for="degree">Degree</label>
        <select class="form-select" aria-label="Default select example" id="degree" name="degree">
          <option value="D3">D3</option>
          <option value="S1">S1</option>
          <option value="S2">S2</option>
          <option value="S3">S3</option> 
        </select>
        <input class="btn btn-success my-3 form-control" type="submit" value="SUBMIT" />
      </form>
    </div>
    {{-- Jurusan End --}}
  @else
    {{-- Kelas --}}
    <div class="form-fakultas p-2">
      <h5 class="text-center fw-bold">Create Kelas</h5>
      <form action="/admin/faculty/edit/kelas" method="POST" class="text-dark py-3 fw-bold">
        @csrf
        @method('PATCH')
        <label for="kelas_id">Kode Kelas</label>
        <input class="form-control @error('kelas_id') is-invalid @enderror" type="text" name="kelas_id" id="kelas_id" autocomplete="off" value="{{$data['kelas_id']}}"/>
         <label for="kelas">Kelas</label>
        <input class="form-control @error('kelas') is-invalid @enderror" type="text" name="kelas" id="kelas" autocomplete="off" value="{{$data['kelas']}}"/>
        <label for="mata_kuliah">Matakuliah</label>
        <select class="form-select" aria-label="Default select example" id="mata_kuliah" name="mata_kuliah">
          @foreach ($matakuliah as $matkul)
            <option value="{{$matkul['kode_mata_kuliah']}}">{{$matkul['nama_matkul']}}</option>
          @endforeach
        </select>
        <label for="dosen">Dosen</label>
        <select class="form-select" aria-label="Default select example" id="dosen" name="dosen">
          @foreach ($dosens as $dosen)
          <option value="{{$dosen['NIP']}}">{{$dosen['first_name']}} {{$dosen['last_name']}}</option>
          @endforeach
        </select>
        <input class="btn btn-success my-3 form-control" type="submit" value="SUBMIT" />
      </form>
    </div>
    {{-- Kelas End --}}
  @endif
  {{-- FORM END --}}
  

 
</div>
@endsection

@section('js')
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
@endsection