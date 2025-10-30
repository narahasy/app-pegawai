@extends('layouts.app')
@section('content')

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h6>SELAMAT DATANG DI <span style="color: #58b4ffff;">APP</span><span style="color: #494949;">PEGAWAI !</span></h6>
                <h2>Sistem <em>Informasi</em> &amp; <span>Penggajian</span> Pegawai</h2>
                <p>Aplikasi AppPegawai adalah solusi terpadu untuk mengelola seluruh siklus kerja karyawan di perusahaan Anda. Sistem ini mencakup modul utama seperti Absensi, Struktur Departemen, Jabatan, hingga perhitungan Gaji.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{ asset('assets/images/nailong.png') }}" alt="Nailong" class="d-block mx-auto" style="max-width: 50%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection