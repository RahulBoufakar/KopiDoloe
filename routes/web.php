<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoksController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

//admin Route
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth',)->group(function () {
    Route::resource('stoks', StoksController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::resource('menu', MenuController::class);
    Route::get('pemesanan/invoice', [PemesananController::class, 'invoice'])->name('pemesanan.invoice');
    Route::get('pemesanan/history', [PemesananController::class, 'history'])->name('pemesanan.history');
    Route::post('pemesanan/store', [PemesananController::class, 'store'])->middleware('web')->name('pemesanan.store');
    Route::resource('pemesanan', PemesananController::class);
});

require __DIR__.'/auth.php';