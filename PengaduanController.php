<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Pengaduan;
use App\Models\Penerusan;
use App\Models\RiwayatStatus;
use App\Models\RtRw;
use App\Models\Seksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::with(['pelapor', 'kategori'])->latest('tgl_pengaduan');

        if ($request->filled('q')) {
            $q = $request->string('q')->toString();
            $query->where(function ($builder) use ($q) {
                $builder->where('no_tiket', 'like', "%{$q}%")
                    ->orWhere('judul', 'like', "%{$q}%");
            });
        }
        if ($request->filled('status')) $query->where('status', $request->status);
        if ($request->filled('prioritas')) $query->where('prioritas', $request->prioritas);

        $pengaduan = $query->paginate(12)->withQueryString();
        return view('petugas.pengaduan.index', compact('pengaduan'));
    }

    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load(['pelapor', 'kategori', 'lampiran', 'penerusans.petugas', 'riwayat.petugas']);
        return view('petugas.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'rtRws' => RtRw::orderBy('no_rw')->orderBy('no_rt')->get(),
            'seksis' => Seksi::orderBy('nama_seksi')->get(),
        ]);
    }

    public function forward(Request $request, Pengaduan $pengaduan)
    {
        $validated = $request->validate([
            'prioritas' => ['required', 'in:tinggi,sedang,rendah'],
            'batas_waktu' => ['required', 'date', 'after_or_equal:today'],
            'jenis_tujuan' => ['required', 'in:rt_rw,seksi'],
            'id_rt_rw' => ['required_if:jenis_tujuan,rt_rw', 'nullable', 'exists:rt_rw,id_rt_rw'],
            'id_seksi' => ['required_if:jenis_tujuan,seksi', 'nullable', 'exists:seksi,id_seksi'],
            'catatan' => ['required', 'string', 'min:5', 'max:2000'],
        ], [
            'id_rt_rw.required_if' => 'Pilih RT/RW tujuan.',
            'id_seksi.required_if' => 'Pilih seksi tujuan.',
            'batas_waktu.after_or_equal' => 'Batas waktu tidak boleh sebelum hari ini.',
        ]);

        DB::transaction(function () use ($validated, $pengaduan) {
            $pengaduan->prioritas = $validated['prioritas'];
            $pengaduan->batas_waktu = $validated['batas_waktu'];
            $pengaduan->status = 'diteruskan';
            $pengaduan->save();

            Penerusan::create([
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'id_petugas' => auth()->user()->id_pengguna,
                'jenis_tujuan' => $validated['jenis_tujuan'],
                'id_rt_rw' => $validated['jenis_tujuan'] === 'rt_rw' ? $validated['id_rt_rw'] : null,
                'id_seksi' => $validated['jenis_tujuan'] === 'seksi' ? $validated['id_seksi'] : null,
                'catatan' => $validated['catatan'],
                'tgl_penerusan' => now(),
            ]);

            RiwayatStatus::create([
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'id_petugas' => auth()->user()->id_pengguna,
                'status' => 'diteruskan',
                'keterangan' => 'Pengaduan diteruskan. Prioritas: ' . ucfirst($validated['prioritas']) . '. Catatan: ' . $validated['catatan'],
                'tgl_perubahan' => now(),
            ]);

            // Pelapor menerima pemberitahuan bahwa pengaduannya telah diteruskan.
            Notifikasi::create([
                'id_penerima' => $pengaduan->id_pelapor,
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'jenis' => 'penerusan',
                'pesan' => 'Pengaduan ' . $pengaduan->no_tiket . ' telah diteruskan untuk ditangani.',
                'status_baca' => 'belum_dibaca',
                'tgl_kirim' => now(),
            ]);
        });

        return redirect()->route('petugas.pengaduan.show', $pengaduan)
            ->with('success', 'Prioritas dan penerusan pengaduan berhasil disimpan.');
    }
}
