@extends('layouts.app')  {{-- 1. MEWAJIBKAN pakai layout baru kita --}}

@section('content')      {{-- 2. Memulai "slot" konten --}}

{{-- Wrapper ini penting agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Judul Halaman (pakai gaya template) --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Pegawai</em></h2>
    </div>

    {{-- Tombol Tambah (pakai gaya template) --}}
    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('employees.create') }}">Tambah Employee</a>
    </div>

    {{-- Tabel (pakai kelas Bootstrap dari template agar rapi) --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            
            {{-- Header Tabel (DITAMBAH DEPARTEMEN & JABATAN) --}}
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Departemen</th>  {{-- BARU --}}
                    <th>Jabatan</th>     {{-- BARU --}}
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            {{-- Isi Tabel (DITAMBAH DEPARTEMEN & JABATAN) --}}
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->nama_lengkap }}</td>
                    
                    {{-- Panggil relasi departemen --}}
                    <td>{{ $employee->departemen->nama_departemen ?? 'N/A' }}</td>
                    
                    {{-- Panggil relasi position --}}
                    <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                    
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->nomor_telepon }}</td>
                    <td>{{ $employee->tanggal_lahir }}</td>
                    <td>{{ $employee->alamat }}</td>
                    <td>{{ $employee->tanggal_masuk }}</td>
                    <td>
                        {{-- Mengubah Status jadi "badge" agar rapi --}}
                        @if(strtolower($employee->status) == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($employee->status) }}</span>
                        @endif
                    </td>
                    <td>
                        {{-- Mengubah Aksi jadi "tombol" agar rapi --}}
                        {{-- Peringatan: Route di sini masih pakai $employee->id (seperti yang kamu inginkan) --}}
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> {{-- Penutup table-responsive --}}

</div> {{-- Penutup container --}}

@endsection {{-- 3. Mengakhiri "slot" konten --}}