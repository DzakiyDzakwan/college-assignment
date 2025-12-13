<!-- SIDEBAR START -->
<div class="nav-container d-flex">
      <div class="navigation-float py-3">
        <!-- LOGO CONTAINER START -->
        <div class="logo-container">
          <img src="{{asset('img/usu.png')}}" alt="usu_logo" />
          <h4>Dashboard</h4>
        </div>
        <!-- LOGO CONTAINER END -->

        <!-- MENU CONTAINER START -->
        <div class="menu-container py-3">
          <ul>
            <a href="/admin" class="menu-item">
              <li>
                @if($page === "dashboard")
                <i class="bx bxs-dashboard active"></i>
                @else
                <i class="bx bxs-dashboard"></i>
                @endif
                <p>Dashboard</p>
              </li>
            </a>

            <a href="/admin/user" class="menu-item">
              <li>
                @if($page === 'user')
                <i class="bx bx-user active"></i>
                @else
                <i class="bx bx-user"></i>
                @endif
                <p>User</p>
              </li>
            </a>

            <a href="/admin/mahasiswa" class="menu-item">
              <li>
                @if($page === 'mahasiswa')
                <i class="bx bxs-graduation active"></i>
                @else
                <i class="bx bxs-graduation"></i>
                @endif
                <p>Mahasiswa</p>
              </li>
            </a>

            <a href="/admin/dosen" class="menu-item">
              <li>
                @if($page === 'dosen')
                <i class="bx bxs-chalkboard active"></i>
                @else
                <i class="bx bxs-chalkboard"></i>
                @endif
                <p>Dosen</p>
              </li>
            </a>

            <a href="/admin/faculty" class="menu-item">
              <li>
                @if($page === 'faculty')
                <i class="bx bxs-school active"></i>
                @else 
                <i class="bx bxs-school"></i>
                @endif
                <p>Faculty</p>
              </li>
            </a>
          </ul>
        </div>
        <!-- MENU CONTAINER END -->

        <!-- Profile COntainer START -->
        <div class="profile-container">
          <img src="{{asset('img/avatar1.png')}}" alt="profil" />
          <div class="popover">
            <ul>
              <a href="">
                <li>Setting</li>
              </a>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn container-fluid">
                  <li>Logout</li>
                </button>
              </form>
            </ul>
          </div>
        </div>
        <!-- PROFILE CONTAINER END -->
      </div>
    </div>
    <!-- SIDEBAR END -->