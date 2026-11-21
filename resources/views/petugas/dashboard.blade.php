<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - SIPMAS</title>

    <style>
        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #263b50;
            font-size: 15px;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 270px;
            height: 100vh;

            background: #12314a;
            color: white;

            padding: 30px 20px;

            z-index: 100;

            overflow-y: auto;
            overflow-x: hidden;

            display: flex;
            flex-direction: column;
        }


        /* LOGO */

        .brand {
            display: flex;
            align-items: center;

            gap: 13px;

            padding: 0 14px 25px;

            border-bottom: 1px solid rgba(255,255,255,0.14);

            flex-shrink: 0;
        }

        .brand-logo {
            width: 45px;
            height: 45px;

            background: white;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #376d9e;

            font-size: 21px;
            font-weight: bold;

            flex-shrink: 0;
        }

        .brand-text strong {
            display: block;

            color: white;

            font-size: 23px;

            line-height: 1.1;
        }

        .brand-text small {
            display: block;

            color: #b8c8d6;

            font-size: 11px;

            margin-top: 5px;
        }


        /* JUDUL MENU */

        .menu-title {
            margin: 35px 14px 16px;

            color: #8298aa;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: 0.4px;
        }


        /* MENU */

        .menu {
            display: flex;

            flex-direction: column;

            gap: 7px;
        }

        .menu a {
            min-height: 52px;

            padding: 0 14px;

            border-radius: 8px;

            display: flex;

            align-items: center;

            gap: 12px;

            color: #b7c6d3;

            text-decoration: none;

            font-size: 16px;

            transition: 0.2s;
        }

        .menu a:hover {
            background: #28587f;

            color: white;
        }

        .menu a.active {
            background: #376f9f;

            color: white;

            font-weight: 600;
        }

        .menu-icon {
            width: 24px;

            text-align: center;

            font-size: 20px;

            color: #b9cbd9;

            flex-shrink: 0;
        }

        .menu a.active .menu-icon {
            color: white;
        }

        .menu-label {
            flex: 1;

            line-height: 1.3;
        }


        /* BADGE */

        .badge {
            width: 22px;
            height: 22px;

            border-radius: 50%;

            background: #ef5962;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            font-weight: bold;

            flex-shrink: 0;
        }


        /* =====================================================
           PROFIL PETUGAS
        ===================================================== */

        .profile {
            margin-top: auto;

            padding: 20px 8px 0;

            border-top: 1px solid rgba(255,255,255,0.14);

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .profile-avatar {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: #376fa2;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 12px;

            font-weight: 600;

            flex-shrink: 0;
        }

        .profile-info {
            display: flex;

            flex-direction: column;

            gap: 4px;
        }

        .profile-info strong {
            color: white;

            font-size: 15px;

            font-weight: 600;
        }

        .profile-info span {
            color: #9db0c1;

            font-size: 13px;
        }


        /* LOGOUT */

        .logout-form {
            margin: 20px 8px 5px;
        }

        .logout-btn {
            border: none;

            background: transparent;

            color: #9fb1c0;

            font-size: 14px;

            cursor: pointer;

            padding: 0;
        }

        .logout-btn span {
            margin-right: 7px;

            font-size: 18px;
        }

        .logout-btn:hover {
            color: white;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 270px;

            min-height: 100vh;

            padding: 30px 34px 50px;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .topbar {
            min-height: 70px;

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 25px;
        }

        .breadcrumb {
            font-size: 13px;

            color: #8fa1b3;

            margin-bottom: 6px;
        }

        .page-title {
            font-size: 30px;

            color: #263c52;

            font-weight: 700;

            line-height: 1.2;
        }


        /* SEARCH */

        .search {
            width: 260px;

            height: 48px;

            background: white;

            border: 1px solid #dfe6ed;

            border-radius: 7px;

            display: flex;

            align-items: center;

            padding: 0 14px;

            color: #9ba9b7;

            font-size: 14px;

            flex-shrink: 0;
        }

        .search-icon {
            margin-right: 8px;

            font-size: 18px;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            min-height: 55px;

            background: #fff5df;

            border: 1px solid #f1d99f;

            border-radius: 7px;

            color: #a16c19;

            display: flex;

            align-items: center;

            padding: 0 18px;

            font-size: 14px;

            margin-bottom: 22px;
        }


        /* =====================================================
           STATISTIK
        ===================================================== */

        .stats {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 22px;
        }

        .stat {
            min-height: 108px;

            background: white;

            border: 1px solid #e1e7ed;

            border-radius: 9px;

            padding: 18px;

            display: flex;

            align-items: center;

            gap: 15px;
        }

        .stat-icon {
            width: 55px;
            height: 55px;

            border-radius: 10px;

            background: #e9f0f8;

            color: #3b71a3;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 22px;

            flex-shrink: 0;
        }

        .stat-icon.yellow {
            background: #fff2d4;

            color: #e2a62e;
        }

        .stat-icon.red {
            background: #ffe2e2;

            color: #dc5b62;
        }

        .stat-number {
            font-size: 30px;

            line-height: 1;

            font-weight: 700;

            color: #263d54;

            margin-bottom: 7px;
        }

        .stat-label {
            font-size: 14px;

            color: #8e9dac;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .card {
            background: white;

            border: 1px solid #e1e7ed;

            border-radius: 9px;

            overflow: hidden;
        }

        .card-header {
            min-height: 78px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 0 20px;

            border-bottom: 1px solid #edf1f5;

            gap: 15px;
        }

        .card-title {
            font-size: 20px;

            font-weight: 600;

            color: #2c4359;
        }

        .card-actions {
            display: flex;

            gap: 12px;

            align-items: center;
        }


        /* FILTER */

        .filter {
            height: 45px;

            border: 1px solid #dce4ec;

            background: white;

            border-radius: 7px;

            padding: 0 15px;

            color: #41647f;

            font-size: 13px;

            cursor: pointer;
        }


        /* BUTTON TAMBAH */

        .add {
            height: 45px;

            border: none;

            border-radius: 7px;

            background: #356b9d;

            color: white;

            padding: 0 18px;

            font-size: 13px;

            font-weight: 600;

            text-decoration: none;

            display: flex;

            align-items: center;

            white-space: nowrap;
        }

        .add:hover {
            background: #285c8c;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 950px;
        }

        th {
            height: 50px;

            padding: 0 16px;

            background: #fafbfd;

            color: #8797a7;

            font-size: 11px;

            text-align: left;

            text-transform: uppercase;

            font-weight: 600;

            white-space: nowrap;
        }

        td {
            height: 58px;

            padding: 0 16px;

            border-top: 1px solid #edf1f5;

            color: #516579;

            font-size: 14px;

            white-space: nowrap;
        }

        .ticket {
            color: #316a9f;

            font-weight: 700;

            font-size: 13px;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .pill {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 11px;
        }

        .priority-rendah {
            background: #d9f2e5;

            color: #287a58;
        }

        .priority-sedang {
            background: #fff0d0;

            color: #a87516;
        }

        .priority-tinggi {
            background: #ffdede;

            color: #d34e56;
        }

        .status-diajukan,
        .status-diverifikasi {
            background: #e3edf8;

            color: #356d9f;
        }

        .status-diproses {
            background: #fff0d1;

            color: #ad7516;
        }

        .status-diteruskan {
            background: #e8e4f7;

            color: #6656a0;
        }

        .status-selesai {
            background: #dff3e7;

            color: #287957;
        }

        .status-ditolak {
            background: #ffe0e0;

            color: #cc4d55;
        }

        .late {
            color: #e95258;

            font-weight: 600;
        }


        /* PROSES */

        .process {
            border: 1px solid #dce5ed;

            background: white;

            color: #3970a2;

            border-radius: 15px;

            padding: 7px 13px;

            font-size: 12px;

            cursor: pointer;
        }

        .process:hover {
            background: #f1f6fa;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination {
            height: 65px;

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 7px;

            padding: 0 18px;
        }

        .page {
            width: 34px;
            height: 34px;

            border: 1px solid #dce4ec;

            background: white;

            border-radius: 6px;

            color: #8c9baa;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 13px;
        }

        .page.active {
            background: #356b9d;

            border-color: #356b9d;

            color: white;
        }


        /* =====================================================
           SCROLLBAR SIDEBAR
        ===================================================== */

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #102d44;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #376f9f;
            border-radius: 10px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .main {
                padding-left: 25px;
                padding-right: 25px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }


        @media (max-width: 900px) {

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }

            .page-title {
                font-size: 27px;
            }

            .search {
                width: 220px;
            }
        }


        @media (max-width: 700px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;

                min-height: auto;

                overflow: visible;
            }

            .main {
                margin-left: 0;

                padding: 22px 18px 40px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                flex-direction: column;

                gap: 15px;
            }

            .search {
                width: 100%;
            }

            .page-title {
                font-size: 26px;
            }

            .card-header {
                align-items: flex-start;

                flex-direction: column;

                padding-top: 18px;

                padding-bottom: 18px;
            }

            .card-actions {
                width: 100%;

                flex-direction: column;

                align-items: stretch;
            }

            .filter,
            .add {
                width: 100%;

                justify-content: center;
            }

            .profile {
                margin-top: 40px;
            }

            .logout-form {
                margin-top: 18px;
            }
        }
    </style>
</head>

<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


        <!-- LOGO -->

        <div class="brand">

            <div class="brand-logo">
                ✥
            </div>

            <div class="brand-text">

                <strong>SIPMAS</strong>

                <small>
                    Kelurahan Sungai Bangek
                </small>

            </div>

        </div>


        <!-- MENU -->

        <div class="menu-title">
            PELAYANAN
        </div>


        <nav class="menu">


            <!-- DASHBOARD -->

            <a
                href="{{ route('petugas.dashboard') }}"
                class="active"
            >

                <span class="menu-icon">
                    ▦
                </span>

                <span class="menu-label">
                    Dashboard
                </span>

            </a>


            <!-- PENGADUAN MASUK -->

            <a href="{{ route('petugas.pengaduan.index') }}">

                <span class="menu-icon">
                    ▱
                </span>

                <span class="menu-label">
                    Pengaduan<br>Masuk
                </span>

                <span class="badge">
                    {{ $pengaduan->where('status', 'diajukan')->count() }}
                </span>

            </a>


            <!-- INPUT PENGADUAN -->

            <a href="{{ route('petugas.pengaduan.create') }}">

                <span class="menu-icon">
                    ⌑
                </span>

                <span class="menu-label">
                    Input Pengaduan
                </span>

            </a>


            <!-- DATA PENGADUAN -->

            <a href="{{ route('petugas.pengaduan.index') }}">

                <span class="menu-icon">
                    ▤
                </span>

                <span class="menu-label">
                    Data Pengaduan
                </span>

            </a>


            <!-- LAPORAN -->

            <a href="#">

                <span class="menu-icon">
                    ⌁
                </span>

                <span class="menu-label">
                    Laporan
                </span>

            </a>


            <!-- NOTIFIKASI -->

            <a href="#">

                <span class="menu-icon">
                    ♧
                </span>

                <span class="menu-label">
                    Notifikasi
                </span>

                <span class="badge">
                    3
                </span>

            </a>

        </nav>


        <!-- =================================================
             PROFIL PETUGAS
        ================================================== -->

        <div class="profile">

            <div class="profile-avatar">
                BS
            </div>

            <div class="profile-info">

                <strong>
                    Budi Santoso
                </strong>

                <span>
                    Petugas
                </span>

            </div>

        </div>


        <!-- LOGOUT -->

        <form
            action="{{ route('logout') }}"
            method="POST"
            class="logout-form"
        >

            @csrf

            <button
                type="submit"
                class="logout-btn"
            >

                <span>
                    →
                </span>

                Keluar

            </button>

        </form>

    </aside>


    <!-- =====================================================
         MAIN CONTENT
    ===================================================== -->

    <main class="main">


        <!-- HEADER -->

        <div class="topbar">

            <div>

                <div class="breadcrumb">
                    Petugas / Dashboard
                </div>

                <h1 class="page-title">
                    Dashboard Petugas
                </h1>

            </div>


            <div class="search">

                <span class="search-icon">
                    ⌕
                </span>

                <span>
                    Cari nomor tiket / judul...
                </span>

            </div>

        </div>


        <!-- ALERT -->

        <div class="alert">

            ⚠

            &nbsp;&nbsp;

            2 pengaduan melewati batas waktu dan belum ditindaklanjuti.

        </div>


        <!-- =================================================
             STATISTIK
        ================================================== -->

        <div class="stats">


            <!-- PENGADUAN BARU -->

            <div class="stat">

                <div class="stat-icon">
                    ✉
                </div>

                <div>

                    <div class="stat-number">
                        {{ $pengaduan->where('status', 'diajukan')->count() }}
                    </div>

                    <div class="stat-label">
                        Pengaduan baru
                    </div>

                </div>

            </div>


            <!-- PERLU VERIFIKASI -->

            <div class="stat">

                <div class="stat-icon">
                    ✓
                </div>

                <div>

                    <div class="stat-number">
                        {{ $pengaduan->where('status', 'diajukan')->count() }}
                    </div>

                    <div class="stat-label">
                        Perlu verifikasi
                    </div>

                </div>

            </div>


            <!-- SEDANG DIPROSES -->

            <div class="stat">

                <div class="stat-icon yellow">
                    ◷
                </div>

                <div>

                    <div class="stat-number">
                        {{ $pengaduan->where('status', 'diproses')->count() }}
                    </div>

                    <div class="stat-label">
                        Sedang diproses
                    </div>

                </div>

            </div>


            <!-- PRIORITAS TINGGI -->

            <div class="stat">

                <div class="stat-icon red">
                    ⚑
                </div>

                <div>

                    <div class="stat-number">
                        {{ $pengaduan->where('prioritas', 'tinggi')->count() }}
                    </div>

                    <div class="stat-label">
                        Prioritas tinggi
                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             PENGADUAN MASUK
        ================================================== -->

        <div class="card">


            <!-- CARD HEADER -->

            <div class="card-header">

                <div class="card-title">
                    Pengaduan masuk
                </div>


                <div class="card-actions">

                    <button
                        type="button"
                        class="filter"
                    >
                        Semua status ▾
                    </button>


                    <a
                        href="{{ route('petugas.pengaduan.create') }}"
                        class="add"
                    >
                        + Input Pengaduan Warga
                    </a>

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                No. Tiket
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Pelapor
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Prioritas
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Batas Waktu
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($pengaduan->take(5) as $item)

                            <tr>

                                <td>

                                    <span class="ticket">
                                        {{ $item->no_tiket }}
                                    </span>

                                </td>


                                <td>
                                    {{ \Illuminate\Support\Str::limit($item->judul, 30) }}
                                </td>


                                <td>
                                    {{ $item->nama_pelapor ?? '-' }}
                                </td>


                                <td>
                                    {{ $item->nama_kategori ?? '-' }}
                                </td>


                                <td>

                                    <span
                                        class="pill priority-{{ $item->prioritas }}"
                                    >
                                        {{ ucfirst($item->prioritas) }}
                                    </span>

                                </td>


                                <td>

                                    <span
                                        class="pill status-{{ $item->status }}"
                                    >
                                        {{ ucfirst($item->status) }}
                                    </span>

                                </td>


                                <td
                                    class="
                                    @if(
                                        $item->batas_waktu &&
                                        $item->batas_waktu < now()->toDateString() &&
                                        $item->status != 'selesai'
                                    )
                                        late
                                    @endif
                                    "
                                >

                                    @if($item->batas_waktu)

                                        {{
                                            \Carbon\Carbon::parse(
                                                $item->batas_waktu
                                            )->format('d M Y')
                                        }}

                                    @else

                                        -

                                    @endif

                                </td>


                                <td>

                                    <button
                                        type="button"
                                        class="process"
                                    >
                                        Proses
                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    style="
                                        text-align:center;
                                        padding:40px;
                                        font-size:14px;
                                    "
                                >

                                    Belum ada pengaduan masuk.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- PAGINATION -->

            <div class="pagination">

                <div class="page">
                    ‹
                </div>

                <div class="page active">
                    1
                </div>

                <div class="page">
                    2
                </div>

                <div class="page">
                    ›
                </div>

            </div>

        </div>

    </main>

</body>
</html>