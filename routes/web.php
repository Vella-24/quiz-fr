<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiController;


// ==================== KATEGORI ====================

Route::get('/daftar-kategori', [KategoriController::class, 'index']);
Route::get('/tambah-kategori', [KategoriController::class, 'create']);
Route::post('/simpan-kategori', [KategoriController::class, 'store']);
Route::delete('/hapus-kategori/{kategori}', [KategoriController::class, 'destroy'])
    ->name('kategori.hapus');
Route::get('/ubah-kategori/{kategori}', [KategoriController::class, 'edit'])
    ->name('kategori.ubah');
Route::put('/update-kategori/{kategori}', [KategoriController::class, 'update']);

// ==================== INFORMASI ====================

Route::get('/daftar-informasi', [InformasiController::class, 'index']);
Route::get('/tambah-informasi', [InformasiController::class, 'create']);
Route::post('/simpan-informasi', [InformasiController::class, 'store']);
Route::get('/detail-informasi/{informasi}', [InformasiController::class, 'show']);
Route::delete('/hapus-informasi/{informasi}', [InformasiController::class, 'destroy'])
    ->name('informasi.hapus');
Route::get('/ubah-informasi/{informasi}', [InformasiController::class, 'edit'])
    ->name('informasi.ubah');
Route::put('/update-informasi/{informasi}', [InformasiController::class, 'update']);


// ==================== HOMEPAGE ====================

Route::get('/', [InformasiController::class, 'index']);