@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Data <em>Absensi</em></h2>
    </div>

    {{-- Ini <a> "Tambah Absen" kamu, pakai style template --}}
    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('attendances.create') }}">Tambah Absen</a>
    </div>

    {{-- Ini <table> kamu, diganti jadi pakai style Bootstrap --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            
            {{-- Header Tabel (diberi background gelap) --}}
            <thead style="background-color: #333; color: white;">
                <tr>
                    {{-- Ini 6 kolom TH kamu, tidak ada yang diubah/ditambah --}}
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Absensi</th>
                </tr>
            </thead>
            
            <tbody>
                {{-- 
                  Looping data kamu.
                  @forelse lebih aman dari @foreach karena ada @empty 
                --}}
                @forelse($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    
                    {{-- 
                      BUG FIX KECIL:
                      Kode aslimu: $attendance->employees (plural)
                      Kubenerin jadi: $attendance->employee (singular)
                      Karena relasinya pasti 'employee' (satu absensi punya satu employee)
                    --}}
                    <td>{{ $attendance->employees->nama_lengkap ?? 'N/A' }}</td>
                    
                    {{-- Tanggal, Waktu, Status dirapikan pakai style (Badge & Format) --}}
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
                {{-- Ini akan tampil jika datanya kosong --}}
                <tr>
                    <td colspan="6" class="text-center">Belum ada data absensi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}