<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lampiran;
use App\Models\Pengaduan;
use App\Models\RtRw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function create(Request $request)
    {
        return view('warga.pengaduan.create', [
            'warga' => $request->user(),
            'kategoris' => Kategori::orderBy('nama_kategori')->get(),
            'rtRws' => RtRw::orderBy('no_rw')->orderBy('no_rt')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'id_kategori' => ['required', 'integer', 'exists:kategori,id_kategori'],
            'id_rt_rw' => ['required', 'integer', 'exists:rt_rw,id_rt_rw'],
            'lokasi_kejadian' => ['required', 'string', 'max:1000'],
            'uraian' => ['required', 'string', 'min:10', 'max:1000'],
            'lampiran' => ['nullable', 'array', 'max:3'],
            'lampiran.*' => ['file', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'judul.required' => 'Judul pengaduan wajib diisi.',
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'id_kategori.exists' => 'Kategori tidak ditemukan.',
            'id_rt_rw.required' => 'RT / RW lokasi wajib dipilih.',
            'id_rt_rw.exists' => 'RT / RW tidak ditemukan.',
            'lokasi_kejadian.required' => 'Lokasi kejadian wajib diisi.',
            'uraian.required' => 'Uraian pengaduan wajib diisi.',
            'uraian.min' => 'Uraian pengaduan minimal 10 karakter.',
            'uraian.max' => 'Uraian pengaduan maksimal 1000 karakter.',
            'lampiran.max' => 'Maksimal 3 foto yang dapat dilampirkan.',
            'lampiran.*.image' => 'Lampiran harus berupa gambar.',
            'lampiran.*.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'lampiran.*.max' => 'Ukuran setiap foto maksimal 2 MB.',
        ]);

        $pengaduan = DB::transaction(function () use ($request, $validated) {
            $pengaduan = Pengaduan::create([
                'no_tiket' => $this->generateTicketNumber(),
                'id_pelapor' => $request->user()->id_pengguna,
                'id_petugas_input' => null,
                'id_kategori' => $validated['id_kategori'],
                'id_rt_rw' => $validated['id_rt_rw'],
                'judul' => $validated['judul'],
                'uraian' => $validated['uraian'],
                'lokasi_kejadian' => $validated['lokasi_kejadian'],
                'sumber_pengaduan' => 'online',
                'status' => 'diajukan',
                'prioritas' => 'sedang',
                'tgl_pengaduan' => now(),
            ]);

            if ($request->hasFile('lampiran')) {
                foreach ($request->file('lampiran') as $file) {
                    $path = $file->store('pengaduan', 'public');

                    Lampiran::create([
                        'id_pengaduan' => $pengaduan->id_pengaduan,
                        'nama_file' => $file->getClientOriginalName(),
                        'path_file' => $path,
                        'tipe_file' => $file->getMimeType(),
                    ]);
                }
            }

            return $pengaduan;
        });

        return redirect()
            ->route('dashboard')
            ->with('success', 'Pengaduan berhasil dikirim. Nomor tiket Anda: ' . $pengaduan->no_tiket);
    }

    private function generateTicketNumber(): string
    {
        do {
            $number = 'PGD-' . now()->format('ymd') . '-' . strtoupper(Str::random(3));
        } while (Pengaduan::where('no_tiket', $number)->exists());

        return $number;
    }
}
