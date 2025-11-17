@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s"> 
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Pengumuman</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Judul</th>
                                <td>{{ $announcement->title }}</td>
                            </tr>
                            <tr>
                                <th>Konten</th>
                                <td>{{ $announcement->content }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Posting</th>
                                <td>{{ \Carbon\Carbon::parse($announcement->date_posted)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ \Carbon\Carbon::parse($announcement->updated_at)->format('d F Y, H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-end mt-4">
                        <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-warning">Edit</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection