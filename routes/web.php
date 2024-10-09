<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('/laporan', App\Http\Controllers\LaporanController::class);

Route::get('/template', [App\Http\Controllers\HomeController::class, 'index'])->name('template');   
