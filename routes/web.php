<?php

use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('pages.index'))->name('home');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/service', fn() => view('pages.service'))->name('service');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.post');

/*
|--------------------------------------------------------------------------
| AFTER LOGIN (SEMUA ROLE)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin'])->group(function () {

    // Redirect otomatis sesuai role
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');

    // USER DASHBOARD (USER HANYA KE SINI)
    Route::get('/user/dashboard', function () {
        return view('pages.index');
    })->name('user.dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin', 'checkrole:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('pages.index');
    })->name('admin.dashboard');

    // FULL CRUD ADMIN
    Route::resource('keluargakk', KeluargaKKController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('user', UserController::class);
    Route::resource('anggota_keluarga', AnggotaKeluargaController::class);
    Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);

});
