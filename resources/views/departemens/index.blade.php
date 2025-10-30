@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Departemen</em></h2>
    </div>

    {{-- Ini <a> "Tambah Departemen" kamu, pakai style template --}}
    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('departemens.create') }}">Tambah Departemen</a>
    </div>

    {{-- Ini <table> kamu, diganti jadi pakai style Bootstrap --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            
            {{-- Header Tabel (diberi background gelap) --}}
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
                    
                    {{-- 
                      Ini <td> "Aksi" kamu, dirapikan jadi tombol.
                      PENTING: $departemen->id diubah jadi $departemen agar TIDAK ERROR
                    --}}
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
                {{-- Ini akan tampil jika datanya kosong --}}
                <tr>
                    <td colspan="2" class="text-center">Belum ada data departemen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}