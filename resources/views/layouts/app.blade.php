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
    
    <style>
      body, h1, h2, h3, h4, h5, h6, p, a, li, span, div, .header-text {
        font-family: 'Poppins', sans-serif !important;
      }
    
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: #f7f7f7 !important;
        background-attachment: fixed !important;
      }
     
      .header-area {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999 !important;
        background: #ffffff !important;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05) !important;
      }
      
      #content-wrapper {
        flex-grow: 1;
        margin-top: 100px; 
      }

      .container {
        max-width: 1320px !important;
      }

      #content-wrapper > .container {
        margin-top: 35px !important;
        margin-bottom: 60px !important;
        padding: 40px !important;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
      }

      footer {
        text-align: center;
        margin-bottom: 20px;
      }
    
      .main-nav .main-red-button a {
        border-radius: 6px !important;
      }

      body.page-dashboard #content-wrapper > .container {
        padding: 0 !important;
        background-color: transparent;
        box-shadow: none;
        margin-top: 20px !important;
        margin-bottom: 0 !important;
      }
      
      body.page-dashboard .main-banner .container {
        margin-top: 35px;
        padding: 60px 40px !important;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.05);
      }
    
      body.page-dashboard #services .container {
        margin-top: 30px;
        margin-bottom: 60px;
        padding: 60px 40px !important;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.05);
      }
    
      body.page-dashboard #services .row {
        display: flex;
        flex-wrap: wrap;
      }

      body.page-dashboard #services .col-lg-3 {
        display: flex;
        align-items: stretch;
      }

      body.page-dashboard #services .service-item {
        width: 100%;
        height: 100%;
      }
      .table .btn {
      margin-bottom: 8px;
      }
    </style>
  </head>

<body class="{{ Request::is('/') ? 'page-dashboard' : '' }}">

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
                <li>
                    <a href="{{ route('announcements.index') }}" class="{{ Request::is('announcements*') ? 'active' : '' }}">Pengumuman</a>
                </li>
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
  
  <div id="content-wrapper">
      @yield('content')
  </div>

  <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© 2025 AppPegawai. Hak Cipta Dilindungi. 
                <br>Dibuat oleh: <a href="https://id.wikipedia.org/wiki/Moci" target="_blank">Mochiwwa</a></p>
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