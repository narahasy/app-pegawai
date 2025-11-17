@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s"> 
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Edit <em>Pengumuman</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('announcements.update', $announcement) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Pengumuman:</label>
                            <input type="text" name="title" id="title" class="form-control" 
                                   value="{{ old('title', $announcement->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Isi Pengumuman:</label>
                            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $announcement->content) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="date_posted" class="form-label">Tanggal Posting:</label>
                            <input type="date" name="date_posted" id="date_posted" class="form-control" 
                                   value="{{ old('date_posted', $announcement->date_posted) }}" required>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection