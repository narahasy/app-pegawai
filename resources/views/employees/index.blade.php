@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Pegawai</em></h2>
    </div>

    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('employees.create') }}" style="border-radius: 8px; padding: 8px 16px; font-size: 14px;">Tambah Pegawai</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped table-hover">
            
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->nama_lengkap }}</td>
                    
                    <td>{{ $employee->departemen->nama_departemen ?? 'N/A' }}</td>
                    
                    <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                    
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->nomor_telepon }}</td>
                    <td>{{ $employee->tanggal_lahir }}</td>
                    <td>{{ $employee->alamat }}</td>
                    <td>{{ $employee->tanggal_masuk }}</td>
                    <td>
                        @if(strtolower($employee->status) == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($employee->status) }}</span>
                        @endif
                    </td>
                    <td>
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
    </div>

</div>

@endsection