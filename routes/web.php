<?php

use Illuminate\Support\Facades\Route;

// Halaman Utama (Banner & Pilih Tiket)
Route::get('/', function () {
    return view('dashboard');
})->name('home');

// Halaman Riwayat Pembelian
Route::get('/riwayat', function () {
    return view('riwayat');
})->name('riwayat');

Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');