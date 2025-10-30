@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Jabatan</em></h2>
    </div>

    {{-- Ini <a> "Tambah Jabatan" kamu, pakai style template --}}
    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('positions.create') }}">Tambah Jabatan</a>
    </div>

    {{-- Ini <table> kamu, diganti jadi pakai style Bootstrap --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            
            {{-- Header Tabel (diberi background gelap) --}}
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($positions as $position)
                <tr>
                    <td>{{ $position->nama_jabatan }}</td>
                    {{-- Logika number_format kamu sudah benar, kita pertahankan --}}
                    <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                    
                    {{-- 
                      Ini <td> "Aksi" kamu, dirapikan jadi tombol.
                      PENTING: $position->id diubah jadi $position agar TIDAK ERROR
                    --}}
                    <td>
                        <a href="{{ route('positions.show', $position) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('positions.edit', $position) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('positions.destroy', $position) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                {{-- Ini akan tampil jika datanya kosong --}}
                <tr>
                    <td colspan="3" class="text-center">Belum ada data jabatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Menampilkan link Paginasi --}}
    <div class="mt-4">
        {{ $positions->links() }}
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}