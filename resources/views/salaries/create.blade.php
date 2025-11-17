@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Form <em>Gaji</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('salaries.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan:</label>
                            <select id="karyawan_id" name="karyawan_id" class="form-select" required>
                                <option value="">Pilih Karyawan</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="bulan" class="form-label">Bulan:</label>
                            <input type="month" id="bulan" name="bulan" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                            <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tunjangan" class="form-label">Tunjangan:</label>
                                <input type="number" id="tunjangan" name="tunjangan" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="potongan" class="form-label">Potongan:</label>
                                <input type="number" id="potongan" name="potongan" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection