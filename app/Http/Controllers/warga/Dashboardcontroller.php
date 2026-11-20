<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $warga = $request->user();

        $pengaduanQuery = Pengaduan::query()
            ->where('id_pelapor', $warga->id_pengguna);

        $totalPengaduan = (clone $pengaduanQuery)->count();

        $sedangDiproses = (clone $pengaduanQuery)
            ->whereIn('status', ['diverifikasi', 'diproses', 'diteruskan'])
            ->count();

        $selesai = (clone $pengaduanQuery)
            ->where('status', 'selesai')
            ->count();

        $jumlahNotifikasi = Notifikasi::query()
            ->where('id_penerima', $warga->id_pengguna)
            ->where('status_baca', 'belum_dibaca')
            ->count();

        $pengaduanTerbaru = (clone $pengaduanQuery)
            ->with('kategori')
            ->latest('tgl_pengaduan')
            ->take(5)
            ->get();

        $notifikasiTerbaru = Notifikasi::query()
            ->where('id_penerima', $warga->id_pengguna)
            ->with('pengaduan')
            ->latest('tgl_kirim')
            ->take(5)
            ->get();

        return view('warga.dashboard', compact(
            'warga',
            'totalPengaduan',
            'sedangDiproses',
            'selesai',
            'jumlahNotifikasi',
            'pengaduanTerbaru',
            'notifikasiTerbaru'
        ));
    }
}
