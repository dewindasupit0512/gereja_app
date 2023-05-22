<nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img src="{{ asset('img\progremmer.png') }}" alt="person" class="img-fluid rounded-circle">
          <h2 class="h5">Admin</h2><span>GPDI APOSTOLOS</span>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <div class="sidenav-header-logo"><a href="master.php" class="brand-small text-center"> <strong>G</strong><strong class="text-primary">K</strong></a></div>
      </div>
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <h5 class="sidenav-heading">Panel</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">                  
          <li><a href="{{ route('admin.home') }}"> <i class="icon-home"></i>HOME</a></li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Master</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="{{ route('admin.tambah-anggota') }}">Tambah Anggota</a></li>
              <li><a href="{{ route('admin.tambah-peran') }}">Tambah Peran</a></li>
              <li><a href="{{ route('admin.jemaat') }}">Data Jemaat</a></li>
              <li><a href="{{ route('admin.atur-ibadah') }}">Atur Ibadah</a></li>
              <li><a href="{{ route('admin.atur-jadwal') }}">Atur Jadwal</a></li>
              {{-- <li><a href="#">Atur Jadwal</a></li> --}}
            </ul>
          </li>
      </div>
      <div class="admin-menu">
        <h5 class="sidenav-heading">Pesan</h5>
        <ul id="side-admin-menu" class="side-menu list-unstyled"> 
          <li> <a href="{{ route('admin.pesan') }}"> <i class="icon-screen"> </i>Pesan Masuk</a></li>
        </ul>
      </div>
    </div>
</nav>