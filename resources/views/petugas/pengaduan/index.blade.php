<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Pengaduan - SIPMAS</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #263b50;
            font-size: 14px;
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
        }

        /* =====================================================
           BRAND
        ===================================================== */

        .brand {
            display: flex;
            align-items: center;

            gap: 13px;

            padding: 0 14px 25px;

            border-bottom: 1px solid rgba(255,255,255,0.14);
        }

        .brand-logo {
            width: 42px;
            height: 42px;

            background: white;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #376d9e;

            font-size: 20px;
            font-weight: bold;
        }

        .brand-text strong {
            display: block;

            color: white;

            font-size: 21px;

            line-height: 1.1;
        }

        .brand-text small {
            display: block;

            color: #b8c8d6;

            font-size: 10px;

            margin-top: 5px;
        }

        /* =====================================================
           MENU
        ===================================================== */

        .menu-title {
            margin: 35px 14px 16px;

            color: #8298aa;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 0.3px;
        }

        .menu {
            display: flex;

            flex-direction: column;

            gap: 7px;
        }

        .menu a {
            min-height: 50px;

            padding: 0 14px;

            border-radius: 8px;

            display: flex;

            align-items: center;

            gap: 12px;

            color: #b7c6d3;

            text-decoration: none;

            font-size: 15px;

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
            width: 23px;

            text-align: center;

            font-size: 19px;

            color: #b9cbd9;
        }

        .menu a.active .menu-icon {
            color: white;
        }

        .menu-label {
            flex: 1;

            line-height: 1.25;
        }

        /* =====================================================
           BADGE
        ===================================================== */

        .badge {
            width: 20px;
            height: 20px;

            border-radius: 50%;

            background: #ef5962;

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 10px;

            font-weight: bold;
        }

        /* =====================================================
           PROFILE
        ===================================================== */

        .profile {
            margin: 70px 8px 0;

            padding-top: 15px;

            border-top: 1px solid rgba(255,255,255,0.14);

            display: flex;

            align-items: center;

            gap: 11px;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #376fa2;

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 11px;

            font-weight: 600;
        }

        .profile-info {
            display: flex;

            flex-direction: column;

            gap: 4px;
        }

        .profile-info strong {
            color: white;

            font-size: 13px;

            font-weight: 600;
        }

        .profile-info span {
            color: #9db0c1;

            font-size: 11px;
        }

        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-form {
            margin: 20px 8px 10px;
        }

        .logout-btn {
            border: none;

            background: transparent;

            color: #9fb1c0;

            font-size: 12px;

            cursor: pointer;

            padding: 0;
        }

        .logout-btn span {
            margin-right: 6px;

            font-size: 16px;
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

            padding: 22px 24px 45px;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .topbar {
            min-height: 60px;

            display: flex;

            justify-content: space-between;

            align-items: flex-start;
        }

        .breadcrumb {
            font-size: 10px;

            color: #9aa8b5;

            margin-bottom: 5px;
        }

        .breadcrumb span {
            color: #3678b2;
        }

        .page-title {
            font-size: 20px;

            color: #263c52;

            font-weight: 700;
        }

        /* =====================================================
           SEARCH
        ===================================================== */

        .search {
            width: 220px;

            height: 35px;

            background: white;

            border: 1px solid #dfe6ed;

            border-radius: 6px;

            display: flex;

            align-items: center;

            padding: 0 11px;

            color: #a5b0bc;

            font-size: 10px;
        }

        .search-icon {
            margin-right: 7px;

            font-size: 15px;
        }

        .search input {
            width: 100%;

            border: none;

            outline: none;

            font-size: 10px;

            color: #263c52;
        }

        .search input::placeholder {
            color: #a5b0bc;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding-top: 15px;
        }

        /* =====================================================
           VERIFICATION GRID
        ===================================================== */

        .verification-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1.65fr)
                minmax(280px, .9fr);

            gap: 18px;

            align-items: start;
        }

        /* =====================================================
           CARD
        ===================================================== */

        .complaint-card,
        .verification-card {
            background: white;

            border: 1px solid #e1e7ed;

            border-radius: 7px;

            box-shadow: 0 2px 7px rgba(30,70,100,.04);
        }

        /* =====================================================
           DETAIL PENGADUAN
        ===================================================== */

        .complaint-card {
            padding: 20px;
        }

        .complaint-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 12px;
        }

        .ticket {
            color: #316a9f;

            font-size: 11px;

            font-weight: 700;
        }

        .status-badge {
            padding: 5px 9px;

            background: #e3edf8;

            color: #356d9f;

            border-radius: 5px;

            font-size: 8px;

            font-weight: 600;
        }

        .complaint-title {
            margin: 0 0 18px;

            color: #263d54;

            font-size: 20px;

            line-height: 1.25;

            font-weight: 700;
        }

        /* =====================================================
           INFORMASI
        ===================================================== */

        .information-grid {
            display: grid;

            grid-template-columns:
                1fr
                1fr
                1fr;

            gap: 18px;

            margin-bottom: 18px;
        }

        .info-label {
            margin-bottom: 5px;

            color: #98a6b4;

            font-size: 8px;
        }

        .info-value {
            color: #263d54;

            font-size: 10px;

            font-weight: 600;

            line-height: 1.4;
        }

        /* =====================================================
           URAIAN
        ===================================================== */

        .description {
            margin-bottom: 15px;
        }

        .description-label {
            margin-bottom: 5px;

            color: #98a6b4;

            font-size: 8px;
        }

        .description-text {
            color: #516579;

            font-size: 9px;

            line-height: 1.5;

            word-break: break-word;
        }

        /* =====================================================
           FOTO
        ===================================================== */

        .photos {
            display: flex;

            gap: 7px;

            margin-top: 12px;
        }

        .photo {
            width: 54px;

            height: 54px;

            border-radius: 6px;

            background:
                linear-gradient(
                    135deg,
                    #b7d8e9,
                    #5f94b9
                );

            border: 1px solid #d6e2eb;
        }

        .photo.second {
            background:
                linear-gradient(
                    135deg,
                    #c6dfa9,
                    #83ae67
                );
        }

        /* =====================================================
           VERIFIKASI
        ===================================================== */

        .verification-card {
            padding: 20px;
        }

        .verification-title {
            margin: 0 0 17px;

            color: #263d54;

            font-size: 14px;

            font-weight: 700;
        }

        /* =====================================================
           CHECKLIST
        ===================================================== */

        .check-list {
            display: flex;

            flex-direction: column;

            gap: 10px;

            margin-bottom: 15px;
        }

        .check-item {
            display: flex;

            align-items: center;

            gap: 8px;

            color: #516579;

            font-size: 9px;

            cursor: pointer;
        }

        .check-item input {
            width: 12px;
            height: 12px;

            cursor: pointer;

            accent-color: #356b9d;
        }

        /* =====================================================
           HASIL VERIFIKASI
        ===================================================== */

        .result-title {
            margin-bottom: 8px;

            color: #516579;

            font-size: 9px;

            font-weight: 600;
        }

        .result-options {
            display: flex;

            gap: 6px;

            margin-bottom: 15px;
        }

        .result-btn {
            height: 28px;

            padding: 0 12px;

            border-radius: 5px;

            border: 1px solid #dce4ec;

            background: white;

            color: #3970a2;

            font-size: 8px;

            cursor: pointer;
        }

        .result-btn.active {
            background: #356b9d;

            border-color: #356b9d;

            color: white;
        }

        /* =====================================================
           ACTION BUTTON
        ===================================================== */

        .action-buttons {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 8px;
        }

        .btn {
            height: 34px;

            border: none;

            border-radius: 5px;

            color: white;

            font-size: 9px;

            font-weight: 600;

            cursor: pointer;
        }

        .btn-verifikasi {
            background: #15965f;
        }

        .btn-verifikasi:hover {
            background: #117e50;
        }

        .btn-tolak {
            background: #d9342f;
        }

        .btn-tolak:hover {
            background: #b92b27;
        }

        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-card {
            background: white;

            border: 1px solid #e1e7ed;

            border-radius: 7px;

            padding: 60px 30px;

            text-align: center;

            color: #8fa2b3;
        }

        .empty-card h3 {
            margin-bottom: 8px;

            color: #263d54;

            font-size: 16px;
        }

        .empty-card p {
            font-size: 10px;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .sidebar {
                width: 240px;
            }

            .main {
                margin-left: 240px;
            }

            .verification-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                flex-direction: column;

                gap: 12px;
            }

            .search {
                width: 100%;
            }

            .information-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }

            body {
                font-size: 15px;
            }

            .breadcrumb {
                font-size: 12px;
            }

            .page-title {
                font-size: 28px;
            }

            .search {
                font-size: 13px;
            }

            .verification-title {
                font-size: 19px;
            }

            .complaint-title {
                font-size: 25px;
            }

            .check-item {
                font-size: 13px;
            }

            .result-title {
                font-size: 13px;
            }

            .result-btn {
                font-size: 12px;
            }

            .btn {
                font-size: 13px;
            }
        }

    </style>
