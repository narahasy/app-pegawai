<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>App Pegawai</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-space-dynamic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    
    {{-- INI KODE CSS UNTUK STICKY FOOTER --}}
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Memastikan body minimal setinggi layar */
        }
        /* Memastikan wrapper konten mengambil sisa ruang yang ada */
        #content-wrapper {
            flex-grow: 1; 
        }
        footer {
            text-align: center;
        }
    </style>
  </head>

<body>

  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <a href="{{ route('dashboard') }}" class="logo">
              <h4>App<span>Pegawai</span></h4>
            </a>
            
            {{-- NAVBAR DIBENARKAN: Dashboard dipindah ke paling akhir --}}
            <ul class="nav">
                <li>
                    <a href="{{ route('employees.index') }}" class="{{ Request::is('employees*') ? 'active' : '' }}">Pegawai</a>
                </li>
                <li>
                    <a href="{{ route('attendances.index') }}" class="{{ Request::is('attendances*') ? 'active' : '' }}">Absensi</a>
                </li>
                <li>
                    <a href="{{ route('departemens.index') }}" class="{{ Request::is('departemens*') ? 'active' : '' }}">Departemen</a>
                </li>
                <li>
                    <a href="{{ route('positions.index') }}" class="{{ Request::is('positions*') ? 'active' : '' }}">Jabatan</a>
                </li>
                <li>
                    <a href="{{ route('salaries.index') }}" class="{{ Request::is('salaries*') ? 'active' : '' }}">Gaji</a>
                </li>
                {{-- ITEM DASHBOARD MERAH DI POSISI PALING AKHIR --}}
                <li>
                    <div class="main-red-button"> 
                        <a href="{{ route('dashboard') }}" class="{{ Request::is('/') ? 'active' : '' }}">Dashboard</a>
                    </div>
                </li>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </header>
  
  {{-- WRAPPER UNTUK STICKY FOOTER --}}
  <div id="content-wrapper">
      @yield('content')
  </div>

  <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© 2025 AppPegawai. Hak Cipta Dilindungi. 
                <br>Dibuat oleh: <a href="https://nailongdino.com/" target="_blank">Nailong</a></p>
            </div>
        </div>
    </div>
  </footer>
  
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/animation.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/js/templatemo-custom.js') }}"></script>

</body>
</html>