@extends('main.usertemplate')

@section('title')
<title>Edit Pertemuan</title>
@endsection

@section('content')

    <div class="container my-2 py-5 ">

    @if ($message = Session::get('success'))
	  <div class="alert alert-success alert-block">	
		  <strong>{{ $message }}</strong>
	  </div>
	@endif

        <!-- container edit -->
        <div class="container mb-5 bg-light py-3">
          <h2 class="text-success">Edit </h2>
                <div class="card card-body border-0">
                    @foreach($materis as $materi)
                    <form action="/user/matakuliah/updatemateri/{{$materi->materi_id}}" method="POST" class=" p-4">
                        @csrf
                        @method('PUT')
                        <!-- Nama Materi-->
                        <div class="row mb-1">
                            <div class=" col-3 mb-3">
                                <label for="nama_materi" class="form-label">Nama </label>
                            </div>
                            <div class="col">
                                <input type="text" class="col form-control" id="nama_materi" name="nama_materi" value="{{$materi->nama_materi}}">
                            </div>
                        </div>
    
                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <div class=" col-3 mb-5">
                                <label for="deskripsi" class="form-label">Link </label>
                            </div>
                            <div class="col">
                                <textarea type="text"  rows="5" class="col form-control" id="deskripsi" name="deskripsi" value="">{{$materi->deskripsi}}</textarea>
                            </div>
                        </div>

                         <!-- button -->
                         <div class="text-end px-3 pb-2 mx-4">
                            <button type="submit" class="btn btn-success ">Simpan</button>
                            <a href="/user/matakuliah/{{$materi->kelas_id}}"><button type="button" class="btn btn-secondary ">Kembali</button></a>
                        </div>
                    </form>
                    @endforeach
                    
                </div>       
        </div>
        <!-- end container edit -->

    </div>
@endsection