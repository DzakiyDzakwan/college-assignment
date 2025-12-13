@extends('main.usertemplate')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
        <!-- Dashboard -->
          <div class="container pt-3">
            
              <!-- Recently accessed courses -->
              <div class="col py-5">
                {{-- <div class="card border-0">
                  <div class="header-card pb-5">
                    <h6 class="card-title position-absolute top-0 start-0 px-3 mt-3">
                      <b>Recently accessed courses</b>
                    </h6>

                    <!-- pagination -->
                    <nav class="position-absolute top-0 end-0 mt-3 px-3" aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link text-success" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item">
                          <a class="page-link text-success" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>

                  <!-- isi card -->
                  <div class="card-body">
                    <a href="#">
                      <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh1sGpm9gzHAPcjot_xUynBmxYUvSoAyyzWw&usqp=CAU"
                        height="120px"
                        class="card-img-top rounded-3"
                        alt="..."
                      />
                    </a>
                    <p class="card-text mt-3 text-muted"></p>
                    <p><a class="card-link link-dark text-decoration-none" href="#">[TIF1205] Sistem Basis Data - Kelas C</a></p>
                  </div>
                </div> --}}
              </div>
          
              <!-- End Recently accessed courses -->

              <!-- course overview -->
              <div class="col pb-5">
                <div class="card border-0 pb-5">
                  <div class="header-card pb-5">
                    <h6 class="card-title position-absolute top-0 start-0 px-3 mt-3"><b>Course overview</b></h6>
                  </div>

                  <!-- Filter button -->
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-secondary dropdown-toggle mx-3 mb-3"
                      type="button"
                      id="dropdownMenuButton2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      All
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>

                    <button
                      class="btn btn-outline-secondary dropdown-toggle me-3 float-end"
                      type="button"
                      id="dropdownMenuButton2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Card
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>

                    <button
                      class="btn btn-outline-secondary dropdown-toggle mx-3 float-end"
                      type="button"
                      id="dropdownMenuButton2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Last accessed
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>

                  <!-- Courses-->
                  <div class="row row-cols-1 row-cols-md-2 px-4 g-4">
                    @foreach($enrollmatkul as $matkul)
                    <div class="col">
                      <div class="card border-0">
                        <div class="card-body">
                          <a href="#">
                            <img
                              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh1sGpm9gzHAPcjot_xUynBmxYUvSoAyyzWw&usqp=CAU"
                              height="120px"
                              class="card-img-top rounded-3"
                              alt="..."
                            />
                          </a>
                          {{-- <p class="card-text mt-3 text-muted">Genap 2021/2022</p> --}}
                          <br><br>
                          <p>
                            <a class="card-link link-dark text-decoration-none pb-5" href="/user/matakuliah/{{$matkul['kelas_id']}}">
                              [{{$matkul['kode_mata_kuliah']}}] {{$matkul['nama_matkul']}} - {{$matkul['kelas']}}
                            </a>
                          </p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    
                  </div>
                  <!-- End Courses-->
                </div>
              </div>
              <!-- End Course overview-->
            
          </div>
        <!-- End dashboard -->
@endsection
