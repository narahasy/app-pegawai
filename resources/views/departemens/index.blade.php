@extends('master')
@section('title', 'Daftar Departemen')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Departemen</h1>
    <a href="{{ route('departemens.create') }}">Tambah Departemen</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departemens as $departemen)
            <tr>
                <td>{{ $departemen->nama_departemen }}</td>
                <td>
                    <a href="{{ route('departemens.show', $departemen->id) }}">Detail</a> |
                    <a href="{{ route('departemens.edit', $departemen->id) }}">Edit</a> |
                    <form action="{{ route('departemens.destroy', $departemen->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection