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
        padding: 12px 15px;
        font-size: 14px;
        border: 1px solid #e9ecef;
    }
    
    .table thead th {
        border-bottom: 2px solid #333;
        white-space: nowrap;
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
        min-width: 35px;
        min-height: 35px;
        flex-shrink: 0; 
        text-decoration: none !important;
        line-height: 1;
    }

    .btn-action-detail {
        color: #17a2b8;
        background-color: rgba(23, 162, 184, 0.1);
    }
    .btn-action-detail:hover {
        background-color: #17a2b8;
        color: white;
        transform: scale(1.1);
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
            <h2 style="margin: 0;">Daftar <em style="color: #fe3f40; font-style: normal;">Jabatan</em></h2>
        </div>

        <a href="{{ route('positions.create') }}" class="btn-add-custom">
            <i class="fa fa-plus-circle"></i> Tambah Jabatan
        </a>

    </div>

    <div class="table-responsive">
        
        <table class="table table-striped table-hover mb-0" style="width: 100%; white-space: nowrap;">
            
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th style="min-width: 150px;">Nama Jabatan</th>
                    <th style="min-width: 150px;">Gaji Pokok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($positions as $position)
                <tr>
                    <td style="font-weight: 600; color: #2c3e50; vertical-align: middle;">
                        {{ $position->nama_jabatan }}
                    </td>
                    
                    <td style="vertical-align: middle;">
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                    
                    <td class="text-center" style="vertical-align: middle;">
                        <div style="display: flex; justify-content: center; align-items: center; gap: 5px;">
                            
                            <a href="{{ route('positions.show', $position) }}" class="btn-action btn-action-detail" title="Detail">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('positions.edit', $position) }}" class="btn-action btn-action-edit" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <form action="{{ route('positions.destroy', $position) }}" method="POST" style="display:inline; margin:0; padding:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-action-delete" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-muted">Belum ada data jabatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $positions->links() }}
    </div>

</div>

@endsection