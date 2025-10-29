<!DOCTYPE html>
<html>
<head>
    <title>Edit Gaji</title>
</head>
<body>
    <h2>Edit Data Gaji</h2>
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Karyawan:</label>
        <select name="karyawan_id" required>
            <option value="">Pilih Karyawan</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $employee->id == $salary->karyawan_id ? 'selected' : '' }}>
                    {{ $employee->nama }}
                </option>
            @endforeach
        </select><br>

        <label>Bulan:</label>
        <input type="month" name="bulan" value="{{ old('bulan', $salary->bulan) }}" required><br>

        <label>Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required><br>

        <label>Tunjangan:</label>
        <input type="number" name="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}" required><br>

        <label>Potongan:</label>
        <input type="number" name="potongan" value="{{ old('potongan', $salary->potongan) }}" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>