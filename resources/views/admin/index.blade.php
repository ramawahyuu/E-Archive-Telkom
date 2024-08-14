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
  
  <style>
    .dropdown-menu-right {
        min-width: 200px;
    }

    .dropdown-menu-right .dropdown-item {
        transition: background-color 0.3s, color 0.3s;
    }

    .dropdown-menu-right .dropdown-item:hover {
        background-color: #413f3f;
        color: #ffffff;
    }
</style>
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
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'wadek' || Auth::user()->role == 'kemahasiswaan')
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
        <div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh;">
          <div class="row w-100">
            <div class="container mt-4">
              <div class="col-md-3 grid-margin stretch-card" style="margin-top:10%; margin-left: 6%;">
                <div class="card bg-white text-white mb-4" style="border-radius: 25px; border: 1px solid #17171700; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); margin-right: 50px; transform: scale(1);">
                  @if(Auth::user()->role == 'admin'||Auth::user()->role == 'kemahasiswaan'||Auth::user()->role == 'wadek') 
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="card-description text-center">Jumlah Proposal Yang masuk</h4>
                    <br>
                    <h3 class="text-center">{{ $totalProposals }}</h3>
                  </div> 
                </div>
                <div class="card bg-white text-white mb-4" style="border-radius: 25px; border: 1px solid #17171700; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); margin-right: 50px; transform: scale(1);">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="card-description text-center">Jumlah Team Yang masuk</h4>
                    <br>
                    <h3 class="text-center">{{ $totalProposals }}</h3>
                  </div>
                </div>
                <div class="card bg-white text-white mb-4"  style="border-radius: 25px; border: 1px solid #17171700; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); ">
                              <div class="card-body">
                                  <canvas id="programChart"></canvas>
                              </div>
                          </div>
                        

                          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                          <script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  var ctx = document.getElementById('programChart').getContext('2d');
                                  var programData = @json($programs);
                                  var labels = programData.map(function(item) { return item.program_studi; });
                                  var data = programData.map(function(item) { return item.total; });

                                  var chart = new Chart(ctx, {
                                      type: 'pie',
                                      data: {
                                          labels: labels,
                                          datasets: [{
                                              data: data,
                                              backgroundColor: [
                                                  'rgba(255, 99, 132, 0.2)',
                                                  'rgba(54, 162, 235, 0.2)',
                                                  'rgba(255, 206, 86, 0.2)',
                                                  'rgba(75, 192, 192, 0.2)',
                                                  'rgba(153, 102, 255, 0.2)',
                                                  'rgba(255, 159, 64, 0.2)'
                                              ],
                                              borderColor: [
                                                  'rgba(255, 99, 132, 1)',
                                                  'rgba(54, 162, 235, 1)',
                                                  'rgba(255, 206, 86, 1)',
                                                  'rgba(75, 192, 192, 1)',
                                                  'rgba(153, 102, 255, 1)',
                                                  'rgba(255, 159, 64, 1)'
                                              ],
                                              borderWidth: 1
                                          }]
                                      },
                                      options: {
                                          responsive: true,
                                          plugins: {
                                              tooltip: {
                                                  callbacks: {
                                                      label: function(tooltipItem) {
                                                          var total = tooltipItem.dataset.data.reduce((a, b) => a + b, 0);
                                                          var value = tooltipItem.raw;
                                                          var percentage = ((value / total) * 100).toFixed(2);
                                                          return `${tooltipItem.label}: ${value} (${percentage}%)`;
                                                      }
                                                  }
                                              }
                                          }
                                      }
                                  });
                              });
                          </script>
                @endif
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card" style="margin-top:10px; margin-left: 2%; margin-right: 1%; width: auto; height: auto;">
              <div class="card bg-white text-white mb-4" style="border-radius: 25px; border: 1px solid #17171700; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); max-width: 1478px; position: relative; padding: 20px; margin-left:20px; transform: scale(1);">
                   <div class="card-body">
                                <div class="containerinfo">
                                  </div>
                                <h2 class="card-title">Selamat datang di SEKAR (Sistem Elektronik Arsip) Fakultas Rekayasa Industri!</h2>
                                
                                <h4 class="card-description"><strong>SEKAR</strong> merupakan sistem arsip elektronik berbasis website yang berfungsi untuk melakukan proses dokumentasi terhadap seluruh proses bisnis yang dimiliki fakultas rekayasa industri serta monitoring terhadap pelaksanaan program kerja pada fakultas rekayasa industri terutama pada urusan kemahasiswaan FRI.</h2>
                            </div>
              </div>
            </div>
            <div class="card bg-white text-white mb-4" style="border-radius: 25px; border: 1px solid #17171700; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); max-width: 1500px; position: relative; bottom:30px; margin-top:10px; margin-left: 4%; transform: scale(1);">
             <div class="card-body">
                            <img src="../template/temp/assets/img/logorekayasa.png" alt="" srcset="" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 30px; ">
                             <h4 class="card-description"><strong>Fakultas Rekayasa Industri </strong> (FRI) merupakan salah satu Fakultas pertama yang terbentuk di Universitas Telkom. Terdapat lima program studi yang telah terakreditasi nasional, 
                                beberapa program studi diantaranya telah terakreditasi Unggul dan A. Selain itu terdapat program studi yang telah terakreditasi internasional dari IABEE.</h4>
                              <h4 class="card-description"><strong>Visi:</strong><br> Menjadi fakultas yang berfokus pada riset dan kewirausahaan yang memainkan peran aktif dalam pengembangan ilmu pengetahuan di bidang sistem industri berbasis teknologi informasi yang berkontribusi pada ekonomi nasional.</p></h2>
                              <h4 class="card-description"><strong>Misi:</strong><br> 
                                1. Menyelenggarakan sistem pendidikan bertaraf Internasional di bidang sistem industri berbasis teknologi informasi yang mendorong pembelajaran aktif, kreatif dan mandiri. <br>
                                2. Mengembangkan dan menyebarluaskan ilmu pengetahuan, teknologi dan manajemen di bidang sistem industri berbasis teknologi informasi yang diakui secara internasional <br>
                                3. Menyelenggarakan sistem pendidikan bertaraf Internasional di bidang sistem industri berbasis teknologi informasi yang mendorong pembelajaran aktif, kreatif dan mandiri. <br></p></h4>
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
              
        <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script src="../template/vendors/js/vendor.bundle.base.js"></script>
            <script src="../template/vendors/chart.js/Chart.min.js"></script>
            <script src="../template/js/jquery.cookie.js" type="text/javascript"></script>
            <script src="../template/js/off-canvas.js"></script>
            <script src="../template/js/hoverable-collapse.js"></script>
            <script src="../template/js/template.js"></script>
            <script src="../template/js/dashboard.js"></script>
            
      
</body>
</html>