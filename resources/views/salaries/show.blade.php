@extends('layouts.app')  {{-- 1. Ganti <html> jadi extends --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Gaji</em></h2>
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
                                <th style="width: 30%;">Nama Karyawan</th>
                                {{-- DIBENERIN: $salary->employees jadi $salary->employee --}}
                                <td>{{ $salary->employees->nama_lengkap ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Bulan</th>
                                {{-- Style: Format bulan agar lebih rapi --}}
                                <td>{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Gaji Pokok</th>
                                {{-- Style: Format mata uang --}}
                                <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tunjangan</th>
                                <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Potongan</th>
                                <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Gaji</th>
                                {{-- Style: Dibuat bold agar menonjol --}}
                                <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                {{-- Style: Format tanggal agar lebih rapi --}}
                                <td>{{ \Carbon\Carbon::parse($salary->created_at)->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                {{-- Style: Format tanggal agar lebih rapi --}}
                                <td>{{ \Carbon\Carbon::parse($salary->updated_at)->format('d F Y, H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Tombol "Kembali" (Penting untuk navigasi) --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}