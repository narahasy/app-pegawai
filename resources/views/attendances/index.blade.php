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
</style>

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="d-flex justify-content-between align-items-center mb-4" style="padding-top: 20px;">
        
        <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s" style="margin-bottom: 0;">
            <h2 style="margin: 0;">Data <em style="color: #fe3f40; font-style: normal;">Absensi</em></h2>
        </div>

        <a href="{{ route('attendances.create') }}" class="btn-add-custom">
            <i class="fa fa-plus-circle"></i> Tambah Absensi
        </a>

    </div>

    <div class="table-responsive">
        
        <table class="table table-striped table-hover mb-0" style="width: 100%; white-space: nowrap;">
            
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    <th style="width: 25%;">Nama Pegawai</th> 
                    <th style="width: 20%;">Tanggal</th>
                    <th class="text-center" style="width: 15%;">Waktu Masuk</th>
                    <th class="text-center" style="width: 15%;">Waktu Keluar</th>
                    <th class="text-center" style="width: 20%;">Status Absensi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($attendances as $attendance)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    
                    <td style="font-weight: 600; color: #2c3e50;" title="{{ $attendance->employees->nama_lengkap ?? 'N/A' }}">
                        {{ $attendance->employees->nama_lengkap ?? 'N/A' }}
                    </td>
                    
                    <td>
                        {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}
                    </td>
                    
                    <td class="text-center">
                        {{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}
                    </td>
                    
                    <td class="text-center">
                        {{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}
                    </td>
                    
                    <td class="text-center">
                        @php 
                            $status = strtolower($attendance->status_absensi); 
                        @endphp
                        
                        @if($status == 'hadir')
                            <span class="badge bg-success" style="font-weight: 500; padding: 6px 15px; border-radius: 20px;">Hadir</span>
                        
                        @elseif($status == 'sakit')
                            <span class="badge bg-info text-white" style="font-weight: 500; padding: 6px 15px; border-radius: 20px;">Sakit</span>
                        
                        @elseif($status == 'izin')
                            <span class="badge" style="background-color: #ffd900ff; color: white; font-weight: 500; padding: 6px 15px; border-radius: 20px;">Izin</span>
                        
                        @elseif($status == 'alpa' || $status == 'alpha')
                            <span class="badge bg-danger" style="font-weight: 500; padding: 6px 15px; border-radius: 20px;">Alpa</span>
                        
                        @else
                            <span class="badge bg-secondary" style="font-weight: 500; padding: 6px 15px; border-radius: 20px;">{{ ucfirst($status) }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data absensi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection