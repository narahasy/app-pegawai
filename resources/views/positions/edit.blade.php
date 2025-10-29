<!DOCTYPE html>
<html>
<head>
    <title>Edit Jabatan</title>
</head>
<body>
    <h2>Edit Data Jabatan</h2>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Jabatan:</label>
        <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required><br>

        <label>Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>