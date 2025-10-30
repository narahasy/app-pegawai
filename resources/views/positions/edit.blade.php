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

        <table>
        <tr>
            <td><label for="nama_jabatan">Nama Jabatan:</label></td>
            <td><input type="text" name="nama_jabatan" id="nama_jabatan" value="{{ $position->nama_jabatan }}" required></td>
        </tr>
        <tr>
            <td><label for="gaji_pokok">Gaji Pokok:</label></td>
            <td><input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}"></td>
        </tr>
    </table>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>