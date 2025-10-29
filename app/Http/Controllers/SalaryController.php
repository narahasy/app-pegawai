<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'bulan' => 'required|date',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        $total = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total,
        ]);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'bulan' => 'required|date',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        $total = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        $salary->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total,
        ]);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil dihapus.');
    }
}