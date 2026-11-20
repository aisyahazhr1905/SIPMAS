
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class WargaController extends Controller
{
    public function dashboard()
    {
        // Mengambil data warga yang sedang login
        $warga = Auth::user();

        // Mengambil pengaduan berdasarkan ID warga
        $pengaduan = Pengaduan::where(
            'id_pelapor',
            $warga->id_pengguna
        );

        // Menghitung seluruh pengaduan warga
        $totalPengaduan = (clone $pengaduan)->count();

        // Menghitung pengaduan yang baru diajukan
        $pengaduanDiajukan = (clone $pengaduan)
            ->where('status', 'diajukan')
            ->count();

        // Menghitung pengaduan yang sedang diproses
        $pengaduanDiproses = (clone $pengaduan)
            ->whereIn('status', [
                'diverifikasi',
                'diproses',
                'diteruskan'
            ])
            ->count();

        // Menghitung pengaduan yang sudah selesai
        $pengaduanSelesai = (clone $pengaduan)
            ->where('status', 'selesai')
            ->count();

        // Mengambil lima pengaduan terbaru
        $pengaduanTerbaru = (clone $pengaduan)
            ->orderByDesc('tgl_pengaduan')
            ->take(5)
            ->get();

        // Mengirim data ke halaman Dashboard Warga
        return view('warga.dashboard', compact(
            'warga',
            'totalPengaduan',
            'pengaduanDiajukan',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanTerbaru'
        ));
    }
}
