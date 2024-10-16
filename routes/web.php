<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::resource('transaksi', TransaksiController::class);
Route::post('/transaksi/{id}/cancel', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
Route::post('transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
Route::get('/laporan' , [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');  


Route::get('/template', [App\Http\Controllers\HomeController::class, 'index'])->name('template'); 

