<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\PengaduanController;

Route::middleware(['auth', 'role:petugas,admin,lurah'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{pengaduan}/teruskan', [PengaduanController::class, 'forward'])->name('pengaduan.forward');
});
