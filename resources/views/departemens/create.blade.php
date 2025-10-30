@extends('layouts.app')  {{-- 1. Ganti <html> jadi extends --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Form <em>Departemen</em></h2>
    </div>

    {{-- Kita bungkus form-nya pakai "card" Bootstrap agar rapi --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Form kamu dimulai di sini --}}
                    <form action="{{ route('departemens.store') }}" method="POST">
                        @csrf
                        
                        {{-- Ini <tr> "Nama Departemen" kamu --}}
                        <div class="mb-3">
                            <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                            <input type="text" id="nama_departemen" name="nama_departemen" class="form-control" required>
                        </div>

                        {{-- Ini <tr> "Tombol" kamu, dirapikan + tombol Batal --}}
                        <div class="text-end mt-4">
                            {{-- Saya tambahkan tombol Batal agar konsisten --}}
                            <a href="{{ route('departemens.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}