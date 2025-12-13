@extends('main.admintemplate')
    @section('css')
    <link rel="stylesheet" href="/css/mahasiswa.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    @endsection

    @section('title')
    <title>Mahasiswa</title>
    @endsection


    @include('components.aslabmodal')

    @include('components.enrollaslabmodal')


    @section('content')
    
    {{-- <div class="container chart-container my-3 py-3">

      <h3>Mahasiswa</h3>

      <div class="chart">
          <canvas class="my-3" id="studentChart"></canvas>
      </div>

  </div> --}}

  <div class="container table-container my-3 py-3">

      <!-- HEADER -->
      <div class="header-container">
          <h3>Table</h3>
         <div class="me-3 create-btn btn btn-outline-success d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#aslabTable">Aslab<i class='bx bx-desktop'></i></div>

      </div>
     <!--  HEADER END -->

     <!-- SEARCH -->
      <div class="search-container my-3">
          <input type="text" name="" id="" placeholder="Search Here">

          <div class="dropdown">
              <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>

            </div>

      </div>
      <!-- SEARCH END -->

      <!-- TABLE START -->
      <div class=" tablcont">
          <table class="table">
              <thead>
                  <tr>
                      <th>NIM</th>
                      <th>NISN</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Semester</th>
                      <th>Angkatan</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($mahasiswa as $mhs)
                  <tr>
                    <td>{{$mhs['NIM']}}</td>
                    <td>{{$mhs['NISN']}}</td>
                    <td>{{$mhs['first_name']}} {{$mhs['last_name']}}<span class="badge bg-light text-danger"><i class='fs-6 bx bx-desktop'></i></box-icon></span></td>
                    <td>{{$mhs['nama_jurusan']}}</td>
                    <td>{{$mhs['semester']}}</td>
                    <td>{{$mhs['angkatan']}}</td>
                    <td>{{$mhs['status']}}</td>
                    <td class="d-flex align-items-center justify-content-center">
                        <form action="/admin/mahasiswa/add-aslab/{{$mhs['NIM']}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class='bx bx-book-add'></i>
                            </button>
                        </form>
                        <form action="/admin/mahasiswa/delete-mahasiswa/{{$mhs['NIM']}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bx-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
                  @endforeach
                  
              </tbody>
          </table>
      </div>
      <!-- TABLE END -->


      {{-- @include('components.pagination') --}}
        <div class="pagination-container">
            {{$mahasiswa->links()}}
        </div>
      
        {{-- @include('sweetalert::alert') --}}
  </div>
  
    @endsection

    @section('js')
    <script src="{{asset('js/aslab.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

    const labels = [2018, 2019, 2020, 2021];

    const dataConfig = {
        labels : labels,
        datasets : [
            {
                type : "bar",
                label : "AKtif",
                data : [300, 200, 100, 300],
                backgroundColor : "rgb(51, 126, 59, 100%)",
                fill : true
            },
            {
                type : "bar",
                label : "Tidak Aktif",
                data : [300, 200, 100, 300],
                backgroundColor : "#EF0F0F",
                fill : true
            },
            {
                type : "bar",
                label : "Male",
                data : [300, 200, 100, 300],
                backgroundColor : "#5A8EF4",
                fill : true
            },
            {
                type : "bar",
                label : "Female",
                data : [300, 200, 100, 300],
                backgroundColor : "#EFA2E3",
                fill : true
            },
        ]
    }

    const config = {
        type : "bar",
        data : dataConfig
    }

    const chart = document.getElementById('studentChart').getContext('2d');
    
    const myChart = new Chart(chart, config);

    </script>
    @endsection