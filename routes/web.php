<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RtRwController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\SeksiController;

use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\PengaduanController;

use App\Http\Controllers\Warga\DashboardController as WargaDashboardController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| WARGA
|--------------------------------------------------------------------------
*/

Route::prefix('warga')
    ->middleware(['auth', 'role:warga'])
    ->group(function () {

        Route::get(
            '/dashboard',
            [WargaDashboardController::class, 'index']
        )->name('warga.dashboard');

    });


/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/

Route::prefix('petugas')
    ->middleware(['auth', 'role:petugas'])
    ->group(function () {

        Route::get(
            '/dashboard',
            [PetugasDashboardController::class, 'index']
        )->name('petugas.dashboard');


        // PENGADUAN MASUK
        Route::get(
            '/pengaduan',
            [PengaduanController::class, 'index']
        )->name('petugas.pengaduan.index');


        // DATA PENGADUAN
        Route::get(
            '/data-pengaduan',
            [PengaduanController::class, 'dataPengaduan']
        )->name('petugas.pengaduan.data');


        // ARSIP PENGADUAN
        Route::get(
            '/arsip-pengaduan',
            [PengaduanController::class, 'arsip']
        )->name('petugas.pengaduan.arsip');


        // LAPORAN
        Route::get(
            '/laporan',
            [PengaduanController::class, 'laporan']
        )->name('petugas.laporan');


        // INPUT PENGADUAN
        Route::get(
            '/pengaduan/create',
            [PengaduanController::class, 'create']
        )->name('petugas.pengaduan.create');


        Route::post(
            '/pengaduan',
            [PengaduanController::class, 'store']
        )->name('petugas.pengaduan.store');


        // VERIFIKASI
        Route::post(
            '/pengaduan/{id}/verifikasi',
            [PengaduanController::class, 'verifikasi']
        )->name('petugas.pengaduan.verifikasi');
    });


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');


        /*
        |--------------------------------------------------------------------------
        | PENGGUNA
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pengguna',
            [PenggunaController::class, 'index']
        )->name('admin.pengguna.index');

        Route::get(
            '/pengguna/create',
            [PenggunaController::class, 'create']
        )->name('admin.pengguna.create');

        Route::post(
            '/pengguna',
            [PenggunaController::class, 'store']
        )->name('admin.pengguna.store');

        Route::delete(
            '/pengguna/{id}',
            [PenggunaController::class, 'destroy']
        )->name('admin.pengguna.destroy');


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/kategori',
            [KategoriController::class, 'index']
        )->name('admin.kategori.index');

        Route::get(
            '/kategori/create',
            [KategoriController::class, 'create']
        )->name('admin.kategori.create');

        Route::post(
            '/kategori',
            [KategoriController::class, 'store']
        )->name('admin.kategori.store');


        /*
        |--------------------------------------------------------------------------
        | RT RW
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/rt-rw',
            [RtRwController::class, 'index']
        )->name('admin.rt_rw.index');

        Route::get(
            '/rt-rw/create',
            [RtRwController::class, 'create']
        )->name('admin.rt_rw.create');

        Route::post(
            '/rt-rw',
            [RtRwController::class, 'store']
        )->name('admin.rt_rw.store');

        Route::get(
            '/rt-rw/{id}/edit',
            [RtRwController::class, 'edit']
        )->name('admin.rt_rw.edit');

        Route::put(
            '/rt-rw/{id}',
            [RtRwController::class, 'update']
        )->name('admin.rt_rw.update');

        Route::delete(
            '/rt-rw/{id}',
            [RtRwController::class, 'destroy']
        )->name('admin.rt_rw.destroy');


        /*
        |--------------------------------------------------------------------------
        | BACKUP
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/backup',
            [BackupController::class, 'index']
        )->name('admin.backup.index');

        Route::post(
            '/backup',
            [BackupController::class, 'backup']
        )->name('admin.backup.create');

        Route::get(
            '/backup/download/{filename}',
            [BackupController::class, 'download']
        )->name('admin.backup.download');

        Route::delete(
            '/backup/{filename}',
            [BackupController::class, 'destroy']
        )->name('admin.backup.destroy');

        Route::post(
            '/backup/restore',
            [BackupController::class, 'restore']
        )->name('admin.backup.restore');


        /*
        |--------------------------------------------------------------------------
        | SEKSI
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/seksi',
            [SeksiController::class, 'index']
        )->name('admin.seksi.index');

        Route::get(
            '/seksi/create',
            [SeksiController::class, 'create']
        )->name('admin.seksi.create');

        Route::post(
            '/seksi',
            [SeksiController::class, 'store']
        )->name('admin.seksi.store');

        Route::get(
            '/seksi/{id}/edit',
            [SeksiController::class, 'edit']
        )->name('admin.seksi.edit');

        Route::put(
            '/seksi/{id}',
            [SeksiController::class, 'update']
        )->name('admin.seksi.update');

        Route::delete(
            '/seksi/{id}',
            [SeksiController::class, 'destroy']
        )->name('admin.seksi.destroy');

    });