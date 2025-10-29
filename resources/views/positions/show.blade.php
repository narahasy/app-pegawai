<!DOCTYPE html>
<html>
<head>
    <title>Detail Jabatan</title>
</head>
<body>
    <h1>Detail Jabatan</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Jabatan</th>
            <td>{{ $position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>{{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td>{{ $position->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate</th>
            <td>{{ $position->updated_at }}</td>
        </tr>
    </table>
</body>
</html>