 <!-- Navbar  -->
 <nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid d-flex">
      <!-- button sidebar -->
      <button
        class="navbar-toggler mx-3"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#sidebar"
        aria-expanded="false"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- logo usu-->
      <a class="navbar-brand me-auto d-none d-lg-block" href="#"
        ><img
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Logo_of_North_Sumatra_University.svg/1200px-Logo_of_North_Sumatra_University.svg.png"
          alt=""
          width="40px"
        />
        Elearning USU
      </a>

      <!-- display jam -->
      <i class="far fa-clock me-2 d-none d-sm-block"></i>
      <div class="clock me-auto d-none d-sm-block">
        <div class="display"></div>
      </div>

      <!-- notif dan message -->
      <div class="d-flex">
        <a class="nav-link link-secondary" id="notif" href="#"><i class="fa-solid fa-bell"></i></a>
        <a class="nav-link link-secondary" id="message" href="#"><i class="fa-solid fa-comment"></i></a>
      </div>

      <!-- Navbar Menu -->
      <div class="btn-group">
        <button
          type="button"
          class="btn btn-lg-md bg-secondary bg-opacity-10 rounded-pill border-light text-success d-flex pb-0"
          id="dropdownMenu"
          data-bs-toggle="dropdown"
          aria-expanded="true"
        >
          
          <p class="px-2 d-none d-sm-block">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
        
          {{-- <p class="px-2 d-none d-sm-block">{{$dosen['first_name']}} {{$dosen['last_name']}} {{$dosen['NIM']}}</p> --}}
    
          <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle float-end" width="40px">
        </button>
        <ul
          class="dropdown-menu dropdown-menu-lg-end border-0 shadow mt-3"
          aria-labelledby="dropdownMenu"
        >
          <li>
            <a class="btn menu-nav dropdown-item text-decoration-none link-dark py-2 px-5" href="/dashboard"><i class="fas fa-tachometer-fast"></i> Dashboard</a>

          </li>
          <li>
              <a class="btn menu-nav dropdown-item text-decoration-none link-dark py-2 px-5" href="/user/profile"><i class="fa-solid fa-user"></i> Profile</a>
          </li>
          <hr>
          <li>
              <form action="/logout" method="POST">
                @csrf
                <button class="btn container-fluid" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Log Out</button>
              </form>
          </li>
        </ul>
      </div>
      <!-- End Navbar Menu-->
    </div>
  </nav>
  <!-- End Navbar -->