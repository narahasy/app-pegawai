@extends('layouts.app')  {{-- 1. Pakai layout utama --}}

@section('content')      {{-- 2. Mulai bagian konten --}}

{{-- Wrapper agar tidak tertutup header --}}
<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    {{-- Judul Halaman --}}
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Form <em>Tambah Pegawai</em></h2>
    </div>

    {{-- 
      Kita bungkus form-nya pakai "card" dari Bootstrap 
      agar terlihat rapi di tengah.
    --}}
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        
                        {{-- (INI ADALAH FORM BOOTSTRAP, BUKAN TABEL) --}}

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" name="status" class="form-select" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="departemen_id" class="form-label">Departemen:</label>
                            <select id="departemen_id" name="departemen_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Departemen</option>
                                @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan:</label>
                            <select id="jabatan_id" name="jabatan_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tombol (pakai kelas template) --}}
                        <div class="text-end mt-4">
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                            
                            {{-- INI YANG DIGANTI --}}
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div> {{-- Penutup container --}}

@endsection {{-- 3. Selesai bagian konten --}}