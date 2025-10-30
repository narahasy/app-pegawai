<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
</head>
<body>
    <h2>Edit Data Absensi</h2>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Karyawan:</label>
        <input type="number" name="karyawan_id" value="{{ old('karyawan_id', $attendance->karyawan_id) }}" required><br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" required><br>

        <label>Waktu Masuk:</label>
        <input type="time" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required><br>

        <label>Waktu Keluar:</label>
        <input type="time" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"><br>

        <label>Status Absensi:</label>
        <input type="text" name="status_absensi" value="{{ old('status_absensi', $attendance->status_absensi) }}" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>