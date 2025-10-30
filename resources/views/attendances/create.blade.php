@extends('layouts.app')  {{-- 1. Ganti 'master' jadi 'layouts.app' --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper ini agar konten tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Ini <h1> kamu, tapi pakai style template --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Tambah <em>Absensi</em></h2>
    </div>

    {{-- Kita bungkus form-nya pakai "card" Bootstrap agar rapi --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Form kamu dimulai di sini, tidak ada yang diubah --}}
                    <form action="{{ route('attendances.store') }}" method="POST">
                        @csrf
                        
                        {{-- Ini <tr> "Nama Karyawan" kamu, diubah jadi <div class="mb-3"> --}}
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                                <option value="">Pilih Karyawan</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Ini <tr> "Tanggal" kamu --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>

                        {{-- Ini <tr> "Waktu Masuk" & "Waktu Keluar" kamu, dibuat berdampingan --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                                <input type="time" name="waktu_masuk" id="waktu_masuk" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="waktu_keluar" class_label="form-label">Waktu Keluar</label>
                                <input type="time" name="waktu_keluar" id="waktu_keluar" class="form-control">
                            </div>
                        </div>

                        {{-- Ini <tr> "Status Absensi" kamu --}}
                        <div class="mb-3">
                            <label for="status_absensi" class="form-label">Status Absensi</label>
                            <select name="status_absensi" id="status_absensi" class="form-select" required>
                                <option value="">Pilih Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Ini <tr> "Tombol" kamu, dirapikan --}}
                        <div class="text-end mt-4">
                            {{-- Tombol Batal kamu, diubah jadi link <a> agar rapi --}}
                            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
                            
                            {{-- Tombol Simpan kamu --}}
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}