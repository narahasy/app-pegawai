@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Data <em>Absensi</em></h2>
    </div>

    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('attendances.create') }}" style="border-radius: 8px; padding: 8px 16px; font-size: 14px;">Tambah Absensi</a>
     </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped table-hover">
            
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Absensi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    
                    <td>{{ $attendance->employees->nama_lengkap ?? 'N/A' }}</td>
                    
                    <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                    <td>{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}</td>
                    <td>{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}</td>
                    <td>
                        @if(strtolower($attendance->status_absensi) == 'hadir')
                            <span class="badge bg-success">Hadir</span>
                        @elseif(in_array(strtolower($attendance->status_absensi), ['sakit', 'izin']))
                            <span class="badge bg-warning">{{ ucfirst($attendance->status_absensi) }}</span>
                        @elseif(strtolower($attendance->status_absensi) == 'alpa')
                            <span class="badge bg-danger">Alpa</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($attendance->status_absensi) }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data absensi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection