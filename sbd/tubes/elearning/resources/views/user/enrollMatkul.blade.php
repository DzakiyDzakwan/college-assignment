@extends('main.usertemplate')

@section('title')
<title>Enroll Mata Kuliah</title>
@endsection

@section('content')

{{-- <div class="mx-5 px-5 my-4 pt-2 fw-bold fs-3">[TIF1207] Struktur Data Dan Algoritma - Kelas C</div> --}}

    <div class="container my-5 bg-light py-3">
        <div class="my-3 fw-bold pb-2 fs-4">Enrolment options</div>

        @foreach ($kelas as $kls)

        <div class="mx-5 my-4 pt-2 fw-bold fs-5 text-success">[{{$kls->mata_kuliah}}] {{$kls->nama_matkul}} - Kelas {{$kls->kelas}}
        </div>
        <div class="mx-5 bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 200px;">
            <a href="#" class="text-decoration-none text-success px-4">{{$kls->first_name}} {{$kls->last_name}}</a>
        </div>
             
        <form action="/user/enrollme" method="POST">
            @csrf
            <input type="hidden" class="col form-control" id="enroll_id" name="enroll_id" value="">
            <input type="hidden" class="col form-control" id="user" name="user" value="{{auth()->user()->NIK}}">
            <input type="hidden" class="col form-control" id="kelas" name="kelas" value="{{$kls->kelas_id}}">
        
        @endforeach

        <!-- button enrol-->
        <hr>
        <div class="px-4 py-3 text-center">
            <button type="submit" class="btn btn-success">Enrol me</button>
        </div>

        </form>


    </div>
    
@endsection