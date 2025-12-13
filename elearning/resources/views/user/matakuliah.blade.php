<?php
 use App\Models\Materi;
 use App\Models\Tugas;

 $date = date('Y-m-d');
?>

@extends('main.usertemplate')

@include('components.createpertemuan')

@include('components.createmateri')


@section('title')
<title>Course : [TIF1207] Struktur Data Dan Algoritma - Kelas C</title>
@endsection

@section('content')

@foreach($juduls as $kls)
<div class="mx-5 px-5 my-4 pt-2 fw-bold fs-2">[{{$kls->mata_kuliah}}] {{$kls->nama_matkul}} - {{$kls->kelas}}</div>
@endforeach

{{-- dosen membuat pertemuan --}}
@if(auth()->user()->status === 'dosen')
<div class="header-container">
   <div class="me-3 create-btn btn btn-success align-items-center" data-bs-toggle="modal" data-bs-target="#add"><i class="fas fa-plus"></i> Pertemuan</div>
</div>
@endif

{{-- <a href="/user/participants">
<div class=" btn btn-success align-items-center" data-bs-toggle="" data-bs-target="">Participants</div>
</a> --}}
{{-- @foreach($participants as $participant)
<a href="/user/participants/{{$participant->kelas}}"><button class="btn btn-outline-success" type="button">Button</button></a>
@endforeach --}}
{{-- <a href="/user/participants/"><button class="btn btn-outline-success" type="button">Button</button></a> --}}
<!--container -->
<div class="container my-4 bg-light py-3">

   
    

    <div class="row px-5 py-4">
        <a href="#" id="#" class="fw-bold fs-3 px-2 text-decoration-none" style=" color: #008b00;">General</a>
        @foreach($juduls as $kls)
            <div class="media py-3 ml-0">
                <p>Selamat datang di Kelas {{$kls->nama_matkul}} {{$kls['kelas']}}</p>
                <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                    <a href="/user/participants/{{$kls->kelas_id}}" class="text-decoration-none text-success px-4"><i class="fas fa-users mx-2"> </i>Participants</a>
                </div>
                {{-- <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                    <a href="#" class="text-decoration-none text-success px-4">Link Zoom</a>
                </div> --}}
            </div>
        @endforeach

        <hr class="">
    @foreach($pertemuan as $prtm)
    
    @include('components.createtugas')

    <div class="col d-flex">

        <?php $time = strtotime($prtm->tanggal_pertemuan) ?>

        @if (auth()->user()->status === 'dosen')
            <div>
                <a href="#" id="#" class="fw-bold pb-2 fs-3 px-2 text-decoration-none" style=" color: #008b00;">{{$prtm->nama_pertemuan}}</a>
                <p class="px-2">Selamat Datang di {{$prtm->nama_pertemuan}}</p>
            </div>
        @else
            
            @if ($prtm->tanggal_pertemuan > $date)
                <div>
                    <a href="#" id="#" class="fw-bold pb-2 fs-3 px-2 text-decoration-none text-danger"><i class="fas fa-lock fs-5"></i>Locked</a>
                    <p class="px-2">Pertemuan Terbuka pada tanggal {{date('d-M-Y', $time)}}</p>
                </div>
            @else
                <div>
                    <a href="#" id="#" class="fw-bold pb-2 fs-3 px-2 text-decoration-none" style=" color: #008b00;">{{$prtm->nama_pertemuan}}</a>
                    <p class="px-2">Selamat Datang di {{$prtm->nama_pertemuan}}</p>
                </div>
            @endif
        @endif
        

        @if(auth()->user()->status === 'dosen')
        <div class="justify-content-end d-flex col px-">
            {{-- edit pertemuan --}}
            <a href="/user/matakuliah/editPertemuan/{{$prtm->pertemuan_id}}"> 
                <button type="#" class="btn btn-primary"><i class="fas fa-edit"></i></button>
            </a>
            {{-- delete pertemuan --}}
            <form action="/user/matakuliah/deletePertemuan/{{$prtm->pertemuan_id}}" method="post" class="ms-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
        @endif
    </div>

    @if(auth()->user()->status === 'dosen')
    <div class="d-grid gap-3 d-md-block">
        <a href="/user/matakuliah/createMateripage/{{$prtm->pertemuan_id}}"><button class="btn btn-outline-success" type="button"><i class="fas fa-plus"></i> Materi</button></a>
        <a href="#" onclick="event.prevent()"><button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#addTugas{{$loop->iteration}}"><i class="fas fa-plus"></i>Tugas</button></a>
    </div>
    @endif
        <div class="media py-3 ml-0">

            {{-- show materi --}}
            <?php $materis = Materi::join('pertemuans','materis.pertemuan','=','pertemuans.pertemuan_id')->
            join('kelas','pertemuans.kelas','=','kelas.kelas_id')->select('materis.materi_id','materis.nama_materi','materis.deskripsi','materis.pertemuan','pertemuans.pertemuan_id','kelas.kelas_id')
            ->where('pertemuans.pertemuan_id', $prtm->pertemuan_id)
            ->get(); ?>

            
            @if (auth()->user()->status === 'dosen')
                
                {{-- LINK ZOOM --}}
                <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                    <a href="{{$prtm->link}}" target="_blank" class="text-decoration-none text-success px-4"><i class="fas fa-link mx-2"></i>Link Pertemuan</a>
                </div>
                {{-- Link zoom ENd --}}

                {{-- Absensi --}}
                <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                    <a href="/user/absen/{{$prtm->pertemuan_id}}" class="text-decoration-none text-success px-4"><i class="fas fa-clipboard-list mx-2"></i>Daftar Hadir</a>
                </div>
                {{-- Absensi End --}}

                {{-- show materi --}}
                @foreach($materis as $materi)
                    <div class="row">
                        <div class="col">

                            <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                                <a href="{{$materi->deskripsi}}" target="_blank" class="text-decoration-none text-success px-4"><i class="fas fa-book mx-2"></i>{{$materi->nama_materi}}</a>
                                {{-- {{dd($materis)}} --}}
                            </div>
                        </div>
                        @if(auth()->user()->status === 'dosen')
                            <div class="justify-content-end d-flex col">
                                {{-- update materi --}}
                                <a href="/user/matakuliah/editmateri/{{$materi->materi_id}}"> 
                                    <button type="#" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                </a>
                                {{-- delete materi --}}
                                <form action="/user/matakuliah/deletemateri/{{$materi->materi_id}}" method="post" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
                {{-- end show materi --}}

                {{-- Tugas --}}
                <?php $tugas = Tugas::select('nama_tugas', 'tugas_id')->where('pertemuan', $prtm->pertemuan_id)->get() ?>

                @foreach ($tugas as $tgs)
                    <div class="row">
                        <div class="col">

                            
                            <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                                <a href="/user/tugas/{{$tgs->tugas_id}}" class="text-decoration-none text-success px-4"><i class="fas fa-scroll mx-2"></i>{{$tgs->nama_tugas}}</a>
                                {{-- {{dd($materis)}} --}}
                            </div>
                        
                        </div>
                        @if(auth()->user()->status === 'dosen')
                            <div class="justify-content-end d-flex col">
                                {{-- update materi --}}
                                <a href="/user/matakuliah/edittugas/{{$tgs->tugas_id}}"> 
                                    <button type="#" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                </a>
                                {{-- delete materi --}}
                                <form action="/user/matakuliah/deletetugas/{{$tgs->tugas_id}}" method="post" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
                {{-- Tugas End --}}

            @else
                
                @if ($prtm->tanggal_pertemuan > $date)
                    
                    {{-- LINK ZOOM --}}
                    <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                        <p class="text-decoration-none text-success px-4 my-0 text-danger"><i class="fas fa-lock fs-5 mx-2"></i>Link Pertemuan</p>
                    </div>
                    {{-- Link zoom ENd --}}

                    {{-- Absensi --}}
                    <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                        <p class="text-decoration-none text-success px-4 my-0 text-danger"><i class="fas fa-lock fs-5 mx-2"></i>Daftar Hadir</p>
                    </div>
                    {{-- Absensi End --}}

                @else
                    
                    {{-- LINK ZOOM --}}
                    <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                        <a href="{{$prtm->link}}" class="text-decoration-none text-success px-4"><i class="fas fa-link mx-2"></i>Link Pertemuan</a>
                    </div>
                    {{-- Link zoom ENd --}}

                    {{-- Absensi --}}
                    <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                        <a href="/user/absen/{{$prtm->pertemuan_id}}" class="text-decoration-none text-success px-4"><i class="fas fa-clipboard-list mx-2"></i>Daftar Hadir</a>
                    </div>
                    {{-- Absensi End --}}

                        {{-- show materi --}}
                    @foreach($materis as $materi)
                        <div class="row">
                            <div class="col">

                                <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                                    <a href="{{$materi->deskripsi}}" target="_blank" class="text-decoration-none text-success px-4"><i class="fas fa-book mx-2"></i>{{$materi->nama_materi}}</a>
                                    {{-- {{dd($materis)}} --}}
                                </div>
                            </div>
                            @if(auth()->user()->status === 'dosen')
                                <div class="justify-content-end d-flex col">
                                    {{-- update materi --}}
                                    <a href="/user/matakuliah/editmateri/{{$materi->materi_id}}"> 
                                        <button type="#" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </a>
                                    {{-- delete materi --}}
                                    <form action="/user/matakuliah/deletemateri/{{$materi->materi_id}}" method="post" class="ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    {{-- end show materi --}}

                    {{-- Tugas --}}
                    <?php $tugas = Tugas::select('nama_tugas', 'tugas_id')->where('pertemuan', $prtm->pertemuan_id)->get() ?>

                    @foreach ($tugas as $tgs)
                        <div class="row">
                            <div class="col">

                                
                                <div class="bg-secondary bg-opacity-10 py-2 mb-3 rounded-3" style="width: 300px;">
                                    <a href="/user/tugas/{{$tgs->tugas_id}}" class="text-decoration-none text-success px-4"><i class="fas fa-scroll mx-2"></i>{{$tgs->nama_tugas}}</a>
                                    {{-- {{dd($materis)}} --}}
                                </div>
                            
                            </div>
                            @if(auth()->user()->status === 'dosen')
                                <div class="justify-content-end d-flex col">
                                    {{-- update materi --}}
                                    <a href="/user/matakuliah/edittugas/{{$tgs->tugas_id}}"> 
                                        <button type="#" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </a>
                                    {{-- delete materi --}}
                                    <form action="/user/matakuliah/deletetugas/{{$tgs->tugas_id}}" method="post" class="ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    {{-- Tugas End --}}

                @endif
            @endif

        </div><hr>
    @endforeach
    </div>     
                   
</div>
<!--end container -->
@endsection
