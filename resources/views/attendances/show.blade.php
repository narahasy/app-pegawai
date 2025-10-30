@extends('master')

@section('content')
<div class="container">
    <h1>Detail Absensi</h1>
    <table class="table">
        <tr><th>Nama Karyawan</th><td>{{ $attendance->employees->nama ?? '-' }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $attendance->tanggal }}</td></tr>
        <tr><th>Waktu Masuk</th><td>{{ $attendance->waktu_masuk }}</td></tr>
        <tr><th>Waktu Keluar</th><td>{{ $attendance->waktu_keluar }}</td></tr>
        <tr><th>Status</th><td>{{ $attendance->status_absensi }}</td></tr>
    </table>
    <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
