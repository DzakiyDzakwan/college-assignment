@extends('main.usertemplate')

@section('title')
<title>Pilihan Jurusan</title>
@endsection

@section('content')
    <div class="container my-4 bg-light py-3">
        <div class="text-center text-success my-3 fw-bold pb-2 fs-2"></div>
        @foreach ($juduls as $judul)
        <div class="text-center my-3 fw-bold pb-2 fs-2">{{$judul->nama_fakultas}}</div>
        @endforeach
        <div class="mx-3 px-2 my-2 py-2">
            <ul >
                @foreach ($jurusans as $jurusan)
                <a href="/user/pilihanmatkul/{{$jurusan->kode_jurusan}}" class="text-decoration-none text-success fw-bold fs-4" value="{{$jurusan['kode_fakultas']}}"><li>{{$jurusan->nama_jurusan}}</li></a>
                @endforeach
            </ul>
        </div>

    </div>
@endsection