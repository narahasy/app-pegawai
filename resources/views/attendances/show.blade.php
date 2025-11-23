@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Absensi</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Pegawai</th>
                                <td>{{ $attendance->employees->nama_lengkap ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Masuk</th>
                                <td>{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Keluar</th>
                                <td>{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
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
                        </tbody>
                    </table>

                    <div class="text-end mt-4">
                        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection