<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang diperbolehkan menambah informasi.');
        }

        $kategoris = Kategori::all();

        return view('informasi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang diperbolehkan menambah informasi.');
        }

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

    public function show(Request $request, Informasi $informasi)
    {
        $informasi->load('kategori');

        // Simpan kategori artikel terakhir yang dibuka ke dalam Session (Slide 6 & 7)
        if ($informasi->kategori) {
            $request->session()->put('kategori_terakhir', $informasi->kategori->nama);
        }

        return view('informasi.show', compact('informasi'));
    }

    public function edit(Informasi $informasi)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang diperbolehkan mengubah informasi.');
        }

        $kategoris = Kategori::all();

        return view('informasi.ubah', compact('informasi', 'kategoris'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang diperbolehkan memperbarui informasi.');
        }

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
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang diperbolehkan menghapus informasi.');
        }

        $informasi->delete();

        return redirect('/daftar-informasi')
                         ->with('success', 'Informasi berhasil dihapus.');
    }
}