<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\CekLevel;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('partial.master');
// });
Route::get('/erorLevel', function () {
    return view('eror.500');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('tambah-pengguna');
    Route::post('/pengguna/tambah', [PenggunaController::class, 'store'])->name('simpan-pengguna');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('edit-pengguna');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('');

    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
    Route::get('/outlet/tambah', [OutletController::class, 'create'])->name('tambah-outlet');
    Route::post('/outlet/tambah', [OutletController::class, 'store'])->name('simpan-outlet');
    Route::get('/outlet/{id}', [OutletController::class, 'show'])->name('detail-outlet');
    Route::get('/outlet/{id}/edit', [OutletController::class, 'edit'])->name('edit-outlet');
    Route::put('/outlet/{id}', [OutletController::class, 'update'])->name('');
    Route::delete('/outlet/{id}', [OutletController::class, 'destroy'])->name('');


    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])->name('tambah-pelanggan');
    Route::post('/pelanggan/tambah', [PelangganController::class, 'store'])->name('simpan-pelanggan');
    Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('detail-pelanggan');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('edit-pelanggan');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket');
    Route::get('/paket/tambah', [PaketController::class, 'create'])->name('tambah-paket');
    Route::post('/paket/tambah', [PaketController::class, 'store'])->name('simpan-paket');
    Route::get('/paket/{id}', [PaketController::class, 'show'])->name('detail-paket');
    Route::get('/paket/{id}/edit', [PaketController::class, 'edit'])->name('edit-paket');
    Route::put('/paket/{id}', [PaketController::class, 'update'])->name('');
    Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->name('');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('edit-transaksi');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('');
    Route::get('/transaksi/tambah', [TransaksiController::class, 'create'])->name('tambah-transaksi');
    Route::post('/transaksi/tambah', [TransaksiController::class, 'store'])->name('simpan-transaksi');

    Route::get('/transaksi/outlet', [TransaksiController::class, 'tampilOutlet'])->name('transaksi-cari-outlet');
    Route::get('/transaksi/outlet/{id}', [TransaksiController::class, 'create'])->name('');

    Route::get('/transaksi/pembayaran', [TransaksiController::class, 'tabel_pembayaran'])->name('konfirmasi-pembayaran');
    Route::get('/transaksi/pembayaran/{id}', [TransaksiController::class, 'edit_pembayaran'])->name('edit-pembayaran');
    Route::put('/transaksi/pembayaran/{id}', [TransaksiController::class, 'update_pembayaran'])->name('update-pembayaran');
});

Route::group(['middleware' => ['auth', 'CekLevel:kasir']], function () {
    // Route::get('/user', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard2');
});
