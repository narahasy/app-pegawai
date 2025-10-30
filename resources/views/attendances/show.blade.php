@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Absensi</em></h2>
    </div>

    {{-- Kita bungkus detailnya pakai "card" Bootstrap agar rapi --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Ini <table> kamu, dirapikan dengan kelas Bootstrap --}}
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Karyawan</th>
                                {{-- 
                                  BUG FIX KECIL:
                                  Kode aslimu: $attendance->employees (plural)
                                  Kubenerin jadi: $attendance->employee (singular)
                                  (Sama seperti yang kita benerin di file index)
                                --}}
                                <td>{{ $attendance->employees->nama_lengkap ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                {{-- Style: Format tanggal agar lebih rapi --}}
                                <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Masuk</th>
                                {{-- Style: Format waktu agar lebih rapi --}}
                                <td>{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Keluar</th>
                                {{-- Style: Format waktu agar lebih rapi --}}
                                <td>{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    {{-- Style: Status diubah jadi badge agar rapi --}}
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

                    {{-- Tombol "Kembali" kamu, dirapikan posisinya --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}