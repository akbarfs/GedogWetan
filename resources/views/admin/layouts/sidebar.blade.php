<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="public/assets/img/malang_logo.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="" class="simple-text logo-normal">
          Admin
          <!-- <div class="logo-image-big">
            <img src="public/assets/img/malang_logo.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="{{url('/profil')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
                <a class="dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown">
                  <i class="nc-icon nc-bullet-list-67"></i>
                  <span>Data Master</span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('/kategori')}}">Kategori</a>
                  <a class="dropdown-item" href="{{url('/penulis')}}">Penulis</a>
                  <a class="dropdown-item" href="{{url('/tag')}}">Tag</a>
                  <a class="dropdown-item" href="{{url('/jabatan')}}">Jabatan</a>
                  <a class="dropdown-item" href="{{url('/organisasi')}}">Organisasi</a>                  
                </div>
              </li> 
          <li>
            <a href="{{url('/berita')}}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Berita</p>
            </a>
          </li>
          <li>
            <a href="{{url('/pengumuman')}}">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li>
            <a href="{{url('/potensi')}}">
              <i class="nc-icon nc-image"></i>
              <p>Potensi</p>
            </a>
          </li>
          <li>
            <a href="{{url('/slide')}}">
              <i class="nc-icon nc-image"></i>
              <p>Slide</p>
            </a>
          </li>
          <li>
            <a href="{{url('/konten')}}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Konten</p>
            </a>
          </li>
          <li>
            <a href="{{url('/pengurus')}}">
              <i class="nc-icon nc-circle-10"></i>
              <p>Pengurus</p>
            </a>
          </li>
          <li>
            <a href="{{url('/kontak')}}">
              <i class="nc-icon nc-email-85"></i>
              <p>Kontak</p>
            </a>
          </li>
          @if(Auth::user()->level=="Superadmin")
          <li>
            <a href="{{url('/user')}}">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>Manajemen User</p>
            </a>
          </li>
          @endif
          <li class="active-pro">
            <a onclick="event.preventDefault();
              document.getElementById('logout').submit()">
            <button style="margin:20px;" class="btn btn-warning">
              <p>Log Out</p>
            <form action="{{ url('/logout')}}" method="post" id="logout" style="display:none;">
            @csrf
            </form>
            </a>
            </button>
          </li>
        </ul>
      </div>
    </div>
