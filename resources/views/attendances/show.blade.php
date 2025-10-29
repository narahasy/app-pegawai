<!DOCTYPE html>
<html>
<head>
    <title>Detail Absensi</title>
</head>
<body>
    <h1>Detail Absensi</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Karyawan ID</th>
            <td>{{ $attendance->karyawan_id }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $attendance->tanggal }}</td>
        </tr>
        <tr>
            <th>Waktu Masuk</th>
            <td>{{ $attendance->waktu_masuk }}</td>
        </tr>
        <tr>
            <th>Waktu Keluar</th>
            <td>{{ $attendance->waktu_keluar }}</td>
        </tr>
        <tr>
            <th>Status Absensi</th>
            <td>{{ $attendance->status_absensi }}</td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td>{{ $attendance->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate</th>
            <td>{{ $attendance->updated_at }}</td>
        </tr>
    </table>
</body>
</html>