</head>

<body>

@php

    /*
    |--------------------------------------------------------------------------
    | Ambil pengaduan yang akan diverifikasi
    |--------------------------------------------------------------------------
    */

    $data = null;
    $jumlahPengaduan = 0;

    if (isset($pengaduan)) {

        /*
        | Controller menggunakan ->get(),
        | jadi $pengaduan adalah Collection.
        */

        if ($pengaduan instanceof \Illuminate\Support\Collection) {

            $jumlahPengaduan = $pengaduan->count();

            /*
            | Prioritaskan pengaduan dengan status diajukan.
            */

            $data = $pengaduan
                ->firstWhere('status', 'diajukan');

            /*
            | Kalau tidak ada status diajukan,
            | ambil pengaduan pertama.
            */

            if (!$data) {
                $data = $pengaduan->first();
            }

        } else {

            /*
            | Pengaman kalau suatu saat controller
            | mengirim satu object saja.
            */

            $data = $pengaduan;

            $jumlahPengaduan = $data ? 1 : 0;
        }
    }

@endphp


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">

    <!-- BRAND -->

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

        <a href="{{ route('petugas.dashboard') }}">

            <span class="menu-icon">
                ▦
            </span>

            <span class="menu-label">
                Dashboard
            </span>

        </a>


        <!-- PENGADUAN MASUK -->

        <a
            href="{{ route('petugas.pengaduan.index') }}"
            class="active"
        >

            <span class="menu-icon">
                ▱
            </span>

            <span class="menu-label">
                Pengaduan<br>Masuk
            </span>

            @if($jumlahPengaduan > 0)

                <span class="badge">
                    {{ $jumlahPengaduan }}
                </span>

            @endif

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

        <a href="{{ route('petugas.pengaduan.data') }}">
            <span class="menu-icon">▤</span>
            <span>Data Pengaduan</span>
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

        </a>

    </nav>


    <!-- PROFILE -->

    <div class="profile">

        <div class="profile-avatar">

            {{ strtoupper(substr(auth()->user()->nama_lengkap ?? 'BS', 0, 2)) }}

        </div>

        <div class="profile-info">

            <strong>
                {{ auth()->user()->nama_lengkap ?? 'Petugas SIPMAS' }}
            </strong>

            <span>
                Petugas
            </span>

        </div>

    </div>


    <!-- LOGOUT -->

    <form
        method="POST"
        action="{{ route('logout') }}"
        class="logout-form"
    >

        @csrf

        <button
            type="submit"
            class="logout-btn"
        >

            <span>←</span>
            Keluar

        </button>

    </form>

