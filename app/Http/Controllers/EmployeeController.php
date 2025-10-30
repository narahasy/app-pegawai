<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departemen;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departemens = Departemen::all();
        $positions = Position::all(); 

        return view('employees.create', compact('departemens', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            'departemen_id' => 'required|integer|exists:departemens,id',
            'jabatan_id' => 'required|integer|exists:positions,id', 
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
        $employee = Employee::find($id);
        
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departemens = Departemen::orderBy('nama_departemen')->get();
        $positions = Position::orderBy('nama_jabatan')->get();
    
        return view('employees.edit', compact('employee', 'departemens', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
        'nama_lengkap'  => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'nomor_telepon' => 'required|string|max:20',
        'tanggal_lahir' => 'required|date',
        'alamat'        => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'status'        => 'required|string|max:50',
        'departemen_id'  => 'required|integer|exists:departemens,id',
        'jabatan_id' => 'required|integer|exists:positions,id',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        
        return redirect()->route('employees.index');
    }
}
