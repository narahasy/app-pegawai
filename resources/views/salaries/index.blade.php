@extends('master')
@section('title', 'Daftar Gaji')
@section('content')

<div class="container mt-5">
    <h1>Daftar Gaji</h1>
    <a href="{{ route('salaries.create') }}">Tambah Salary</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Bulan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
            <tr>
                <td>{{ $salary->employees->nama_lengkap ?? '-' }}</td>
                <td>{{ $salary->bulan }}</td>
                <td>{{ number_format($salary->gaji_pokok) }}</td>
                <td>{{ number_format($salary->tunjangan) }}</td>
                <td>{{ number_format($salary->potongan) }}</td>
                <td>{{ number_format($salary->total_gaji) }}</td>
                <td>
                    <a href="{{ route('salaries.show', $salary->id) }}">Detail</a> |
                    <a href="{{ route('salaries.edit', $salary->id) }}">Edit</a> |
                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $salaries->links() }}
</div>
@endsection