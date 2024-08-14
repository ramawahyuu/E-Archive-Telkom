<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- base:css -->
  <link rel="stylesheet" href="../template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.kompasiana.com%2Fevameliafafa%2F55ec2784707a6117081e4cc8%2Fbuku-vs-pengalaman&psig=AOvVaw1iiNNw__mWaRytO8DYYtl7&ust=1719029585159000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCNDInbDq64YDFQAAAAAdAAAAABAE" />
</head>
<body>
  <div class="container-scroller d-flex">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
      </div>
    </div>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <div class="img-profile" style="width: 100%; height: auto;">
            <img src="../template/temp/assets/img/logo12.png" alt="Image" class="img-fluid right-align" style="width: 100%; height: auto;">
          </div>
          <div class="nama-profile">
            <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Navigasi</h4>
          </div>
        </li>
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'mahasiswa'|| Auth::user()->role == 'himpunan'|| Auth::user()->role == 'user' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
          <a class="nav-link" href="{{ route('admin') }}">
            <i class="mdi mdi-home menu-icon" style="color: #5E5E5E"></i>
            <span class="menu-title">Dashboard</span> 
          </a>
        </li>
      @endif
      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
      <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-pkm" aria-expanded="false" aria-controls="ui-pkm">
        <i class="mdi mdi-trophy menu-icon" style="color: #5E5E5E"></i>
        <span class="menu-title" style="color:#5E5E5E;">Perlombaan PKM</span>
        <i class="menu-arrow mdi mdi-chevron-right"></i>
      </a>
      <div class="collapse" id="ui-pkm">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('informasi') }}" style="color: #5E5E5E;">Informasi Pelaksanaan <br> Perlombaan</a></li>
          <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('tasks.index') }}" style="color: #5E5E5E;">Proses Pelaksaanaan <br> Perlombaan</a></li>
          <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('upload_proposal.index') }}" style="color: #5E5E5E;">Pengumpulan Proposal</a></li>
          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan' || Auth::user()->role == 'mahasiswa')
          <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;">
            <a class="nav-link" href="{{ route('dosen.index') }}" style="color: #5E5E5E;">Data Dosen</a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;">
            <a class="nav-link" href="{{ route('mahasiswa.index') }}" style="color: #5E5E5E;">Data Mahasiswa</a>
        </li>
        @endif
          <li class="nav-item" style="padding-right: 200px;"> <a class="nav-link" href="{{ route('faqs.index') }}" style="color: #5E5E5E;">Frequently Asked Question</a></li>
        </ul>
      </div>
    </li>
     @if( Auth::user()->role == 'mahasiswa')
             <li>
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Lainnya</h4>  
    </li>
     
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
 
          <a class="nav-link" href="https://drive.google.com/drive/folders/1xdPuTS3Ay7W-wDXSkLhnZbNaG32PmQNR?usp=sharing">
            <i class="mdi mdi-book menu-icon" style="color: #5E5E5E"></i>
            <span class="menu-title">Panduan</span>
          </a>
        </li>
      @endif
       @if(Auth::user()->role == 'mahasiswa')
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
 
          <a class="nav-link" href="http://linktr.ee/fri_heitz" target="_blank">
            <i style="color: #5E5E5E"></i>
            <span class="menu-title">Layanan Administrasi</span>
          </a>
        </li>
      @endif
    @endif
    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'himpunan' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
    <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-himpunan" aria-expanded="false" aria-controls="ui-himpunan">
      <i class="mdi mdi-account-group menu-icon" style="color: #5E5E5E"></i>
      <span class="menu-title" style="color:#5E5E5E;">Himpunan</span>
      <i class="menu-arrow mdi mdi-chevron-right"></i>
    </a>
    <div class="collapse" id="ui-himpunan">
      <ul class="nav flex-column sub-menu">
         <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('himpunan') }}" style="color: #5E5E5E;">Informasi Program Kerja</a></li>
        <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('himpunantasks') }}" style="color: #5E5E5E;">Proses Pelaksanaan <br>Program kerja</a></li>
          <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('upload_proposal_himpunan.index') }}" style="color: #5E5E5E;">Proposal Program Kerja</a></li>
  </li>
  @endif
      </ul>
    </div>
     @if(Auth::user()->role == 'himpunan')
     <li>
   <div class="nama-profile">
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Lainnya </h4>
        
    </li>

   
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
 
          <a class="nav-link" href="https://drive.google.com/drive/folders/1xdPuTS3Ay7W-wDXSkLhnZbNaG32PmQNR?usp=sharing">
            <i class="mdi mdi-book menu-icon" style="color: #5E5E5E"></i>
            <span class="menu-title">Panduan</span>
          </a>
        </li>
      @endif
       @if(Auth::user()->role == 'himpunan')
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
 
          <a class="nav-link" href="http://linktr.ee/fri_heitz" target="_blank">
            <i style="color: #5E5E5E"></i>
            <span class="menu-title">Layanan Administrasi</span>
          </a>
        </li>
      @endif

    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
    <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-mahasiswa" aria-expanded="false" aria-controls="ui-mahasiswa">
      <i class="mdi mdi-account-group menu-icon" style="color: #5E5E5E"></i>
      <span class="menu-title" style="color:#5E5E5E;">Data Mahasiswa</span>
      <i class="menu-arrow mdi mdi-chevron-right"></i>
    </a>
    <div class="collapse" id="ui-mahasiswa">
      <ul class="nav flex-column sub-menu">
         <li class="nav-item" style="border-bottom: 1px solid #ccc; padding-right: 200px;"> <a class="nav-link" href="{{ route('prestasi.index') }}" style="color: #5E5E5E;">Data Mahasiswa</a></li>

  </li>
  @endif
      </ul>
    </div>
           @if(Auth::user()->role == 'admin' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
    <li>

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" style="margin-left:10px">Lainnya </h4>
          
        
    </li> 

    
       
      @endif
       @if(Auth::user()->role == 'admin' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
 
          <a class="nav-link" href="http://linktr.ee/fri_heitz">
            <i style="color: #5E5E5E"></i>
            <span class="menu-title">Layanan Administrasi</span>
          </a>
        </li>
        <li class="nav-item" style="border: 0px solid rgba(255, 0, 0, 0); border-radius: 10px; margin-bottom:20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
 
          <a class="nav-link" href="https://drive.google.com/drive/folders/1xdPuTS3Ay7W-wDXSkLhnZbNaG32PmQNR?usp=sharing">
            <i class="mdi mdi-book menu-icon" style="color: #5E5E5E"></i>
            <span class="menu-title">Panduan</span>
          </a>
        </li>
      @endif
    
 

 
        
        {{-- @if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadm'|| Auth::user()->role == 'sekretaris'|| Auth::user()->role == 'user')
          <div class="logout-wrapper">
            <li class="nav-item1">
              <a class="nav-link" href="{{ route('logout') }}">
                <i class="mdi mdi-exit-to-app menu-icon" style="color: black"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </div>
        @endif --}}
      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
          <h1 style="flex-grow: 1; text-align: left; position: relative; left:280px; color:white;">Menu Utama</h1>
          <div class="d-flex align-items-center">
            <!-- Button to trigger notification modal -->
            
           
                    @if(Auth::user()->role == 'admin')
<div class="img-topbar dropdown" style="display: flex; flex-direction: row; align-items: center; padding: 15px; border-radius: 10px; background-color: #413f3f46; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative;">
    <i class="mdi mdi-account-circle menu-icon" style="font-size: 30px; margin-right: 10px; color: white;"></i>
    <span class="menu-title" style="font-size: 18px; vertical-align: middle; color: white;">Kemahasiswaan FRI</span>
    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; margin-left: auto; color:white;">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="top: 60px; right: 0; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <a class="dropdown-item" href="{{ route('logout') }}" style="padding: 10px 20px; font-size: 16px;">Logout</a>
    </div>
</div>
@endif 
           @if(Auth::user()->role == 'mahasiswa')
<div class="img-topbar dropdown" style="display: flex; flex-direction: row; align-items: center; padding: 15px; border-radius: 10px; background-color: #413f3f46; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative;">
    <i class="mdi mdi-account-circle menu-icon" style="font-size: 30px; margin-right: 10px; color: white;"></i>
    <span class="menu-title" style="font-size: 18px; vertical-align: middle; color: white;">Mahasiswa</span>
    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; margin-left: auto; color:white;">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="top: 60px; right: 0; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <a class="dropdown-item" href="{{ route('logout') }}" style="padding: 10px 20px; font-size: 16px;">Logout</a>
    </div>
</div>
@endif
  
           @if(Auth::user()->role == 'himpunan')
<div class="img-topbar dropdown" style="display: flex; flex-direction: row; align-items: center; padding: 15px; border-radius: 10px; background-color: #413f3f46; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative;">
    <i class="mdi mdi-account-circle menu-icon" style="font-size: 30px; margin-right: 10px; color: white;"></i>
    <span class="menu-title" style="font-size: 18px; vertical-align: middle; color: white;">Himpunan Mahasiswa Teknik Industri</span>
    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; margin-left: auto; color:white;">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="top: 60px; right: 0; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <a class="dropdown-item" href="{{ route('logout') }}" style="padding: 10px 20px; font-size: 16px;">Logout</a>
    </div>
</div>
@endif
@if(Auth::user()->role == 'wadek')
<div class="img-topbar dropdown" style="display: flex; flex-direction: row; align-items: center; padding: 15px; border-radius: 10px; background-color: #413f3f46; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative;">
    <i class="mdi mdi-account-circle menu-icon" style="font-size: 30px; margin-right: 10px; color: white;"></i>
    <span class="menu-title" style="font-size: 18px; vertical-align: middle; color: white;">Wakil Dekan Teknik Industri</span>
    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; margin-left: auto; color:white;">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="top: 60px; right: 0; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <a class="dropdown-item" href="{{ route('logout') }}" style="padding: 10px 20px; font-size: 16px;">Logout</a>
    </div>
</div>
@endif
@if(Auth::user()->role == 'kemahasiswaan')
<div class="img-topbar dropdown" style="display: flex; flex-direction: row; align-items: center; padding: 15px; border-radius: 10px; background-color: #413f3f46; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative;">
    <i class="mdi mdi-account-circle menu-icon" style="font-size: 30px; margin-right: 10px; color: white;"></i>
    <span class="menu-title" style="font-size: 18px; vertical-align: middle; color: white;">Kaur Kemahasiswaan Teknik Industri</span>
    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; margin-left: auto; color:white;">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="top: 60px; right: 0; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <a class="dropdown-item" href="{{ route('logout') }}" style="padding: 10px 20px; font-size: 16px;">Logout</a>
    </div>
</div>
@endif


            
          </div>
        </div>
      </nav>
    
      <div class="main-panel">
        <div class="content-wrapper" style="margin-top: -130px; margin-right: 30px;"> <!-- Adjusted the top margin to lift the content up -->
          
                        @yield('content')
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Include jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      

    <script src="../template/vendors/js/vendor.bundle.base.js"></script>
    <script src="../template/vendors/chart.js/Chart.min.js"></script>
    <script src="../template/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../template/js/off-canvas.js"></script>
    <script src="../template/js/hoverable-collapse.js"></script>
    <script src="../template/js/template.js"></script>
    <script src="../template/js/dashboard.js"></script>
</body>
</html>
