@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Edit <em>Data Absensi</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('attendances.update', $attendance) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Pegawai:</label>
                            <select id="karyawan_id" name="karyawan_id" class="form-select" required>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" 
                                   value="{{ old('tanggal', $attendance->tanggal) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_absensi" class="form-label">Status Absensi:</label>
                            <select id="status_absensi" name="status_absensi" class="form-select" required>
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}" {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="waktu_masuk" class="form-label">Waktu Masuk:</label>
                                <input type="time" id="waktu_masuk" name="waktu_masuk" class="form-control" 
                                       value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="waktu_keluar" class="form-label">Waktu Keluar:</label>
                                <input type="time" id="waktu_keluar" name="waktu_keluar" class="form-control" 
                                       value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection