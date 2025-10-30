<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employees')->get();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        $statuses = ['hadir', 'izin', 'sakit', 'alpha'];
        return view('attendances.create', compact('employees', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance = Attendance::create($validated);

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show(Attendance $attendance)
    {
        $attendance->load('employee');
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        $statuses = ['hadir', 'izin', 'sakit', 'alpha'];
        return view('attendances.edit', compact('attendance', 'employees', 'statuses'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance->update($validated);

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
