@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
<div class="container mt-5">
    <h1>Daftar Absensi</h1>
    <a href="{{ route('attendances.create') }}">Tambah Attendance</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Karyawan ID</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->karyawan_id }}</td>
                <td>{{ $attendance->tanggal }}</td>
                <td>{{ $attendance->waktu_masuk }}</td>
                <td>{{ $attendance->waktu_keluar }}</td>
                <td>{{ $attendance->status_absensi }}</td>
                <td>
                    <a href="{{ route('attendances.show', $attendance->id) }}">Detail</a> |
                    <a href="{{ route('attendances.edit', $attendance->id) }}">Edit</a> |
                    <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $attendances->links() }}
</div>
@endsection