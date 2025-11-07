<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeluargaKKController;

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
