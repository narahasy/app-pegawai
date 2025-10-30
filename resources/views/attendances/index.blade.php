@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
<div class="container">
    <h1 class="mb-4">Data Absensi</h1>
    <a href="{{ route('attendances.create') }}">Tambah Absen</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
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
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->employees->nama_lengkap ?? '-' }}</td>
                <td>{{ $attendance->tanggal }}</td>
                <td>{{ $attendance->waktu_masuk }}</td>
                <td>{{ $attendance->waktu_keluar }}</td>
                <td>{{ ucfirst($attendance->status_absensi) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection