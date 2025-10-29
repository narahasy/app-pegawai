<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::latest()->paginate(5);
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required|string|max:50',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        return view('attendances.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required|string|max:50',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil dihapus.');
    }
}