<!DOCTYPE html>
<html>
<head>
    <title>Form Gaji</title>
</head>
<body>
    <h1>Form Gaji</h1>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <label>Karyawan:</label>
        <select name="karyawan_id" required>
            <option value="">Pilih Karyawan</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
            @endforeach
        </select><br>

        <label>Bulan:</label>
        <input type="month" name="bulan" required><br>

        <label>Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" required><br>

        <label>Tunjangan:</label>
        <input type="number" name="tunjangan" required><br>

        <label>Potongan:</label>
        <input type="number" name="potongan" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>