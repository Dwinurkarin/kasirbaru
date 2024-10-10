<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/baru', [App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi.baru');
Route::post('/transaksi/batalkan', [App\Http\Controllers\TransaksiController::class, 'batalkanTransaksi'])->name('transaksi.batalkan');
Route::post('/transaksi/produk/{id}/hapus', [App\Http\Controllers\TransaksiController::class, 'hapusProduk'])->name('produk.hapus');
Route::post('/transaksi/selesai', [App\Http\Controllers\TransaksiController::class, 'transaksiSelesai'])->name('transaksi.selesai');
Route::resource('/laporan', App\Http\Controllers\LaporanController::class);

Route::get('/template', [App\Http\Controllers\HomeController::class, 'index'])->name('template');   
