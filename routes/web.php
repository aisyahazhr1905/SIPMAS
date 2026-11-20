<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RtRwController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\SeksiController;

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

    Route::get('/rt-rw', [RtRwController::class, 'index'])
        ->name('admin.rt_rw.index');

    Route::get('/rt-rw/create', [RtRwController::class, 'create'])
        ->name('admin.rt_rw.create');

    Route::post('/rt-rw', [RtRwController::class, 'store'])
        ->name('admin.rt_rw.store');

    Route::get('/rt-rw/{id}/edit', [RtRwController::class, 'edit'])
        ->name('admin.rt_rw.edit');

    Route::put('/rt-rw/{id}', [RtRwController::class, 'update'])
        ->name('admin.rt_rw.update');

    Route::delete('/rt-rw/{id}', [RtRwController::class, 'destroy'])
        ->name('admin.rt_rw.destroy');

    Route::get('/backup', [BackupController::class, 'index'])
        ->name('admin.backup.index');

    Route::post('/backup', [BackupController::class, 'backup'])
        ->name('admin.backup.create');

    Route::get('/backup/download/{filename}', [BackupController::class, 'download'])
        ->name('admin.backup.download');

    Route::delete('/backup/{filename}', [BackupController::class, 'destroy'])
        ->name('admin.backup.destroy');
    
    Route::post('/backup/restore', [BackupController::class, 'restore'])
        ->name('admin.backup.restore');

    Route::get('/seksi', [SeksiController::class, 'index'])
    ->name('admin.seksi.index');

    Route::get('/seksi/create', [SeksiController::class, 'create'])
        ->name('admin.seksi.create');

    Route::post('/seksi', [SeksiController::class, 'store'])
        ->name('admin.seksi.store');

    Route::get('/seksi/{id}/edit', [SeksiController::class, 'edit'])
        ->name('admin.seksi.edit');

    Route::put('/seksi/{id}', [SeksiController::class, 'update'])
        ->name('admin.seksi.update');

    Route::delete('/seksi/{id}', [SeksiController::class, 'destroy'])
        ->name('admin.seksi.destroy');
});