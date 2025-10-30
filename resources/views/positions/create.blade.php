@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Form <em>Jabatan</em></h2>
    </div>

    {{-- Kita bungkus form-nya pakai "card" Bootstrap agar rapi --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Ini blok error kamu, dirapikan pakai style Bootstrap --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form kamu dimulai di sini --}}
                    <form action="{{ route('positions.store') }}" method="POST">
                        @csrf
                        
                        {{-- Ini <tr> "Nama Jabatan" kamu --}}
                        <div class="mb-3">
                            <label for="nama_jabatan" class="form-label">Nama Jabatan:</label>
                            <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" value="{{ old('nama_jabatan') }}" required>
                        </div>

                        {{-- Ini <tr> "Gaji Pokok" kamu --}}
                        <div class="mb-3">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                            <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" class="form-control" value="{{ old('gaji_pokok') }}" required>
                        </div>

                        {{-- Ini <tr> "Tombol" kamu, dirapikan + tombol Batal --}}
                        <div class="text-end mt-4">
                            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}