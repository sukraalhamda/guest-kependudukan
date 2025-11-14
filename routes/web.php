<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\AnggotaKeluargaController;

// CRUD Data Keluarga KK
Route::resource('keluargakk', KeluargaKKController::class);

// CRUD Data Warga
Route::resource('warga', WargaController::class);

// Halaman user
Route::resource('user', UserController::class);

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/service', function () {
    return view('pages.service');
})->name('service');

// Halaman Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Halaman Registrasi
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.post');

// Proses Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//anggota keluarga
Route::resource('anggota_keluarga', AnggotaKeluargaController::class);

