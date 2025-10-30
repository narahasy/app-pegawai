@extends('master')
@section('content')
<div class="container">
    <h1>Tambah Absensi</h1>

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="karyawan_id">Nama Karyawan</label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal</label></td>
                <td><input type="date" name="tanggal" id="tanggal" required></td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk</label></td>
                <td><input type="time" name="waktu_masuk" id="waktu_masuk"></td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Waktu Keluar</label></td>
                <td><input type="time" name="waktu_keluar" id="waktu_keluar"></td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status Absensi</label></td>
                <td>
                    <select name="status_absensi" id="status_absensi" required>
                        <option value="">Pilih Status</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                    <button type="button" onclick="window.location='{{ route('attendances.index') }}'">Batal</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection