<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::post('/transaksi/{id}/cancel', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
Route::post('transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
Route::get('/laporan' , [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');  
});

// Route::group (['middleware' => ['auth', App\Http\Middleware\AdminMiddleware::class]], function () {
    
//     Route::get('/admin', function () {
//         return "Anda Admin";
//     });
// });

// Route::group (['middleware' => ['auth', App\Http\Middleware\KasirMiddleware::class]], function () {
    
//     Route::get('/kasir', function () {
//         return "Anda Kasir";
//     });
// });

Route::get('/template', [App\Http\Controllers\HomeController::class, 'index'])->name('template'); 

// Route::group(['middleware' => ['role:admin']], function () {
//     Route::resource('/user', App\Http\Controllers\UserController::class);
//     Route::resource('/produk', App\Http\Controllers\ProdukController::class);
//     Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
//     Route::post('/transaksi/{id}/cancel', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
//     Route::post('transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
//     Route::get('/laporan' , [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');  
// });

// Route::group(['middleware' => ['role:kasir']], function () {
//     Route::resource('/produk', App\Http\Controllers\ProdukController::class);
//     Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
//     Route::post('/transaksi/{id}/cancel', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
//     Route::post('transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
//     Route::get('/laporan' , [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');  
// });