<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/login');
});

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard / Beranda setelah login
Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth')->name('beranda');

Route::resource('/buku', BukuController::class)->middleware('auth');

Route::get('/peminjaman', function () {
    return view('peminjaman.index'); // buat view kosong juga biar ga error
})->name('peminjaman.index');

Route::resource('peminjaman', PeminjamanController::class)->middleware('auth');

Route::patch('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
