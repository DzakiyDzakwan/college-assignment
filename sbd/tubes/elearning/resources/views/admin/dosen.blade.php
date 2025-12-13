@extends('main.admintemplate')

@section('css')
<link rel="stylesheet" href="{{asset('css/mahasiswa.css')}}" />
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}" />
@endsection

@section('title')
<title>Dosen</title>
@endsection

@section('content')
{{-- <div class="container chart-container my-3 py-3">
  <h3>Dosen</h3>

  <div class="chart">
    <canvas class="my-3" id="dosenChart"></canvas>
  </div>
</div> --}}

<div class="container table-container my-3 py-3">
  <!-- HEADER -->
  <div class="header-container">
    <h3>Table</h3>
    <!-- 
    <div
      class="me-3 create-btn btn btn-outline-success d-flex align-items-center"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
    >
      Enroll<i class="bx bx-plus-circle"></i>
    </div> -->
  </div>
  <!--  HEADER END -->

  <!-- SEARCH -->
  <div class="search-container my-3">
    <input type="text" name="" id="" placeholder="Search Here" />

    <div class="dropdown">
      <button
        class="btn btn-outline-dark dropdown-toggle"
        type="button"
        id="dropdownMenuButton1"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
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
  <div class="tablcont">
    <table class="table">
      <thead>
        <tr>
          <th>NIP</th>
          <th>Nama</th>
          <th>NIDN</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dosens as $dosen)
        <tr>
          <td>{{$dosen['NIP']}}</td>
          <td>{{$dosen['first_name'] }} {{$dosen['last_name']}}</td>
          <td>{{$dosen['NIDN']}}</td>
          <td>{{$dosen['status']}}</td>
          <td>
            <!-- <div class="btn btn-primary">
              <i class="bx bx-book-add"></i>
            </div> -->
              <form action="/admin/dosen/delete-dosen/{{$dosen['NIP']}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                  <i class="bx bx-trash"></i>
                </button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- TABLE END -->

  <div class="pagination-container">
    {{-- <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav> --}}
    {{$dosens->links()}}
  </div>

  {{-- @include('sweetalert::alert') --}}
  
</div>
@endsection

@section('js')
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script>
const labels = [2018, 2019, 2020, 2021];

const dataConfig = {
  labels: labels,
  datasets: [
    {
      type: "bar",
      label: "AKtif",
      data: [300, 200, 100, 300],
      backgroundColor: "rgb(51, 126, 59, 100%)",
      fill: true,
    },
    {
      type: "bar",
      label: "Tidak Aktif",
      data: [300, 200, 100, 300],
      backgroundColor: "#EF0F0F",
      fill: true,
    },
    {
      type: "bar",
      label: "Male",
      data: [300, 200, 100, 300],
      backgroundColor: "#5A8EF4",
      fill: true,
    },
    {
      type: "bar",
      label: "Female",
      data: [300, 200, 100, 300],
      backgroundColor: "#EFA2E3",
      fill: true,
    },
  ],
};

const config = {
  type: "bar",
  data: dataConfig,
};

const chart = document.getElementById("dosenChart").getContext("2d");

const myChart = new Chart(chart, config);
</script>
@endsection