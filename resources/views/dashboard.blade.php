@extends('layouts.app')
@section('content')

<style>
    :root {
        --color-primary-red: #ff511a;
        --color-accent-blue: #00A9F1;
        --color-dark-text: #494949;
    }

    .main-banner {
        padding-top: 72px !important; 
        padding-bottom: 40px;
    }

    .services .service-item {
        padding: 20px 18px;
        border-radius: 0 !important;
        min-height: 290px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 8px 22px rgba(0,0,0,0.06);
        transition: all .25s ease;
    }

    .services .service-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.10);
    }

    .services .service-item .icon img {
        width: 200px;
        margin-bottom: 12px;
    }

    .services .service-item h4 {
        font-size: 18px;
        margin-bottom: 8px;
        font-weight: 700;
        color: var(--color-dark-text) !important;
    }

    .services .service-item p {
        font-size: 14px;
        margin-bottom: 15px;
        color: #555;
    }

    .main-red-button a {
        display: block;
        font-size: 14px;
        padding: 8px 14px;
        border-radius: 8px;
        text-align: center;
        font-weight: 600;
        transition: all 0.3s;
    }

    .services .row .col-6 .main-red-button a {
        padding-top: 8px;
        padding-bottom: 8px;
        font-size: 13px;
    }

    .services .col-lg-3 {
        margin-bottom: 25px;
    }

    .main-red-button:not(.main-blue-button) a {
        background-color: var(--color-primary-red) !important;
        border-color: var(--color-primary-red) !important;
        color: white !important;
    }
    
    .main-red-button:not(.main-blue-button) a:hover {
        background-color: var(--color-accent-blue) !important;
        border-color: var(--color-accent-blue) !important;
    }
    
    .main-blue-button a {
        background-color: var(--color-accent-blue) !important;
        border-color: var(--color-accent-blue) !important;
        color: white !important;
    }

    .main-blue-button a:hover {
        background-color: var(--color-primary-red) !important;
        border-color: var(--color-primary-red) !important;
    }
    
    .services .service-item:hover {
        border-radius: 0 !important;
    }

    .left-content.header-text h6 {
        font-weight: 700;
        font-size: 1.1em;
    }
    .left-content.header-text h6 span {
        font-weight: 700; 
    }
</style>

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          
          <div class="col-lg-6 align-self-center">
            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h6><span style="color: var(--color-dark-text);">SELAMAT DATANG DI</span> <span style="color: var(--color-accent-blue);">APP</span><span style="color: var(--color-primary-red);">PEGAWAI</span><span style="color: var(--color-dark-text);"> !</span></h6>
              <h2>Sistem <em>Informasi</em> &amp; <span>Penggajian</span> Terintegrasi</h2>
              <p>AppPegawai adalah solusi lengkap untuk manajemen data kepegawaian. Kelola semua kebutuhan administrasi, mulai dari data pegawai, absensi harian, hingga proses penggajian yang akurat.</p>
            </div>
          </div>

          <div class="col-lg-6 align-self-center">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{ asset('assets/images/pp.png') }}" alt="Dbord" class="d-block mx-auto" style="max-width: 60%;">
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div id="services" class="services section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <h2>Akses <em>Menu Cepat</em></h2>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-3 col-md-6">
        <div class="service-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="icon">
            <img src="{{ asset('assets/images/1.png') }}" alt="Icon Pegawai">
          </div>
          <h4>Manajemen Pegawai</h4>
          <p>Kelola data lengkap pegawai, dari profil pribadi hingga status kepegawaian.</p>
          <div class="main-red-button"><a href="{{ route('employees.index') }}" style="padding-top: 8px; padding-bottom: 8px;">Lihat Data</a></div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="service-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="icon">
            <img src="{{ asset('assets/images/2.png') }}" alt="Icon Absensi">
          </div>
          <h4>Kelola Absensi</h4>
          <p>Catat dan pantau kehadiran, izin, sakit, dan alpa pegawai secara real-time.</p>
          <div class="main-red-button"><a href="{{ route('attendances.index') }}" style="padding-top: 8px; padding-bottom: 8px;">Lihat Data</a></div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="service-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
          <div class="icon">
            <img src="{{ asset('assets/images/3.png') }}" alt="Icon Gaji">
          </div>
          <h4>Proses Gaji</h4>
          <p>Hitung gaji pokok, tunjangan, dan potongan untuk proses payroll yang akurat.</p>
          <div class="main-red-button"><a href="{{ route('salaries.index') }}" style="padding-top: 8px; padding-bottom: 8px;">Lihat Data</a></div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="service-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
          <div class="icon">
            <img src="{{ asset('assets/images/4.png') }}" alt="Icon Master">
          </div>
          <h4>Data Master</h4>
          <p>Atur struktur perusahaan, termasuk daftar departemen dan jabatan.</p>

          <div class="row g-2">
              <div class="col-6">
                  <div class="main-red-button">
                      <a href="{{ route('departemens.index') }}" style="width: 100%; text-align: center; padding-top: 8px; padding-bottom: 8px;">Departemen</a>
                  </div>
              </div>
              <div class="col-6">
                  <div class="main-red-button main-blue-button">
                      <a href="{{ route('positions.index') }}" style="width: 100%; text-align: center; padding-top: 8px; padding-bottom: 8px;">Jabatan</a>
                  </div>
              </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection