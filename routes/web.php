<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/cari-barang', [TransaksiController::class, 'cariBarang'])->name('transaksi.cariBarang');
    Route::post('/transaksi/simpan', [TransaksiController::class, 'simpanTransaksi'])->name('transaksi.simpan');

    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');

    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/create', [BarangController::class, 'store'])->name('barang.store');

});
Route::get('/template', [App\Http\Controllers\HomeController::class, 'index'])->name('template');
