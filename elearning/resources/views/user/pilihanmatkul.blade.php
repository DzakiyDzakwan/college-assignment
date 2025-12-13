@extends('main.usertemplate')

@section('title')
<title>Mata Kuliah</title>
@endsection

@section('content')
    <div class="container my-4 bg-light py-3">
        @if (auth()->user()->status === "mahasiswa")
            
        
        <div class="text-center my-3 fw-bold pb-2 fs-2 text-success">Select Your Course</div>

        <div class="row mx-2 my-4">
            <div class="col-2 px-4">Search courses</div>
            <div class="col-5"><input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example"></div>
            <div class="col"><button type="button" class="btn btn-secondary btn-sm ">Go</button></div>
        </div>
        

        <!-- tabel matkul -->
        <div class="px-3">
            <table class="table table-striped">
                <div class="mx-3">
                    @foreach ($kelas as $kls)
                    <tr>
                        <td class="px-4">[{{$kls->mata_kuliah}}] {{$kls->nama_matkul}} - {{$kls->kelas}}</td>
                        <td class="text-secondary">{{$kls->first_name}} {{$kls->last_name}}</td>
                        <td>
                            <div class="text-end px-4">
                           <a href="/user/enrollmatkul/{{$kls->kelas_id}}"> <button type="#" class="btn btn-success ">Enroll</button></a>
                            
                            {{-- <button type="button" class="btn btn-success btn-sm ">Enroll</button> --}}
                        </td>
                        </div>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td class="px-4">[TIF1207] Struktur Data Dan Algoritma - Kelas B</td>
                        <td class="text-secondary">Sawaluddin TBA</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1207] Struktur Data Dan Algoritma - Kelas C</td>
                        <td class="text-secondary">Fanindia Purnamasari TBA</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1205] Sistem Basis Data - Kelas A</td>
                        <td class="text-secondary">Sarah Purnamawati</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1205] Sistem Basis Data - Kelas B</td>
                        <td class="text-secondary">Sarah Purnamawati</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1205] Sistem Basis Data - Kelas C</td>
                        <td class="text-secondary">Sarah Purnamawati</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr> --}}
                
                </div>
            </table>
        </div>

        <!-- pagination tabel-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center text-decoration-none text-success">
              <li class="page-item">
                <a class="page-link text-decoration-none text-success" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link text-decoration-none text-success" href="#">1</a></li>
              <li class="page-item"><a class="page-link text-decoration-none text-success" href="#">2</a></li>
              <li class="page-item"><a class="page-link text-decoration-none text-success" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link text-decoration-none text-success" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
        <!-- end pagination tabel-->
        @elseif(auth()->user()->status === "dosen")
        <div class="text-center my-3 fw-bold pb-2 fs-2 text-success">Select Your Course</div>

        <div class="row mx-2 my-4">
            <div class="col-2 px-4">Search courses</div>
            <div class="col-5"><input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example"></div>
            <div class="col"><button type="button" class="btn btn-secondary btn-sm ">Go</button></div>
        </div>
        

        <!-- tabel matkul -->
        <div class="px-3">
            <table class="table table-striped">
                <div class="mx-3">
                    @foreach ($kelas as $kls)
                    <tr>
                        <td class="px-4">[{{$kls->mata_kuliah}}] {{$kls->nama_matkul}} - {{$kls->kelas}}</td>
                        <td class="text-secondary">{{$kls->first_name}} {{$kls->last_name}}</td>
                        
                        </div>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td class="px-4">[TIF1207] Struktur Data Dan Algoritma - Kelas B</td>
                        <td class="text-secondary">Sawaluddin TBA</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1207] Struktur Data Dan Algoritma - Kelas C</td>
                        <td class="text-secondary">Fanindia Purnamasari TBA</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1205] Sistem Basis Data - Kelas A</td>
                        <td class="text-secondary">Sarah Purnamawati</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1205] Sistem Basis Data - Kelas B</td>
                        <td class="text-secondary">Sarah Purnamawati</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr>
                    <tr>
                        <td class="px-4">[TIF1205] Sistem Basis Data - Kelas C</td>
                        <td class="text-secondary">Sarah Purnamawati</td>
                        <td><div class="text-end px-4"><button type="button" class="btn btn-success btn-sm ">Enroll</button></td></div>
                    </tr> --}}
                
                </div>
            </table>
        </div>

        <!-- pagination tabel-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center text-decoration-none text-success">
              <li class="page-item">
                <a class="page-link text-decoration-none text-success" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link text-decoration-none text-success" href="#">1</a></li>
              <li class="page-item"><a class="page-link text-decoration-none text-success" href="#">2</a></li>
              <li class="page-item"><a class="page-link text-decoration-none text-success" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link text-decoration-none text-success" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
        <!-- end pagination tabel-->
        @endif
    </div>
    
@endsection