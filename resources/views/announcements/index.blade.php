@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Pengumuman</em></h2>
    </div>

    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('announcements.create') }}" style="border-radius: 8px; padding: 8px 16px; font-size: 14px;">Tambah Pengumuman</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped table-hover">
            
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Tanggal Posting</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ Str::limit($announcement->content, 100) }}</td>
                    <td>{{ $announcement->date_posted }}</td>
                    <td>
                        <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data pengumuman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection