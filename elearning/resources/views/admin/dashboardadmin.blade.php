@extends('main.admintemplate')
    @section('css')
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    @endsection

    @section('title')
    <title>Dashboard</title>
    @endsection

    @section('content')
     <!-- DATA USER START -->
      {{-- <div class="container data-user my-3 py-3">
          <h3>Data User</h3>

          <div class="chart">
            <canvas class="my-3" id="userChart"></canvas>
          </div>

          <a href="/admin/user"><div class="mx-auto detail-btn btn btn-outline-success">Detail</div></a>
      </div> --}}
      <!--  DATA USER END -->

      <!-- CARD SECTION START -->
     {{--  <div class="container card-section my-3">
        <div class="row">
          <!-- DATA-MAHASISWA START -->
          <div class="col-lg-6 data-container py-3">
            <h3>Data Mahasiswa</h3>

            <div class="chart">
              <canvas class="my-3" id="mahasiswaChart"></canvas>
            </div>

            <a href="/admin/mahasiswa"><div class="mx-auto detail-btn btn btn-outline-success">Detail</div></a>
          </div>
          <!-- DATA MAHASISWA END -->

          <!-- DATA DOSEN START -->
          <div class="col-lg-6 data data-container py-3">
            <h3>Data Dosen</h3>

            <div class="chart">
              <canvas class="my-3" id="dosenChart"></canvas>
            </div>

            <a href="/admin/dosen"><div class="mx-auto detail-btn btn btn-outline-success">Detail</div></a>
          </div>
          <!-- DATA DOSEN END -->
        </div>
      </div> --}}
      <!-- CARD SECTION END -->

      <div class="container detail-container my-3 py-3">
        <h3>All data</h3>

        <table class="table">
          <tr>
            <td>Fakultas</td>
            <td>{{$fakultas}}</td>
            <td>Jurusan</td>
            <td>{{$jurusan}}</td>
          </tr>
          <tr>
            <td>Mata-Kuliah</td>
            <td>{{$matkul}}</td>
            <td>User</td>
            <td>{{$user}}</td>
          </tr>
          <tr>
            <td>Mahasiswa</td>
            <td>{{$mahasiswa}}</td>
            <td>Dosen</td>
            <td>{{$dosen}}</td>
          </tr>
        </table>
      </div>
    @endsection

    @section('js')
    <script src="js/sidebar.js"></script>
    <!-- CHART JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
      integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script>
      const labels = [2018, 2019, 2020, 2021];

      const data1 = {
        labels: labels,
        datasets: [
          {
            label: "Total User",
            data: [500, 985, 1250, 1500],
            fill: false,
            borderColor: "rgb(52, 127, 60, 40%)",
            pointBorderColor: "rgb(51, 126, 59, 100%)",
            pointBorderWidth: 5,
            tension: 0.1,
          },
          {
            label: "Mahasiswa",
            data: [400, 785, 950, 1100],
            borderColor: "rgb(28, 136, 237, 40%)",
            pointBorderColor: "rgb(28, 136, 237, 100%)",
            pointBorderWidth: 5,
            tension: 0.1,
          },
          {
            label: "Dosen",
            data: [100, 200, 300, 400],
            borderColor: "rgb( 0, 0, 0,40%)",
            pointBorderColor: "rgb(0, 0, 0, 100%)",
            pointBorderWidth: 5,
            tension: 0.1,
          },
        ],
      };

      const data2 = {
        labels: labels,
        datasets: [
          {
            type: "bar",
            label: "Aktif",
            data: [300, 200, 100, 300],
            fill: true,
            backgroundColor: "rgb(51, 126, 59, 100%)",
          },
          {
            type: "bar",
            label: "Tidak Aktif",
            data: [300, 200, 100, 300],
            fill: true,
            backgroundColor: "#EF0F0F",
            tension: 0.1,
          },
        ],
      };

      const data3 = {
        labels: labels,
        datasets: [
          {
            type: "bar",
            label: "Aktif",
            data: [300, 200, 100, 300],
            fill: true,
            backgroundColor: "rgb(51, 126, 59, 100%)",
          },
          {
            type: "bar",
            label: "Tidak Aktif",
            data: [300, 200, 100, 300],
            fill: true,
            backgroundColor: "#EF0F0F",
            tension: 0.1,
          },
        ],
      };

      const config1 = {
        type: "line",
        data: data1,
      };

      const config2 = {
        type: "bar",
        data: data2,
      };

      const config3 = {
        type: "bar",
        data: data3,
      };

      const chartUser = document.getElementById("userChart").getContext("2d");
      const chartSiswa = document.getElementById("mahasiswaChart").getContext("2d");
      const chartDosen = document.getElementById("dosenChart").getContext("2d");

      const myChart = new Chart(chartUser, config1);
      const myChart2 = new Chart(chartSiswa, config2);
      const myChart3 = new Chart(chartDosen, config3);
    </script>
    @endsection
