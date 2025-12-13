@extends('main.admintemplate')
  @section('css')
  <link rel="stylesheet" href="{{asset('css/sidebar.css')}}" />
  <link rel="stylesheet" href="{{asset('css/fakultas.css')}}" />
  @endsection

  @section('title')
    <title>Fakultas</title>
  @endsection

   <!-- ALERT -->
   {{-- <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Kode Fakultas</strong> Sudah tersedia.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> --}}
  <!-- ALERT END -->

   <!-- ALERT -->
   @error('kode_fakultas')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>Kode Fakultas</strong> Tidak boleh Kosong. --}}
     {{$message}}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('nama_fakultas')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>Nama Fakultas</strong> Tidak boleh Kosong. --}}
     {{$message}}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('kode_jurusan')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>Kode Fakultas</strong> Tidak boleh Kosong. --}}
     {{$message}}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('nama_jurusan')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>Nama Jurusan</strong> Tidak boleh Kosong. --}}
     {{$message}}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('kode_mata_kuliah')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>Kode Matkul</strong> Tidak boleh Kosong. --}}
     <strong>{{$message}}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('nama_matkul')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>Nama Mata Kuliah</strong> Tidak boleh Kosong. --}}
     <strong>{{$message}}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('sks')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>SKS</strong> Tidak boleh Kosong. --}}
     {{$message}}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('kelas_id')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>SKS</strong> Tidak boleh Kosong. --}}
     <strong>{{$message}}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @error('kelas')
   <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
     {{-- <strong>SKS</strong> Tidak boleh Kosong. --}}
     <strong>{{$message}}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>  
   @enderror

   @if (session()->has('success'))
   <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{-- <strong>SKS</strong> Tidak boleh Kosong. --}}
    <strong>{{session('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
   @endif
   <!-- ALERT END -->

  @section('content')
      <!-- FAKULTAS CONTAINER -->
      <div class="container fakultas my-3 p-3">
        <h3>Data Fakultas</h3>
        <div class="container d-flex" style="height: 400px">
          <div class="form-fakultas p-2">
            <h5 class="text-center fw-bold">Create Fakultas</h5>
            <form action="/admin/faculty/create-fakultas" method="POST" class="text-dark py-3 fw-bold">
              @csrf
              <label for="id">Kode Fakultas</label>
              <input class="form-control @error('kode_fakultas') is-invalid @enderror" type="text" name="kode_fakultas" id="id" autocomplete="off"/>
              <label for="nama" class="my-2">Nama Fakultas</label>
              <input class="form-control @error('kode_fakultas') is-invalid @enderror" type="text" name="nama_fakultas" id="nama" autocomplete="off"/>
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
          <div class="table-fakultas overflow-auto py-2 px-5">
            <h5 class="text-center sticky-top bg-white fw-bold">Table Fakultas</h5>
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Kode Fakultas</th>
                  <th>Nama Fakultas</th>
                  <th>Dekan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fakultas as $fklts)
                <tr>
                  <td>{{$fklts['kode_fakultas']}}</td>
                  <td>{{$fklts['nama_fakultas']}}</td>
                  <td>{{$fklts['dekan']}}</td>
                  <td class="d-flex justify-content-center">
                    <a href="/admin/faculty/edit-fakultas/{{ $fklts["kode_fakultas"] }}">
                      <div class="btn btn-primary">
                        <i class="bx bx-edit-alt"></i>
                      </div>
                    </a>
                    <form action="/admin/faculty/delete-fakultas/{{$fklts['kode_fakultas']}}" method="post" class="ms-2">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">
                        <i class="bx bx-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- FAKULTAS CONTAINER END -->

      <!-- Jurusan CONTAINER -->
      <div class="container fakultas my-3 p-3">
        <h3>Data Jurusan</h3>
        <div class="container d-flex" style="height: 400px">
          <div class="form-fakultas p-2">
            <h5 class="text-center fw-bold">Create Jurusan</h5>
            <form action="/admin/faculty/create-jurusan" method="POST" class="text-dark py-3 fw-bold">
              @csrf
              <label for="kode_jurusan">Kode Jurusan</label>
              <input class="form-control @error('kode_jurusan') is-invalid @enderror" type="text" name="kode_jurusan" id="kode_jurusan" autocomplete="off"/>
              <label for="nama_jurusan" class="my-2">Nama Jurusan</label>
              <input class="form-control @error('kode_jurusan') is-invalid @enderror" type="text" name="nama_jurusan" id="nama_jurusan" autocomplete="off"/>
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
          <div class="table-fakultas overflow-auto py-2 px-5">
            <h5 class="text-center sticky-top bg-white fw-bold">Table Jurusan</h5>
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Kode Jurusan</th>
                  <th>Nama Jurusan</th>
                  <th>Degree</th>
                  <th>Fakultas</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jurusans as $jurusan)
                <tr>
                  <td>{{$jurusan['kode_jurusan']}}</td>
                  <td>{{$jurusan['nama_jurusan']}}</td>
                  <td>{{$jurusan['degree']}}</td>
                  <td>{{$jurusan['nama_fakultas']}}</td>
                  <td class="d-flex justify-content-center">
                    <a href="/admin/faculty/edit-jurusan/{{ $jurusan["kode_jurusan"] }}">
                      <div class="btn btn-primary">
                        <i class="bx bx-edit-alt"></i>
                      </div>
                    </a>
                    <form action="/admin/faculty/delete-jurusan/{{$jurusan['kode_jurusan']}}" method="post" class="ms-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        <i class="bx bx-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Jurusan CONTAINER END -->

      <!-- Matakuliah CONTAINER -->
      <div class="container fakultas my-3 p-3">
        <h3>Data Matakuliah</h3>
        <div class="container d-flex" style="height: 400px">
          <div class="form-fakultas p-2">
            <h5 class="text-center fw-bold">Create Matakuliah</h5>
            <form action="/admin/faculty/create-matkul" method="POST" class="text-dark py-3 fw-bold">
              @csrf
              <label for="kode_mata_kuliah">Kode Matakuliah</label>
              <input class="form-control @error('kode_mata_kuliah') is-invalid @enderror" type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" autocomplete="off"/>
              <label for="nama_matkul" class="my-2">Nama Matakuliah</label>
              <input class="form-control @error('nama_matkul') is-invalid @enderror" type="text" name="nama_matkul" id="nama_matkul" autocomplete="off"/>
              <label for="sks" class="my-2">Jumlah SKS</label>
              <input class="form-control @error('sks') is-invalid @enderror" type="number" name="sks" id="sks" />
              <label for="fakultas">Jurusan</label>
              <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                @foreach ($jurusans as $jurusan)
                  <option value="{{$jurusan['kode_jurusan']}}">{{$jurusan['nama_jurusan']}}</option>  
                @endforeach    
              </select>
              <input class="btn btn-success my-3 form-control" type="submit" value="SUBMIT" />
            </form>
          </div>
          <div class="table-fakultas overflow-auto py-2 px-5">
            <h5 class="text-center sticky-top bg-white fw-bold">Table Matakuliah</h5>
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Kode Matakuliah</th>
                  <th>Nama Matakuliah</th>
                  <th>SKS</th>
                  <th>Jurusan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($matakuliah as $matkul)
                <tr>
                  <td>{{$matkul['kode_mata_kuliah']}}</td>
                  <td>{{$matkul['nama_matkul']}}</td>
                  <td>{{$matkul['sks']}}</td>
                  <td>{{$matkul['nama_jurusan']}}</td>
                  <td class="d-flex justify-content-center">
                    <a href="/admin/faculty/edit-matkul/{{ $matkul["kode_mata_kuliah"] }}">
                      <div class="btn btn-primary">
                        <i class="bx bx-edit-alt"></i>
                      </div>
                    </a>
                    <form action="/admin/faculty/delete-matkul/{{$matkul['kode_mata_kuliah']}}" method="POST" class="ms-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        <i class="bx bx-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Matakuliah CONTAINER END -->

      <!-- Kelas CONTAINER -->
      <div class="container fakultas my-3 p-3">
        <h3>Data Kelas</h3>
        <div class="container d-flex" style="height: 400px">
          <div class="form-fakultas p-2">
            <h5 class="text-center fw-bold">Create Kelas</h5>
            <form action="/admin/faculty/create-kelas" method="POST" class="text-dark py-3 fw-bold">
              @csrf
              <label for="kelas_id">Kode Kelas</label>
              <input class="form-control @error('kelas_id') is-invalid @enderror" type="text" name="kelas_id" id="kelas_id" autocomplete="off"/>
               <label for="kelas">Kelas</label>
              <input class="form-control @error('kelas') is-invalid @enderror" type="text" name="kelas" id="kelas" autocomplete="off"/>
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
          <div class="table-fakultas overflow-auto py-2 px-5">
            <h5 class="text-center sticky-top bg-white fw-bold">Table Kelas</h5>
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Kode Kelas</th>
                  <th>Nama Kelas</th>
                  <th>Matakuliah</th>
                  <td>Dosen</td>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kelas as $kls)
                <tr>
                  <td>{{$kls['kelas_id']}}</td>
                  <td>{{$kls['kelas']}}</td>
                  <td>{{$kls['nama_matkul']}}</td>
                  <td>{{$kls['first_name']}} {{$kls['last_name']}}</td>
                  <td class="d-flex justify-content-center">
                    <a href="/admin/faculty/edit-kelas/{{ $kls["kelas_id"] }}">
                      <div class="btn btn-primary">
                        <i class="bx bx-edit-alt"></i>
                      </div>
                    </a>
                    <form action="/admin/faculty/delete-kelas/{{$kls['kelas_id']}}" method="POST" class="ms-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        <i class="bx bx-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Kelas CONTAINER END -->
      {{-- @include('sweetalert::alert') --}}
  @endsection