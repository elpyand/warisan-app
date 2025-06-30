<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarisanController;

// Halaman utama diarahkan ke kalkulator
Route::get('/', function () {
    return redirect('/kalkulator');
});

// Link untuk "Kalkulator"
Route::get('/kalkulator', [WarisanController::class, 'form']);

// Link untuk "Edukasi"
Route::get('/edukasi', function () {
    return view('edukasi-waris');
});

// LINK BARU: Rute untuk "Peta Waris"
Route::get('/peta-waris', function () {
    return view('peta-waris');
});

// Rute untuk proses perhitungan
Route::post('/hitung', [WarisanController::class, 'hitung']);

