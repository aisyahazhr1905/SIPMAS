<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::where('id_penerima', Auth::id())
            ->with('pengaduan')
            ->orderByDesc('tgl_kirim')
            ->get();

        $belumDibaca = $notifikasi->where('status_baca', 'belum_dibaca')->count();

        return view('warga.notifikasi.index', compact(
            'notifikasi',
            'belumDibaca'
        ));
    }

    public function baca($id)
    {
        $notifikasi = Notifikasi::where('id_penerima', Auth::id())
            ->findOrFail($id);

        $notifikasi->status_baca = 'dibaca';
        $notifikasi->save();

        if ($notifikasi->id_pengaduan) {
            return redirect()->route(
                'warga.pengaduan.show',
                $notifikasi->id_pengaduan
            );
        }

        return redirect()->route('warga.notifikasi.index');
    }

    public function bacaSemua()
    {
        Notifikasi::where('id_penerima', Auth::id())
            ->where('status_baca', 'belum_dibaca')
            ->update([
                'status_baca' => 'dibaca',
            ]);

        return redirect()
            ->route('warga.notifikasi.index')
            ->with('success', 'Semua notifikasi sudah ditandai dibaca.');
    }
}
