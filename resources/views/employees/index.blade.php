@extends('layouts.app')

@section('content')

<style>
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none; 
        -ms-overflow-style: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
        border-radius: 12px; 
        background: white;
    }

    .table-responsive::-webkit-scrollbar {
        display: none; 
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 15px 15px;
        font-size: 14px;
        border: 1px solid #e9ecef;
    }
    
    .table thead th {
        border-bottom: 1px solid #333;
    }

    .btn-add-custom {
        background-color: #0984e3; 
        color: #ffffff !important; 
        padding: 10px 24px;
        border-radius: 50px; 
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(9, 132, 227, 0.3); 
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
    }

    .btn-add-custom:hover {
        background-color: #076bc2; 
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(9, 132, 227, 0.4);
    }

    .btn-action {
        border: none;
        background: transparent;
        padding: 0;
        border-radius: 50%;
        transition: all 0.3s ease;
        font-size: 16px;
        margin: 0 3px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
    }
    
    .btn-action-edit {
        color: #f39c12;
        background-color: rgba(243, 156, 18, 0.1);
    }
    .btn-action-edit:hover {
        background-color: #f39c12;
        color: white;
        transform: scale(1.1);
    }

    .btn-action-delete {
        color: #e74c3c;
        background-color: rgba(231, 76, 60, 0.1);
    }
    .btn-action-delete:hover {
        background-color: #e74c3c;
        color: white;
        transform: scale(1.1);
    }
</style>

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="d-flex justify-content-between align-items-center mb-4" style="padding-top: 20px;">
        
        <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s" style="margin-bottom: 0;">
            <h2 style="margin: 0;">Daftar <em style="color: #fe3f40; font-style: normal;">Pegawai</em></h2>
        </div>

        <a href="{{ route('employees.create') }}" class="btn-add-custom">
            <i class="fa fa-plus-circle"></i> Tambah Pegawai
        </a>

    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0" style="white-space: nowrap;">           
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th style="padding-left: 20px;">Nama Lengkap</th> 
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Tgl Masuk</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" style="padding-right: 20px;">Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td style="font-weight: 600; padding-left: 20px; color: #2c3e50;">{{ $employee->nama_lengkap }}</td>              
                    <td>{{ $employee->departemen->nama_departemen ?? '-' }}</td>
                    <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->nomor_telepon }}</td>
                    <td>{{ $employee->tanggal_lahir }}</td>
                    <td>{{ $employee->alamat }}</td>
                    <td>{{ $employee->tanggal_masuk }}</td>
                    
                    <td class="text-center">
                        @if(strtolower($employee->status) == 'aktif')
                            <span class="badge bg-success" style="font-weight: 500; padding: 5px 12px; border-radius: 20px;">Aktif</span>
                        @else
                            <span class="badge bg-secondary" style="font-weight: 500; padding: 5px 12px; border-radius: 20px;">{{ ucfirst($employee->status) }}</span>
                        @endif
                    </td>
                    
                    <td class="text-center" style="padding-right: 20px;">
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn-action btn-action-edit" title="Edit Data">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-action-delete" onclick="return confirm('Yakin ingin menghapus data {{ $employee->nama_lengkap }}?')" title="Hapus Data">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection