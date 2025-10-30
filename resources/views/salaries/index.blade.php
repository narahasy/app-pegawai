@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Gaji</em></h2>
    </div>

    {{-- Ini <a> "Tambah Salary" kamu, pakai style template --}}
    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('salaries.create') }}">Tambah Salary</a>
    </div>

    {{-- Ini <table> kamu, diganti jadi pakai style Bootstrap --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            
            {{-- Header Tabel (diberi background gelap) --}}
            <thead style="background-color: #333; color: white;">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($salaries as $salary)
                <tr>
                    {{-- DIBENERIN: $salary->employees jadi $salary->employee --}}
                    <td>{{ $salary->employees->nama_lengkap ?? 'N/A' }}</td>
                    
                    {{-- Format bulan jadi "Nama Bulan Tahun" --}}
                    <td>{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</td>
                    
                    {{-- Format mata uang --}}
                    <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                    
                    {{-- 
                      Ini <td> "Aksi" kamu, dirapikan jadi tombol.
                      PENTING: $salary->id diubah jadi $salary agar TIDAK ERROR
                    --}}
                    <td>
                        <a href="{{ route('salaries.show', $salary) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('salaries.destroy', $salary) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                {{-- Ini akan tampil jika datanya kosong --}}
                <tr>
                    <td colspan="7" class="text-center">Belum ada data gaji.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Menampilkan link Paginasi --}}
    <div class="mt-4">
        {{ $salaries->links() }}
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}