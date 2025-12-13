@extends('main.admintemplate')
    <!-- CSS -->
    @section('css')
    <link rel="stylesheet" href="{{asset('css/user.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}" />
    @endsection

    @section('title')
    <title>User</title>
    @endsection

    <!-- MAIN-BAR -->

    <!-- Modal Mahasiswa -->
    @include('components.mahasiswamodal')
    <!-- MAHASISWA MODAL END -->

    <!-- DOSEN MODAL -->
    @include('components.dosenmodal')
    <!-- DOSEN MODAL END -->

    <!-- MAIN BAR START -->
    @section('content')
    <div class="user-container p-3 m-3">
      <h3>Data User</h3>

      <!-- SEARCH -->
      <div class="search-container my-3">
        <input type="text" name="" id="" placeholder="Search Here" />

        <div class="dropdown">
          <button
            class="btn btn-outline-dark"
            type="button"
          >
            Filter
          </button>
        </div>
      </div>
      <!-- SEARCH END -->

      <!-- TABLE START -->
      <div class="tablcont">
        <table class="table">
          <thead>
            <tr>
              <th class="d-none"></th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor Telepon</th>
              <th>Agama</th>
              <th>Jenis Kelamin</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($users as $user)
            <tr>
              <td class="nikUser">{{$user['NIK']}}</td>
              <td>{{$user['first_name']}} {{$user['last_name']}}</td>
              <td>{{$user['email']}}</td>
              <td>{{$user['nomor_hp']}}</td>
              <td>{{$user['agama']}}</td>
              <td>{{$user['jenis_kelamin']}}</td>
              <td class="statusUser">{{$user['status']}}</td>
              <td class="d-flex justify-content-center">
                @if ($user['status'] === 'mahasiswa')
                <div class="btn btn-primary daftarBtn" data-bs-toggle="modal" data-bs-target="#mhsModal">
                  <i class="bx bx-book-add"></i>
                </div>
                @else
                <div class="btn btn-primary daftarBtn" data-bs-toggle="modal" data-bs-target="#dosenModal">
                  <i class="bx bx-book-add"></i>
                </div>
                @endif
                <form action="/admin/user/delete-user/{{$user['NIK']}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">
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

      
      <!-- pagination START -->
        <div class="pagination-container">
          {{$users->links()}}
        </div>
      {{-- @include('components.pagination') --}}
      <!-- PAGINATION END -->
      @include('sweetalert::alert')
    </div>
    @endsection
    <!-- MAIN-BAR END -->

    <!-- JQUERY -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <!-- BOOTSTRAP -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <!-- FONT AWESOME -->
    <!-- <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script> -->
    <!-- VANILLA-JS -->
    <script src="js/sidebar.js"></script>
    @section('js')
    <!-- CHART JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
      integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="{{asset('js/user.js')}}"></script>
    @endsection
