<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar pengaduan.
     */
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

        return view('petugas.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Menampilkan form input pengaduan atas nama warga.
     */
    public function create()
    {
        $warga = DB::table('pengguna')
            ->where('role', 'warga')
            ->where('status_akun', 'aktif')
            ->orderBy('nama_lengkap')
            ->get();

        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();

        return view('petugas.pengaduan.create', compact(
            'warga',
            'kategori'
        ));
    }

    /**
     * Menyimpan pengaduan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelapor' => 'required|exists:pengguna,id_pengguna',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'judul' => 'required|string|max:255',
            'uraian' => 'required|string',
            'lokasi_kejadian' => 'required|string|max:255',
            'sumber_pengaduan' => 'required|in:online,offline',
        ]);

        $noTiket = 'SIPMAS-' . now()->format('YmdHis');

        DB::table('pengaduan')->insert([
            'no_tiket' => $noTiket,
            'id_pelapor' => $validated['id_pelapor'],
            'id_petugas_input' => auth()->user()->id_pengguna,
            'id_kategori' => $validated['id_kategori'],
            'judul' => $validated['judul'],
            'uraian' => $validated['uraian'],
            'lokasi_kejadian' => $validated['lokasi_kejadian'],
            'sumber_pengaduan' => $validated['sumber_pengaduan'],

            // Sesuai enum database
            'status' => 'diajukan',
            'prioritas' => 'sedang',

            'tgl_pengaduan' => now()->toDateString(),
            'batas_waktu' => now()->addDays(7)->toDateString(),
            'tgl_selesai' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('petugas.pengaduan.index')
            ->with('success', 'Pengaduan berhasil ditambahkan.');
    }
}