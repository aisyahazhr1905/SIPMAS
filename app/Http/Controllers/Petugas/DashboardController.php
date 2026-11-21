<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan = DB::table('pengaduan')
            ->leftJoin(
                'pengguna',
                'pengaduan.id_pelapor',
                '=',
                'pengguna.id_pengguna'
            )
            ->leftJoin(
                'kategori',
                'pengaduan.id_kategori',
                '=',
                'kategori.id_kategori'
            )
            ->select(
                'pengaduan.*',
                'pengguna.nama_lengkap as nama_pelapor',
                'kategori.nama_kategori'
            )
            ->orderByDesc('pengaduan.created_at')
            ->get();

        return view('petugas.dashboard', compact('pengaduan'));
    }
}