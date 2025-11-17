@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Departemen</em></h2>
    </div>

    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('departemens.create') }}" style="border-radius: 8px; padding: 8px 16px; font-size: 14px;">Tambah Departemen</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped table-hover">
            
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>Nama Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($departemens as $departemen)
                <tr>
                    <td>{{ $departemen->nama_departemen }}</td>
                    
                    <td>
                        <a href="{{ route('departemens.show', $departemen) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('departemens.edit', $departemen) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('departemens.destroy', $departemen) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type"submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">Belum ada data departemen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection