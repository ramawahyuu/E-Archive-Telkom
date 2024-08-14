<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('mahasiswas.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:255',
            'nama_mahasiswa' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'nama_tim' => 'required|max:255',
            'program_studi' => 'required|max:255',
        ]);

        // Create a new Mahasiswa record
        Mahasiswa::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Display the specified resource.
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    // Show the form for editing the specified resource.
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nim' => 'required|max:255|unique:mahasiswas,nim,' . $mahasiswa->id_mahasiswa . ',id_mahasiswa',
            'nama_mahasiswa' => 'required|max:255',
            'no_hp' => 'required|max:15',
            'nama_tim' => 'required|max:255',
            'program_studi' => 'required|max:255',
        ]);

        // Update the Mahasiswa record
        $mahasiswa->update($validated);

        // Redirect to the index page with a success message
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui');
    }

    // Remove the specified resource from storage.
    public function destroy(Mahasiswa $mahasiswa)
    {
        // Delete the Mahasiswa record
        $mahasiswa->delete();

        // Redirect to the index page with a success message
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}
