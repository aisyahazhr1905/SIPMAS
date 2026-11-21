<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PENGADUAN MASUK / VERIFIKASI
    |--------------------------------------------------------------------------
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

        return view(
            'petugas.pengaduan.index',
            compact('pengaduan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DATA PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function dataPengaduan(Request $request)
    {
        $query = DB::table('pengaduan')
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
            );

        // Pencarian
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where(
                    'pengaduan.no_tiket',
                    'like',
                    '%' . $keyword . '%'
                )
                ->orWhere(
                    'pengaduan.judul',
                    'like',
                    '%' . $keyword . '%'
                )
                ->orWhere(
                    'pengguna.nama_lengkap',
                    'like',
                    '%' . $keyword . '%'
                );
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where(
                'pengaduan.status',
                $request->status
            );
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where(
                'pengaduan.id_kategori',
                $request->kategori
            );
        }

        $pengaduan = $query
            ->orderByDesc('pengaduan.created_at')
            ->get();

        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();

        return view(
            'petugas.pengaduan.data',
            compact(
                'pengaduan',
                'kategori'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ARSIP PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function arsip(Request $request)
    {
        $query = DB::table('pengaduan')
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
            ->whereIn(
                'pengaduan.status',
                [
                    'selesai',
                    'ditolak'
                ]
            );

        /*
        |--------------------------------------------------------------------------
        | PENCARIAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where(
                    'pengaduan.no_tiket',
                    'like',
                    '%' . $keyword . '%'
                )
                ->orWhere(
                    'pengaduan.judul',
                    'like',
                    '%' . $keyword . '%'
                )
                ->orWhere(
                    'pengguna.nama_lengkap',
                    'like',
                    '%' . $keyword . '%'
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER KATEGORI
        |--------------------------------------------------------------------------
        */

        if ($request->filled('kategori')) {
            $query->where(
                'pengaduan.id_kategori',
                $request->kategori
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('status') &&
            in_array(
                $request->status,
                [
                    'selesai',
                    'ditolak'
                ]
            )
        ) {
            $query->where(
                'pengaduan.status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tanggal')) {
            $query->whereDate(
                'pengaduan.tgl_pengaduan',
                $request->tanggal
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DATA ARSIP
        |--------------------------------------------------------------------------
        |
        | Gunakan paginate(), bukan get().
        | Karena halaman arsip menggunakan $arsip->total().
        |
        */

        $arsip = $query
            ->orderByDesc('pengaduan.updated_at')
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | DATA KATEGORI
        |--------------------------------------------------------------------------
        */

        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VIEW ARSIP
        |--------------------------------------------------------------------------
        */

        return view(
            'petugas.pengaduan.arsip',
            compact(
                'arsip',
                'kategori'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | INPUT PENGADUAN ATAS NAMA WARGA
    |--------------------------------------------------------------------------
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

        return view(
            'petugas.pengaduan.create',
            compact(
                'warga',
                'kategori'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelapor' => [
                'required',
                'exists:pengguna,id_pengguna'
            ],

            'id_kategori' => [
                'required',
                'exists:kategori,id_kategori'
            ],

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'uraian' => [
                'required',
                'string'
            ],

            'lokasi_kejadian' => [
                'required',
                'string',
                'max:255'
            ],

            'sumber_pengaduan' => [
                'required',
                'in:online,offline'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | NOMOR TIKET
        |--------------------------------------------------------------------------
        */

        $noTiket =
            'SIPMAS-' .
            now()->format('YmdHis');


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA
        |--------------------------------------------------------------------------
        */

        DB::table('pengaduan')->insert([
            'no_tiket' =>
                $noTiket,

            'id_pelapor' =>
                $validated['id_pelapor'],

            'id_petugas_input' =>
                auth()->user()->id_pengguna,

            'id_kategori' =>
                $validated['id_kategori'],

            'judul' =>
                $validated['judul'],

            'uraian' =>
                $validated['uraian'],

            'lokasi_kejadian' =>
                $validated['lokasi_kejadian'],

            'sumber_pengaduan' =>
                $validated['sumber_pengaduan'],

            'status' =>
                'diajukan',

            'prioritas' =>
                'sedang',

            'tgl_pengaduan' =>
                now()->toDateString(),

            'batas_waktu' =>
                now()->addDays(7)->toDateString(),

            'tgl_selesai' =>
                null,

            'created_at' =>
                now(),

            'updated_at' =>
                now(),
        ]);


        return redirect()
            ->route('petugas.pengaduan.index')
            ->with(
                'success',
                'Pengaduan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function verifikasi(
        Request $request,
        $id
    ) {
        $pengaduan = DB::table('pengaduan')
            ->where(
                'id_pengaduan',
                $id
            )
            ->first();


        if (!$pengaduan) {
            return redirect()
                ->route('petugas.pengaduan.index')
                ->with(
                    'error',
                    'Data pengaduan tidak ditemukan.'
                );
        }


        $validated = $request->validate([
            'hasil_verifikasi' => [
                'required',
                'in:valid,tidak_valid'
            ],

            'catatan_verifikasi' => [
                'nullable',
                'string'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | PENGADUAN VALID
        |--------------------------------------------------------------------------
        */

        if (
            $validated['hasil_verifikasi']
            === 'valid'
        ) {
            DB::table('pengaduan')
                ->where(
                    'id_pengaduan',
                    $id
                )
                ->update([
                    'status' =>
                        'diverifikasi',

                    'updated_at' =>
                        now(),
                ]);


            return redirect()
                ->route('petugas.pengaduan.index')
                ->with(
                    'success',
                    'Pengaduan berhasil diverifikasi.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | PENGADUAN TIDAK VALID
        |--------------------------------------------------------------------------
        */

        DB::table('pengaduan')
            ->where(
                'id_pengaduan',
                $id
            )
            ->update([
                'status' =>
                    'ditolak',

                'updated_at' =>
                    now(),
            ]);


        return redirect()
            ->route('petugas.pengaduan.index')
            ->with(
                'success',
                'Pengaduan berhasil ditolak.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | LAPORAN PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function laporan(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL PENGADUAN
        |--------------------------------------------------------------------------
        */

        $totalPengaduan =
            DB::table('pengaduan')
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL SELESAI
        |--------------------------------------------------------------------------
        */

        $totalSelesai =
            DB::table('pengaduan')
                ->where(
                    'status',
                    'selesai'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL DIPROSES
        |--------------------------------------------------------------------------
        */

        $totalDiproses =
            DB::table('pengaduan')
                ->whereIn(
                    'status',
                    [
                        'diverifikasi',
                        'diproses',
                        'diteruskan'
                    ]
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL DITOLAK
        |--------------------------------------------------------------------------
        */

        $totalDitolak =
            DB::table('pengaduan')
                ->where(
                    'status',
                    'ditolak'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RINGKASAN KATEGORI
        |--------------------------------------------------------------------------
        */

        $ringkasan = [];


        foreach ($kategori as $item) {

            $total =
                DB::table('pengaduan')
                    ->where(
                        'id_kategori',
                        $item->id_kategori
                    )
                    ->count();


            $selesai =
                DB::table('pengaduan')
                    ->where(
                        'id_kategori',
                        $item->id_kategori
                    )
                    ->where(
                        'status',
                        'selesai'
                    )
                    ->count();


            $diproses =
                DB::table('pengaduan')
                    ->where(
                        'id_kategori',
                        $item->id_kategori
                    )
                    ->whereIn(
                        'status',
                        [
                            'diverifikasi',
                            'diproses',
                            'diteruskan'
                        ]
                    )
                    ->count();


            $ditolak =
                DB::table('pengaduan')
                    ->where(
                        'id_kategori',
                        $item->id_kategori
                    )
                    ->where(
                        'status',
                        'ditolak'
                    )
                    ->count();


            $ringkasan[] = (object) [
                'nama_kategori' =>
                    $item->nama_kategori,

                'total' =>
                    $total,

                'selesai' =>
                    $selesai,

                'diproses' =>
                    $diproses,

                'ditolak' =>
                    $ditolak,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | GRAFIK PER BULAN
        |--------------------------------------------------------------------------
        */

        $grafik = [];


        for (
            $bulan = 1;
            $bulan <= 12;
            $bulan++
        ) {

            $total =
                DB::table('pengaduan')
                    ->whereMonth(
                        'tgl_pengaduan',
                        $bulan
                    )
                    ->count();


            $selesai =
                DB::table('pengaduan')
                    ->whereMonth(
                        'tgl_pengaduan',
                        $bulan
                    )
                    ->where(
                        'status',
                        'selesai'
                    )
                    ->count();


            $diproses =
                DB::table('pengaduan')
                    ->whereMonth(
                        'tgl_pengaduan',
                        $bulan
                    )
                    ->whereIn(
                        'status',
                        [
                            'diverifikasi',
                            'diproses',
                            'diteruskan'
                        ]
                    )
                    ->count();


            $grafik[] = (object) [
                'bulan' =>
                    $bulan,

                'total' =>
                    $total,

                'selesai' =>
                    $selesai,

                'diproses' =>
                    $diproses,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | VIEW LAPORAN
        |--------------------------------------------------------------------------
        */

        return view(
            'petugas.pengaduan.laporan',
            compact(
                'totalPengaduan',
                'totalSelesai',
                'totalDiproses',
                'totalDitolak',
                'ringkasan',
                'grafik'
            )
        );
    }
}