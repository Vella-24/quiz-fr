<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::with('kategori')
                            ->orderBy('id', 'asc')
                            ->get();

        return view('informasi.daftar', compact('informasis'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('informasi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
            'sumber' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        Informasi::create($request->all());

        return redirect('/daftar-informasi')
                         ->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function show(Informasi $informasi)
    {
        $informasi->load('kategori');

        return view('informasi.show', compact('informasi'));
    }

    public function edit(Informasi $informasi)
    {
        $kategoris = Kategori::all();

        return view('informasi.ubah', compact('informasi', 'kategoris'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
            'sumber' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        $informasi->update($request->all());

        return redirect('/daftar-informasi')
                         ->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect('/daftar-informasi')
                         ->with('success', 'Informasi berhasil dihapus.');
    }
}