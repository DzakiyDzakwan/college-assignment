@extends('main.usertemplate')

@section('title')
<title>Participants</title>
@endsection

@section('content')
@foreach($juduls as $kls)
<div class="mx-5 px-5 my-4 pt-2 fw-bold fs-2">[{{$kls->mata_kuliah}}] {{$kls->nama_matkul}} - {{$kls->kelas}}</div>
@endforeach
    <div class="container my-4 bg-light py-3">
 
        <!-- tabel -->
        <div class="px-3 mt-2">
        <table class="table table-striped">
            <thead>
                <!-- judul tabel -->
            <tr>
                <th>First name/Surname</th>
                <th>Roles</th>
                <th width="20%">Groups</th>
                <!-- <th width="20%">Last access to course</th> -->
            </tr>
            </thead>
            @foreach($participants as $participant)
            <tr>
                <td>
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle px-2" width="50px">
                    <a href="" class="text-decoration-none text-success fw-bold">{{$participant->first_name}} {{$participant->last_name}}</a>
                </td>
                
                <td>{{$participant->role}}</td>
                <td>No groups</td>
            </tr>
            @endforeach
            <tr>
                <td><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle px-2" width="50px"><a href="" class="text-decoration-none text-success fw-bold">{{$dosen->first_name}} {{$dosen->last_name}}</a></td>
                
                <td>teacher</td>
                <td>No groups</td>
            </tr>
        </table>
        </div>
        <!-- end table -->

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
    </div>
@endsection