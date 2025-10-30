@extends('layouts.app')  {{-- 1. Pakai layout utama --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper agar tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Judul Halaman --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Pegawai</em></h2>
    </div>

    {{-- Bungkus detail pakai "card" Bootstrap --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Tabel untuk menampilkan detail data --}}
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Lengkap</th>
                                <td>{{ $employee->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $employee->nomor_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $employee->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    {{-- Pakai badge agar rapi --}}
                                    @if(strtolower($employee->status) == 'aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($employee->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Departemen</th>
                                {{-- Menampilkan nama departemen dari relasi --}}
                                <td>{{ $employee->departemen->nama_departemen ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                {{-- Menampilkan nama jabatan dari relasi --}}
                                <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Tombol Aksi --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit Data</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}