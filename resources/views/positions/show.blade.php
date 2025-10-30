@extends('layouts.app')  {{-- 1. Ganti <html> jadi extends --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Jabatan</em></h2>
    </div>

    {{-- Kita bungkus detailnya pakai "card" Bootstrap agar rapi --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Ini <table> kamu, dirapikan dengan kelas Bootstrap --}}
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Jabatan</th>
                                <td>{{ $position->nama_jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Gaji Pokok</th>
                                {{-- Logika number_format kamu sudah benar, ditambah "Rp" --}}
                                <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                {{-- Style: Format tanggal agar lebih rapi --}}
                                <td>{{ \Carbon\Carbon::parse($position->created_at)->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                {{-- Style: Format tanggal agar lebih rapi --}}
                                <td>{{ \Carbon\Carbon::parse($position->updated_at)->format('d F Y, H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Tombol "Kembali" (Penting untuk navigasi) --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}