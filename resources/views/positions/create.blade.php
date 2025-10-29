@extends('master')

@section('title', 'Form Jabatan')

@section('content')
<h1>Form Jabatan</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('positions.store') }}" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="nama_jabatan">Nama Jabatan:</label></td>
            <td><input type="text" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}"></td>
        </tr>
        <tr>
            <td><label for="gaji_pokok">Gaji Pokok:</label></td>
            <td><input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right;">
                <button type="submit">Simpan</button>
            </td>
        </tr>
    </table>
</form>
@endsection