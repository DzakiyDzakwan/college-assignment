@extends('main.usertemplate')

@section('title')
<title>Site Home</title>
@endsection

@section('content')

    <div class="container my-4 bg-light py-3">
        <div class="text-center my-3 fw-bold pb-2 fs-3">Access Your courses by faculty</div>

        <div class="row px-3 mt-2 mb-3 justify-content-center text-center">
            <!-- medicine -->
            
            @foreach ($fakultas as $fklts)
            <div class="col mx-3 pb-4" >  
                <div class="card rounded-3 " style="height: 10rem; width: 23rem">
                    <div class="card-body fw-bold pb-2 fs-5 px-3 ">{{$fklts->nama_fakultas}}</div>
                    <div class="card-footer bg-transparent border-0 mb-2 fw-light ">
                        <a href="/user/pilihanjurusan/{{$fklts->kode_fakultas}}" class="text-decoration-none link-secondary">SEE ALL COURSES</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- fasilkom ti -->
            {{-- <div class="col mx-3 pb-4">
                <div class="card rounded-3" style="height: 10rem; width: 23rem">
                    <div class="card-body fw-bold pb-2 fs-5 px-3">Faculty of Computer Science and Information Technology</div>
                    <div class="card-footer bg-transparent border-0 mb-2 fw-light">
                        <a href="/user/pilihanjurusan" class="text-decoration-none link-secondary">SEE ALL COURSES</a>
                    </div>
                </div>
            </div>
            <!-- engineering -->
            <div class="col mx-3 pb-4">
                <div class="card rounded-3" style="height: 10rem; width: 23rem">
                    <div class="card-body fw-bold pb-2 fs-5 px-3">Faculty of Engineering</div>
                    <div class="card-footer bg-transparent border-0 mb-2 fw-light">
                        <a href="#" class="text-decoration-none link-secondary">SEE ALL COURSES</a>
                    </div>
                </div>
            </div> --}}

        

        </div>


    </div>

@endsection