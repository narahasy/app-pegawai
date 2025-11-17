@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Form <em>Departemen</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('departemens.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                            <input type="text" id="nama_departemen" name="nama_departemen" class="form-control" required>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('departemens.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection