<!DOCTYPE html>
<html>
<head>
    <title>Form Absensi</title>
</head>
<body>
    <h1>Form Absensi</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
            <tr>
                <td><label for="karyawan_id">Nama Karyawan:</label></td>
                <td>
                    <select id="karyawan_id" name="karyawan_id" class="form-control">
                        <option value="1">nabilah</option>
                    </select>
                </td>
            </tr>
        <br>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required><br>

        <label>Waktu Masuk:</label>
        <input type="time" name="waktu_masuk" required><br>

        <label>Waktu Keluar:</label>
        <input type="time" name="waktu_keluar"><br>

        <label>Status Absensi:</label>
        <input type="text" name="status_absensi" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>