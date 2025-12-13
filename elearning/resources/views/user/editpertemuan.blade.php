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
          <h2 class="text-success">Edit Pertemuan</h2>

                <div class="card card-body border-0">

                  @foreach($pertemuan as $prtm)
                    <form action="/user/matakuliah/updatePertemuan/{{$prtm->pertemuan_id}}" method="POST" class=" p-4">
                        @csrf
                        @method('PUT')
                        
                        <!-- Nama Pertemuan-->
                        <div class="row mb-1">
                            <div class=" col-3 mb-3">
                                <label for="nama_pertemuan" class="form-label">Nama Pertemuan</label>
                            </div>
                            <div class="col">
                                <input type="text" class="col form-control" id="nama_pertemuan" name="nama_pertemuan" value="{{$prtm->nama_pertemuan}}">
                            </div>
                        </div>
    
                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <div class=" col-3 mb-5">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                            </div>
                            <div class="col">
                                <textarea type="text"  rows="5" class="col form-control" id="deskripsi" name="deskripsi">{{$prtm->deskripsi}}</textarea>
                            </div>
                        </div>

                      
                        {{-- Tanggal Pertemuan--}}
                        <div class="row">
                            <div class=" col-3 mb-3">
                                <label for="tanggal_pertemuan" class="form-label">Tanggal Pertemuan</label>
                            </div>
                            <div class="col">
                                <input type="date" class="col form-control" id="tanggal_pertemuan" name="tanggal_pertemuan" value="{{$prtm->tanggal_pertemuan}}">
                            </div>
                        </div>
    
                        <!-- button -->
                        <div class="text-end px-3 pb-2 mx-4">
                            <button type="submit" class="btn btn-success ">Update</button>
                            <a href="/user/matakuliah/{{$prtm->kelas_id}}"><button type="button" class="btn btn-secondary ">Kembali</button></a>
                        </div>
                        
                    </form>
                  @endforeach
                </div>       

        </div>
        <!-- end container edit -->

    </div>
@endsection