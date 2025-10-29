<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemens = Departemen::latest()->paginate(5);
        return view('departemens.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        Departemen::create([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('departemens.index')
                         ->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function show(Departemen $departemen)
    {
        return view('departemens.show', compact('departemen'));
    }

    public function edit(Departemen $departemen)
    {
        return view('departemens.edit', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        $departemen->update([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('departemens.index')
                         ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();

        return redirect()->route('departemens.index')
                         ->with('success', 'Departemen berhasil dihapus.');
    }
}