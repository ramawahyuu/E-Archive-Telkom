<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class informasiController extends Controller
{
    public function informasi()
    {
        $informasi = informasi::all();
        return view('informasi', compact('informasi'));
    }
    public function edit($id)
{
    $informasi = Informasi::find($id);
    if (!$informasi) {
        return redirect()->back()->with('error', 'Informasi tidak ditemukan.');
    }
    return view('informasi.edit', compact('informasi'));
}
public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi1' => 'required|string',
        'gambar1' => 'required|string|max:255',
        'deskripsi2' => 'nullable|string',
        'gambar2' => 'nullable|string|max:255'
    ]);

    $informasi = new Informasi;
    $informasi->judul = $request->judul;
    $informasi->deskripsi1 = $request->deskripsi1;
    $informasi->gambar1 = $request->gambar1;
    $informasi->deskripsi2 = $request->deskripsi2;
    $informasi->gambar2 = $request->gambar2;
    $informasi->save();

    return redirect()->route('informasi')->with('success', 'Informasi berhasil ditambahkan.');
}
public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi1' => 'required|string',
        'gambar1' => 'required|string|max:255',
        'deskripsi2' => 'nullable|string',
        'gambar2' => 'nullable|string|max:255'
    ]);

    $informasi = Informasi::find($id);
    if (!$informasi) {
        return redirect()->back()->with('error', 'Informasi tidak ditemukan.');
    }

    $informasi->judul = $request->judul;
    $informasi->deskripsi1 = $request->deskripsi1;
    $informasi->gambar1 = $request->gambar1;
    $informasi->deskripsi2 = $request->deskripsi2;
    $informasi->gambar2 = $request->gambar2;
    $informasi->save();

    return redirect()->route('informasi')->with('success', 'Informasi berhasil diperbarui.');
}
}
