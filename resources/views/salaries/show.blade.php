@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 140px; padding-bottom: 60px;">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Detail <em>Gaji</em></h2>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Pegawai</th>
                                <td>{{ $salary->employees->nama_lengkap ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Bulan</th>
                                <td>{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Gaji Pokok</th>
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
                                <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>{{ \Carbon\Carbon::parse($salary->created_at)->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                <td>{{ \Carbon\Carbon::parse($salary->updated_at)->format('d F Y, H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-end mt-4">
                        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection