@extends('layouts.app')

@section('content')

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <h2>Daftar <em>Gaji</em></h2>
    </div>

    <div class="main-red-button" style="margin-bottom: 20px;">
        <a href="{{ route('salaries.create') }}" style="border-radius: 8px; padding: 8px 16px; font-size: 14px;">Tambah Salary</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped table-hover">
            
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
                    <td>{{ $salary->employees->nama_lengkap ?? 'N/A' }}</td>
                    
                    <td>{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</td>
                    
                    <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                    
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
                <tr>
                    <td colspan="7" class="text-center">Belum ada data gaji.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $salaries->links() }}
    </div>

</div>

@endsection