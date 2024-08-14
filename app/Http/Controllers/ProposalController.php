<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();
        return view('upload_proposal', compact('proposals'));
    }
    public function create()
    {
        return view('tambah_proposal');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'public/uploads';
        $file->storeAs($tujuan_upload, $nama_file);

        $proposal = new Proposal;
        $proposal->nama_tim = $request->nama_tim;
        $proposal->bidang_pkm = $request->bidang_pkm;
        $proposal->judul_proposal = $request->judul_proposal;
        $proposal->file = $nama_file;
        $proposal->link_revisi = $request->link_revisi ?? 'belum ada';
        $proposal->status = $request->status ?? 'pending';
        $proposal->save();

        return redirect()->route('upload_proposal.index')->with('success', 'Proposal berhasil diupload.');
    }

    public function update(Request $request, $id)
    {
        $proposal = Proposal::find($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'public/uploads';
            $file->storeAs($tujuan_upload, $nama_file);
            $proposal->file = $nama_file;
        }

        if ($request->has('nama_tim')) {
            $proposal->nama_tim = $request->nama_tim;
        }

        if ($request->has('bidang_pkm')) {
            $proposal->bidang_pkm = $request->bidang_pkm;
        }

        if ($request->has('judul_proposal')) {
            $proposal->judul_proposal = $request->judul_proposal;
        }
        if ($request->has('status')) {
            $proposal->status = $request->status;
        }
        if ($request->has('link_revisi')) {
            $proposal->link_revisi = $request->link_revisi;
        }

        $proposal->save();

        return redirect()->route('upload_proposal.index')->with('success', 'Proposal berhasil diupdate.');
    }
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();

        return redirect()->route('upload_proposal.index')->with('success', 'Proposal berhasil diupdate.');
    }
    public function show($id)
    {
        $proposal = Proposal::findOrFail($id);
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
