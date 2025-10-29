<!DOCTYPE html>
<html>
<head>
    <title>Detail Gaji</title>
</head>
<body>
    <h1>Detail Gaji</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Karyawan</th><td>{{ $salary->employee->nama ?? '-' }}</td></tr>
        <tr><th>Bulan</th><td>{{ $salary->bulan }}</td></tr>
        <tr><th>Gaji Pokok</th><td>{{ number_format($salary->gaji_pokok) }}</td></tr>
        <tr><th>Tunjangan</th><td>{{ number_format($salary->tunjangan) }}</td></tr>
        <tr><th>Potongan</th><td>{{ number_format($salary->potongan) }}</td></tr>
        <tr><th>Total Gaji</th><td>{{ number_format($salary->total_gaji) }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $salary->created_at }}</td></tr>
        <tr><th>Diupdate</th><td>{{ $salary->updated_at }}</td></tr>
    </table>
</body>
</html>