<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AuthController;

// ==================== AUTH PUBLIC ====================

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// ==================== TERLINDUNGI (AUTH) ====================

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // Route umum (Admin & User biasa dapat membaca)
    Route::get('/', [InformasiController::class, 'index']);
    Route::get('/daftar-informasi', [InformasiController::class, 'index']);
    Route::get('/detail-informasi/{informasi}', [InformasiController::class, 'show']);

    // Route Khusus Admin (Otorisasi Gate: akses-admin)
    Route::middleware('can:akses-admin')->group(function () {

        // CRUD Informasi (Tambah, Edit, Hapus)
        Route::get('/tambah-informasi', [InformasiController::class, 'create']);
        Route::post('/simpan-informasi', [InformasiController::class, 'store']);
        Route::get('/ubah-informasi/{informasi}', [InformasiController::class, 'edit'])->name('informasi.ubah');
        Route::put('/update-informasi/{informasi}', [InformasiController::class, 'update']);
        Route::delete('/hapus-informasi/{informasi}', [InformasiController::class, 'destroy'])->name('informasi.hapus');

        // CRUD Kategori
        Route::get('/daftar-kategori', [KategoriController::class, 'index']);
        Route::get('/tambah-kategori', [KategoriController::class, 'create']);
        Route::post('/simpan-kategori', [KategoriController::class, 'store']);
        Route::get('/ubah-kategori/{kategori}', [KategoriController::class, 'edit'])->name('kategori.ubah');
        Route::put('/update-kategori/{kategori}', [KategoriController::class, 'update']);
        Route::delete('/hapus-kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.hapus');
    });

});