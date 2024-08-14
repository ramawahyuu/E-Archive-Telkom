<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal2;

class Proposals2Controller extends Controller
{
    public function index()
    {
        $proposals = Proposal2::all();
        return view('upload_proposal_himpunan', compact('proposals'));
    }
    
    
    public function store(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'public/uploads';
        $file->storeAs($tujuan_upload, $nama_file);

        $proposal = new Proposal2;
        $proposal->program_kerja = $request->program_kerja;
        $proposal->status = $request->status;
        $proposal->file = $nama_file;
        $proposal->save();

        return redirect()->route('upload_proposal_himpunan.index')->with('success', 'Proposal berhasil diupload.');
    }

    public function update(Request $request, $id)
    {
        $proposal = Proposal2::find($id);
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'public/uploads';
        $file->storeAs($tujuan_upload, $nama_file);

        $proposal->program_kerja = $request->program_kerja;
        $proposal->status = $request->status;
        $proposal->file = $nama_file;
        $proposal->save();
        return redirect()->route('upload_proposal_himpunan.index')->with('success', 'Proposal berhasil diupdate.');
    }
    public function destroy($id)
    {
        $proposal = Proposal2::findOrFail($id);
        $proposal->delete();

        return redirect()->route('upload_proposal_himpunan.index')->with('success', 'Proposal berhasil diupdate.');
    }
    public function show($id)
    {
        $proposal = Proposal2::findOrFail($id);
        $pathToFile = storage_path('app/public/uploads/' . $proposal->file);

        if (!file_exists($pathToFile)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($pathToFile) . '"'
        ];

        return response()->file($pathToFile, $headers);
    }
}
