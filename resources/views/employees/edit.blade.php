@extends('layouts.app')  {{-- 1. Pakai layout utama --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper agar tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Judul Halaman --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Form <em>Edit Pegawai</em></h2>
    </div>

    {{-- Bungkus form pakai "card" Bootstrap --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Form action dan method-nya sudah disesuaikan --}}
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- PENTING untuk edit --}}
                        
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" 
                                   value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" 
                                   value="{{ old('email', $employee->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" 
                                   value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" 
                                   value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            {{-- Untuk textarea, value ditaruh di antara tag --}}
                            <textarea id="alamat" name="alamat" class="form-control" rows="3" required>{{ old('alamat', $employee->alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" 
                                   value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" name="status" class="form-select" required>
                                {{-- Logika 'selected' untuk status --}}
                                <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="departemen_id" class="form-label">Departemen:</label>
                            <select id="departemen_id" name="departemen_id" class="form-select" required>
                                @foreach ($departemens as $departemen)
                                    {{-- Logika 'selected' untuk departemen --}}
                                    <option value="{{ $departemen->id }}" {{ old('departemen_id', $employee->departemen_id) == $departemen->id ? 'selected' : '' }}>
                                        {{ $departemen->nama_departemen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan:</label>
                            <select id="jabatan_id" name="jabatan_id" class="form-select" required>
                                @foreach ($positions as $position)
                                    {{-- Logika 'selected' untuk jabatan --}}
                                    <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                                        {{ $position->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tombol --}}
                        <div class="text-end mt-4">
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}