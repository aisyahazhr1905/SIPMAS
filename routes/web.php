<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\KategoriController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('home');
})->middleware('auth')->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/pengguna', [PenggunaController::class, 'index'])
        ->name('admin.pengguna.index');

    Route::get('/pengguna/create', [PenggunaController::class, 'create'])
        ->name('admin.pengguna.create');

    Route::post('/pengguna', [PenggunaController::class, 'store'])
        ->name('admin.pengguna.store');

    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])
        ->name('admin.pengguna.destroy');

    Route::get('/kategori', [KategoriController::class, 'index'])
        ->name('admin.kategori.index');

    Route::get('/kategori/create', [KategoriController::class, 'create'])
        ->name('admin.kategori.create');

    Route::post('/kategori', [KategoriController::class, 'store'])
        ->name('admin.kategori.store');
});