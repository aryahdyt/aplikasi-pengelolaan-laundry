<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PenggunaController;
use App\Http\Middleware\CekLevel;
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

    Route::get('/pelanggan', [App\Http\Controllers\PelangganController::class, 'index'])->name('pelanggan');
});
Route::group(['middleware' => ['auth', 'CekLevel:kasir']], function () {
    // Route::get('/user', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard2');
});
