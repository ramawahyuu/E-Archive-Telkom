<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Mahasiswa;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('prestasi.index', compact('prestasis'));
    }

    // Show the form for creating a new resource.
    public function create()
    {

        return view('prestasi.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'program_studi' => 'required|max:255',
            'nomor' => 'required|max:15',
            'prestasi' => 'required|max:255',
        ]);

        // Create a new Prestasi record without the 'id'
        Prestasi::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('prestasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Display the specified resource.
    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show', compact('prestasi'));
    }

    // Show the form for editing the specified resource.
    public function editprestasi($id)
    {
        $prestasi = Prestasi::findOrFail($id); 
        return view('prestasi.edit', compact('prestasi'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Prestasi $prestasi)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'program_studi' => 'required|max:255',
            'nomor' => 'required|max:15',
            'prestasi' => 'required|max:255',
        ]);

        // Update the Prestasi record
        $prestasi->update($validated);

        // Redirect to the index page with a success message
        return redirect()->route('prestasi.index')->with('success', 'Data berhasil diperbarui');
    }

    // Remove the specified resource from storage.
    public function destroy(Prestasi $prestasi)
    {
        // Delete the Mahasiswa record
        $prestasi->delete();

        // Redirect to the index page with a success message
        return redirect()->route('prestasi.index')->with('success', 'Data berhasil dihapus');
    }
}
