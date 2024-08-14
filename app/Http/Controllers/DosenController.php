<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'id_dosen' => 'required|unique:dosens,id_dosen',
            'nama_dosen' => 'required|max:255',
            'bidang_pkm' => 'required|max:255',
            'program_studi' => 'required|max:255',
            'no_tlp' => 'required|max:15',
            'email' => 'required|email|unique:dosens,email',
        ]);
        // Create a new Dosen record
        Dosen::create($validated);

        // Set a flash message to indicate success
        return redirect()->route('dosen.index')->with('success', 'Data berhasil ditambahkan');
    }


public function edit($id)
{
    $dosen = Dosen::where('id_dosen', $id)->first();

    if (!$dosen) {
        return redirect()->route('dosen.index')->withErrors('Dosen not found.');
    }

    return view('dosens.edit', compact('dosen'));
}  
public function update(Request $request, Dosen $dosen)
{
    // Validate input, then update
    $validated = $request->validate([
        'id_dosen' => 'required|unique:dosens,id_dosen,' . $dosen->id_dosen . ',id_dosen',
        'nama_dosen' => 'required|max:255',
        'bidang_pkm' => 'required|max:255',
        'program_studi' => 'required|max:255',
        'no_tlp' => 'required|max:15',
        'email' => 'required|email|max:255|unique:dosens,email,' . $dosen->id_dosen . ',id_dosen',
        // The unique rule: 'unique:table,column,except,idColumn'
    ]);

    // Update the Dosen with the validated data
    $dosen->update($validated);

    return redirect()->route('dosen.index')->with('success', 'Dosen updated successfully');
}

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index');
    }
}

