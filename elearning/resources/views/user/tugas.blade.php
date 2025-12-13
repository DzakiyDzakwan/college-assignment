<?php 
use App\Models\Jawaban;
$nik  = auth()->user()->NIK;
?>

@extends('main.usertemplate')

@section('title')
<title>Tugas</title>
@endsection

@section('content')
<style>
  .button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: auto;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid gray;
}
.button1:hover {
  background-color: gray;
  color: white;
}
</style>
  <div class="mx-2 my-3 mb-5 fw-bold pt-5 fs-3">[TIF1207] Struktur Data Dan Algoritma - Kelas C</div>

  <div class="container my-4 bg-light rounded py-5">

    @if (auth()->user()->status === 'dosen')
      <h6>List Pengumupulan Jawaban</h6>

      <table class="table table-striped">

        <thead>
          <tr>
            <th>First Name/Surname</th>
            <th>file</th>
            <th>Nilai</th>
            <th>status</th>
            <th>action</th>
          </tr>
        </thead>

        <tbody>

          @foreach ($jawaban as $jwb)
            @include('components.createnilai')
            <tr>
              <td class="">{{$jwb->first_name}} {{$jwb->last_name}} {{$jwb->NIM}}</td>
              <td class=""><a href="{{$jwb->file}}" download>Download</a></td>
              <td class="">{{$jwb->nilai}}</td>

              @if ($jwb->submited_status)
                <td class="" class="text-success">Graded</td>
              @else
                <td class="" class="text-danger">Ungraded</td>
              @endif
              
              <td class="">
                <a href="#" onclick="event.prevent()" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addNilai{{$loop->iteration}}">Beri Nilai</a>
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>
    @else

      <?php 
      $checkJawaban =  Jawaban::select('jawabans.submited_status', 'jawabans.nilai', 'jawabans.updated_at', 'jawabans.file', 'jawabans.komentar')->where('tugas', $id)->where('mahasiswa', $nim)->exists();
      
      ?>
      
      <h4 class="fw-bold">{{$tugas['nama_tugas']}}</h4>
      <p class="my-0">{{$tugas['deskripsi']}}</p>

      <div class="my-3 pe-5">

        @include('components.createjawaban')

        <h4 class="fw-bold">Submission Status</h4>

        @if ($checkJawaban)
          <table class="table table-striped table-hover">
            <tbody>
              <tr>
                <td class="" width="20%">Submission Status</td>
                @if ($jawaban->submited_status)
                  <td class="" style="background-color: #cfefcf">Graded</td>
                @else
                  <td class="" style="background-color: #efd4cf">Submited for Grading</td>
                @endif
                
              </tr>

              <tr>
                <td class="" width="20%">Grading Status</td>
                @if ($jawaban->submited_status)
                  <td class="bg-secondary bg-opacity-10">{{$jawaban->nilai}}</td>
                @else
                  <td class="bg-secondary bg-opacity-10">Not Graded</td>
                @endif
              </tr>

              <tr>
                <td class="" width="20%">Due Date</td>
                <td class="bg-secondary bg-opacity-10">{{date('d M Y', strtotime($tugas->deadline_tugas))}}</td>
              </tr>

              <tr>
                <td class="" width="20%">Last Modified</td>
                <td class="bg-secondary bg-opacity-10">{{date('d M Y', strtotime($jawaban->updated_at))}}</td>
              </tr>

              <tr>
                <td class="" width="20%">File Submission</td>
                <td class="bg-secondary bg-opacity-10"><a href="{{$jawaban->file}}" class="text-success text-decoration-none" download>Click Here to Download</a></td>
              </tr>

              <tr>
                <td class="" width="20%">Teacher Comments</td>
                <td class="bg-secondary bg-opacity-10">{{$jawaban->komentar}}</td>
              </tr>
            </tbody>
          </table>

          <form action="/user/jawaban-delete/{{$jawaban->jawaban_id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger d-block mx-auto" type="submit">Delete Submission</button>
          </form>

        @else

          <table class="table table-striped table-hover">
            <tbody>
              <tr>
                <td class="" width="20%">Submission Status</td>
                  <td class="">No Attempt</td>
              </tr>
              <tr>
                <td class="" width="20%">Grading Status</td>
                  <td class="bg-secondary bg-opacity-10">Not Graded</td>
              </tr>
              <tr>
                <td class="" width="20%">Due Date</td>
                <td class="bg-secondary bg-opacity-10">{{date('d M Y', strtotime($tugas->deadline_tugas))}}</td>
              </tr>
              <tr>
                <td class="" width="20%">File Submission</td>
                <td class="bg-secondary bg-opacity-10">Nothing Submited</td>
              </tr>
            </tbody>
          </table>

          <button class="btn btn-primary d-block mx-auto" data-bs-toggle="modal" data-bs-target="#addJawaban">add sumbission</button>
        @endif

        

        
      </div>

      {{-- <div class="my-3">
        
      </div>  --}}

      
      <div class="container my-4 bg-light py-3">
        <div class="mx-3 mt-2">
         {{--  <p><b><h4>{{$tugas['nama_tugas']}}</h4></b></p>
          <p>{{$tugas['deskripsi']  }}</p> --}}
          
        </div>
      </div>

    @endif

  </div>

@endsection