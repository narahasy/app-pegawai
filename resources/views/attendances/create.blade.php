@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Tambah <em>Absensi</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('attendances.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                                <option value="">Pilih Karyawan</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                                <input type="time" name="waktu_masuk" id="waktu_masuk" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                                <input type="time" name="waktu_keluar" id="waktu_keluar" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status_absensi" class="form-label">Status Absensi</label>
                            <select name="status_absensi" id="status_absensi" class="form-select" required>
                                <option value="">Pilih Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection