<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/tiket', [TiketController::class, 'index'])->name('admin.tiket.index');
Route::get('/admin/tiket/create', [TiketController::class, 'create'])->name('admin.tiket.create');
Route::post('/admin/tiket', [TiketController::class, 'store'])->name('admin.tiket.store');
Route::get('/admin/tiket/{id}/edit', [TiketController::class, 'edit'])->name('admin.tiket.edit');
Route::put('/admin/tiket/{id}', [TiketController::class, 'update'])->name('admin.tiket.update');
Route::delete('/admin/tiket/{id}', [TiketController::class, 'destroy'])->name('admin.tiket.destroy');

Route::get('/admin/pemesanan', [PemesananController::class, 'index'])->name('admin.pemesanan.index');
Route::delete('/admin/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('admin.pemesanan.destroy');

Route::get('/admin/pembeli', [PembeliController::class, 'index'])->name('admin.pembeli.index');
Route::delete('/admin/pembeli/{id}', [PembeliController::class, 'destroy'])->name('admin.pembeli.destroy');
