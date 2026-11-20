
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class WargaController extends Controller
{
    public function dashboard()
    {
        $warga = Auth::user();

        $pengaduan = Pengaduan::where(
            'id_pelapor',
            $warga->id_pengguna
        );

        $totalPengaduan = (clone $pengaduan)->count();

        $pengaduanDiajukan = (clone $pengaduan)
            ->where('status', 'diajukan')
            ->count();

        $pengaduanDiproses = (clone $pengaduan)
            ->whereIn('status', [
                'diverifikasi',
                'diproses',
                'diteruskan'
            ])
            ->count();

        $pengaduanSelesai = (clone $pengaduan)
            ->where('status', 'selesai')
            ->count();

        $pengaduanTerbaru = (clone $pengaduan)
            ->orderByDesc('tgl_pengaduan')
            ->take(5)
            ->get();

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
