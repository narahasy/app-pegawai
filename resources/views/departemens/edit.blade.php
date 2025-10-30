@extends('layouts.app')  {{-- 1. Pakai layout utama --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h2> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Edit <em>Data Departemen</em></h2>
    </div>

    {{-- Kita bungkus form-nya pakai "card" Bootstrap agar rapi --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- 
                      Form kamu dimulai di sini.
                      PENTING: $departemen->id diubah jadi $departemen agar TIDAK ERROR
                    --}}
                    <form action="{{ route('departemens.update', $departemen) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        {{-- Ini <tr> "Nama Departemen" kamu --}}
                        <div class="mb-3">
                            <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                            <input type="text" id="nama_departemen" name="nama_departemen" class="form-control" 
                                   value="{{ old('nama_departemen', $departemen->nama_departemen) }}" required>
                        </div>

                        {{-- Ini <tr> "Tombol" kamu, dirapikan + tombol Batal --}}
                        <div class="text-end mt-4">
                            <a href="{{ route('departemens.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}