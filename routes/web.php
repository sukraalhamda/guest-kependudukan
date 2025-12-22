<?php

use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC (GUEST)
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
| AFTER LOGIN (ADMIN & USER)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin'])->group(function () {

    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/user/dashboard', fn() => view('pages.index'))->name('user.dashboard');
});

/*
|--------------------------------------------------------------------------
| USER & ADMIN (INDEX + CREATE + EDIT)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin'])->group(function () {

    Route::resource('keluargakk', KeluargaKKController::class)
        ->only(['index', 'create', 'store', 'edit', 'update']);

    Route::resource('warga', WargaController::class)
        ->only(['index', 'create', 'store', 'edit', 'update']);

    Route::resource('anggota_keluarga', AnggotaKeluargaController::class)
        ->only(['index', 'create', 'store', 'edit', 'update']);

    Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class)
        ->only(['index', 'create', 'store', 'edit', 'update']);

    Route::resource('peristiwa_kematian', PeristiwaKematianController::class)
        ->only(['index', 'create', 'store', 'edit', 'update']);

    Route::resource('peristiwa_pindah', PeristiwaPindahController::class)
        ->only(['index', 'create', 'store', 'edit', 'update']);
});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY (DELETE + USER MANAGEMENT)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin', 'checkrole:admin'])->group(function () {

    Route::get('/admin/dashboard', fn() => view('pages.index'))->name('admin.dashboard');

    Route::delete('keluargakk/{keluargakk}', [KeluargaKKController::class, 'destroy'])->name('keluargakk.destroy');
    Route::delete('warga/{warga}', [WargaController::class, 'destroy'])->name('warga.destroy');
    Route::delete('anggota_keluarga/{anggota_keluarga}', [AnggotaKeluargaController::class, 'destroy'])->name('anggota_keluarga.destroy');
    Route::delete('peristiwa_kelahiran/{peristiwa_kelahiran}', [PeristiwaKelahiranController::class, 'destroy'])->name('peristiwa_kelahiran.destroy');
    Route::delete('peristiwa_kematian/{peristiwa_kematian}', [PeristiwaKematianController::class, 'destroy'])->name('peristiwa_kematian.destroy');
    Route::delete('peristiwa_pindah/{peristiwa_pindah}', [PeristiwaPindahController::class, 'destroy'])->name('peristiwa_pindah.destroy');

    Route::resource('user', UserController::class);
});
