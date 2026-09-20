<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
{
    public function index()
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengelola kategori.');
        }

        $kategoris = Kategori::all();

        return view('kategori.daftar', compact('kategoris'));
    }

    public function create()
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengelola kategori.');
        }

        return view('kategori.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengelola kategori.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect('/daftar-kategori')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengelola kategori.');
        }

        return view('kategori.ubah', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengelola kategori.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect('/daftar-kategori')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        if (!Gate::allows('akses-admin')) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengelola kategori.');
        }

        $kategori->delete();

        return redirect('/daftar-kategori')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}