</aside>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- HEADER -->

    <header class="topbar">

        <div>

            <div class="breadcrumb">

                Petugas /

                <span>
                    Pengaduan Masuk
                </span>

            </div>

            <h1 class="page-title">
                Verifikasi Pengaduan
            </h1>

        </div>


        <!-- SEARCH -->

        <div class="search">

            <span class="search-icon">
                ⌕
            </span>

            <input
                type="text"
                placeholder="Cari nomor tiket / judul..."
            >

        </div>

    </header>


    <!-- CONTENT -->

    <section class="content">


        @if($data)

            <div class="verification-grid">


                <!-- =================================================
                     DETAIL PENGADUAN
                ================================================== -->

                <div class="complaint-card">


                    <!-- HEADER -->

                    <div class="complaint-header">

                        <div class="ticket">

                            {{ $data->no_tiket ?? 'SIPMAS-000000000000' }}

                        </div>


                        <div class="status-badge">

                            Diterima

                        </div>

                    </div>


                    <!-- JUDUL -->

                    <h2 class="complaint-title">

                        {{ $data->judul ?? '-' }}

                    </h2>


                    <!-- INFORMASI -->

                    <div class="information-grid">


                        <!-- PELAPOR -->

                        <div>

                            <div class="info-label">
                                Pelapor
                            </div>

                            <div class="info-value">

                                {{ $data->nama_pelapor ?? '-' }}

                            </div>

                        </div>


                        <!-- KATEGORI -->

                        <div>

                            <div class="info-label">
                                Kategori
                            </div>

                            <div class="info-value">

                                {{ $data->nama_kategori ?? '-' }}

                            </div>

                        </div>


                        <!-- LOKASI -->

                        <div>

                            <div class="info-label">
                                Lokasi
                            </div>

                            <div class="info-value">

                                {{ $data->lokasi_kejadian ?? '-' }}

                            </div>

                        </div>


                    </div>


                    <!-- URAIAN -->

                    <div class="description">

                        <div class="description-label">
                            Uraian
                        </div>

                        <div class="description-text">

                            {{ $data->uraian ?? '-' }}

                        </div>

                    </div>


                    <!-- FOTO -->

                    <div class="photos">

                        <div class="photo"></div>

                        <div class="photo second"></div>

                    </div>


                </div>


                <!-- =================================================
                     FORM VERIFIKASI
                ================================================== -->

                <div class="verification-card">


                    <h2 class="verification-title">
                        Verifikasi pengaduan
                    </h2>


                    <!-- CHECKLIST -->

                    <div class="check-list">


                        <label class="check-item">

                            <input
                                type="checkbox"
                                name="data_pelapor"
                            >

                            <span>
                                Data pelapor lengkap
                            </span>

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                name="lokasi_jelas"
                            >

                            <span>
                                Lokasi kejadian jelas
                            </span>

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                name="foto_sesuai"
                            >

                            <span>
                                Foto sesuai dengan uraian
                            </span>

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                name="wilayah_kelurahan"
                            >

                            <span>
                                Berada dalam wilayah kelurahan
                            </span>

                        </label>


                    </div>


                    <!-- HASIL -->

                    <div class="result-title">
                        Hasil verifikasi
                    </div>


                    <div class="result-options">

                        <button
                            type="button"
                            class="result-btn active"
                        >
                            Valid
                        </button>

                        <button
                            type="button"
                            class="result-btn"
                        >
                            Tidak valid
                        </button>

                    </div>


                    <!-- ACTION -->

                    <div class="action-buttons">

                        <button
                            type="button"
                            class="btn btn-verifikasi"
                        >
                            ✓ Verifikasi
                        </button>


                        <button
                            type="button"
                            class="btn btn-tolak"
                        >
                            × Tolak
                        </button>

                    </div>


                </div>

            </div>


        @else


            <!-- =================================================
                 TIDAK ADA PENGADUAN
            ================================================== -->

            <div class="empty-card">

                <h3>
                    Tidak ada pengaduan yang perlu diverifikasi
                </h3>

                <p>
                    Pengaduan baru akan muncul di halaman ini.
                </p>

            </div>


        @endif


    </section>

</main>

</body>
</html>