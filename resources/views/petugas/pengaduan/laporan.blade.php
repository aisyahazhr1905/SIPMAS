<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan Pengaduan - SIPMAS</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f3f7fb;

            color: #29435c;

            font-size: 14px;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            width: 270px;

            background: #12314a;

            color: white;

            padding: 28px 20px;

            overflow-y: auto;

            z-index: 100;
        }


        .brand {

            padding: 0 10px 22px;

            border-bottom:
                1px solid
                rgba(255,255,255,.12);
        }


        .brand-name {

            font-size: 22px;

            font-weight: 700;

            color: white;
        }


        .brand-subtitle {

            margin-top: 4px;

            font-size: 9px;

            line-height: 1.5;

            color: #aebfcd;
        }


        .menu-title {

            margin:
                28px 10px 12px;

            color: #8097aa;

            font-size: 10px;

            text-transform: uppercase;
        }


        .menu {

            display: flex;

            flex-direction: column;

            gap: 5px;
        }


        .menu a {

            min-height: 42px;

            padding: 0 10px;

            border-radius: 7px;

            display: flex;

            align-items: center;

            gap: 10px;

            color: #c0cfda;

            text-decoration: none;

            font-size: 13px;

            transition: .2s;
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

            width: 20px;

            text-align: center;

            font-size: 16px;
        }


        .badge {

            margin-left: auto;

            min-width: 18px;

            height: 18px;

            padding: 0 5px;

            border-radius: 5px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ff7777;

            color: white;

            font-size: 9px;

            font-weight: 700;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .sidebar-bottom {

            position: absolute;

            left: 20px;
            right: 20px;
            bottom: 20px;

            padding-top: 14px;

            border-top:
                1px solid
                rgba(255,255,255,.10);
        }


        .profile {

            display: flex;

            align-items: center;

            gap: 8px;
        }


        .profile-avatar {

            width: 28px;

            height: 28px;

            border-radius: 50%;

            background: #2b6797;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 9px;

            font-weight: bold;
        }


        .profile-name {

            font-size: 9px;

            font-weight: bold;
        }


        .profile-role {

            margin-top: 2px;

            color: #aebfcd;

            font-size: 8px;
        }


        .logout {

            margin-top: 9px;

            background: none;

            border: 0;

            padding: 0;

            color: #aebfcd;

            cursor: pointer;

            font-size: 9px;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 270px;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 43px;

            background: white;

            border-top:
                3px solid
                #1687df;

            border-bottom:
                1px solid
                #e3ebf2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 24px;
        }


        .breadcrumb {

            font-size: 9px;

            color: #7f96aa;
        }


        .search-box {

            width: 220px;

            height: 31px;

            border:
                1px solid
                #d9e5ef;

            border-radius: 5px;

            display: flex;

            align-items: center;

            gap: 7px;

            padding: 0 9px;
        }


        .search-box span {

            color: #6d8ba5;

            font-size: 13px;
        }


        .search-box input {

            border: 0;

            outline: none;

            width: 100%;

            font-size: 9px;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            padding: 18px 22px 40px;
        }


        .page-title {

            font-size: 24px;

            color: #173b61;

            font-weight: 700;
        }


        .page-subtitle {

            margin-top: 4px;

            color: #7d98b1;

            font-size: 11px;
        }


        /* =====================================================
           STAT CARDS
        ===================================================== */

        .stats {

            margin-top: 15px;

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 12px;
        }


        .stat-card {

            min-height: 68px;

            background: white;

            border:
                1px solid
                #dce8f2;

            border-radius: 7px;

            padding: 11px;

            display: flex;

            align-items: center;

            gap: 10px;

            box-shadow:
                0 1px 3px
                rgba(30,60,90,.03);
        }


        .stat-icon {

            width: 34px;

            height: 34px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 16px;

            flex-shrink: 0;
        }


        .icon-blue {
            background: #0879e5;
        }


        .icon-green {
            background: #22b573;
        }


        .icon-orange {
            background: #ff9f19;
        }


        .icon-red {
            background: #ff3d3d;
        }


        .stat-label {

            color: #58718a;

            font-size: 9px;

            font-weight: 600;
        }


        .stat-number {

            margin-top: 2px;

            font-size: 21px;

            line-height: 1;

            color: #173b61;

            font-weight: 700;
        }


        .stat-description {

            margin-top: 4px;

            color: #9aafc0;

            font-size: 7px;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-card {

            margin-top: 12px;

            background: white;

            border:
                1px solid
                #dce8f2;

            border-radius: 7px;

            padding: 12px;

            display: grid;

            grid-template-columns:
                1.1fr
                1fr
                1fr
                auto;

            gap: 10px;

            align-items: end;
        }


        .filter-group label {

            display: block;

            margin-bottom: 5px;

            font-size: 9px;

            color: #516c85;

            font-weight: 700;
        }


        .filter-group input,
        .filter-group select {

            width: 100%;

            height: 32px;

            border:
                1px solid
                #d5e2ed;

            border-radius: 5px;

            padding: 0 9px;

            outline: none;

            background: white;

            color: #58718a;

            font-size: 9px;
        }


        .filter-button {

            height: 32px;

            border: 0;

            border-radius: 5px;

            background: #123b61;

            color: white;

            padding: 0 16px;

            cursor: pointer;

            font-size: 9px;

            font-weight: 600;
        }


        .filter-button:hover {

            background: #1b5685;
        }


        /* =====================================================
           REPORT GRID
        ===================================================== */

        .report-grid {

            margin-top: 12px;

            display: grid;

            grid-template-columns:
                1.45fr
                .9fr;

            gap: 12px;
        }


        .card {

            background: white;

            border:
                1px solid
                #dce8f2;

            border-radius: 7px;

            padding: 12px;
        }


        .card-title {

            font-size: 11px;

            font-weight: 700;

            color: #254968;

            margin-bottom: 12px;
        }


        /* =====================================================
           BAR CHART
        ===================================================== */

        .chart {

            height: 145px;

            display: flex;

            align-items: flex-end;

            gap: 14px;

            padding:
                10px 8px 22px;

            border-bottom:
                1px solid
                #dbe6ef;
        }


        .chart-item {

            flex: 1;

            height: 100%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: flex-end;

            position: relative;
        }


        .bar-value {

            margin-bottom: 3px;

            color: #607b94;

            font-size: 7px;
        }


        .bar {

            width: 23px;

            min-height: 4px;

            border-radius:
                3px 3px 0 0;

            background: #278be3;
        }


        .bar-label {

            position: absolute;

            bottom: -19px;

            font-size: 7px;

            color: #718aa1;
        }


        /* =====================================================
           DISTRIBUTION
        ===================================================== */

        .distribution {

            display: flex;

            align-items: center;

            gap: 15px;

            min-height: 145px;
        }


        .donut {

            width: 105px;

            height: 105px;

            border-radius: 50%;

            background:
                conic-gradient(
                    #22b573 0deg,
                    #22b573
                        calc(
                            var(--selesai) * 1deg
                        ),
                    #2988e4
                        calc(
                            var(--selesai) * 1deg
                        ),
                    #2988e4
                        calc(
                            var(--selesai)
                            * 1deg
                            +
                            var(--diproses)
                            * 1deg
                        ),
                    #ff9f19
                        calc(
                            var(--selesai)
                            * 1deg
                            +
                            var(--diproses)
                            * 1deg
                        ),
                    #ff9f19 360deg
                );

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .donut-center {

            width: 61px;

            height: 61px;

            background: white;

            border-radius: 50%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;
        }


        .donut-center small {

            color: #8ba0b2;

            font-size: 7px;
        }


        .donut-center strong {

            color: #173b61;

            font-size: 14px;
        }


        .legend {

            display: flex;

            flex-direction: column;

            gap: 9px;
        }


        .legend-row {

            display: flex;

            align-items: center;

            gap: 6px;

            font-size: 8px;

            color: #60798f;
        }


        .legend-dot {

            width: 8px;

            height: 8px;

            border-radius: 50%;
        }


        .legend-total {

            margin-left: auto;

            font-weight: 700;

            color: #294b68;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary-card {

            margin-top: 12px;
        }


        .summary-table {

            width: 100%;

            border-collapse: collapse;
        }


        .summary-table th {

            background: #edf4fa;

            padding: 9px;

            color: #54718a;

            text-align: left;

            font-size: 8px;
        }


        .summary-table td {

            padding: 9px;

            border-bottom:
                1px solid
                #e3ebf2;

            color: #60798f;

            font-size: 8px;
        }


        .summary-table tr:last-child td {

            border-bottom: 0;
        }


        .category-name {

            color: #37658b;

            font-weight: 600;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 1000px) {

            .stats {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .filter-card {

                grid-template-columns:
                    1fr 1fr;
            }


            .report-grid {

                grid-template-columns: 1fr;
            }
        }


        @media(max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;
            }


            .sidebar-bottom {

                position: relative;

                left: auto;
                right: auto;
                bottom: auto;

                margin-top: 30px;
            }


            .main {

                margin-left: 0;
            }


            .stats {

                grid-template-columns: 1fr;
            }


            .filter-card {

                grid-template-columns: 1fr;
            }


            .top-search {

                display: none;
            }


            .content {

                padding: 18px 14px 30px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">


    <div class="brand">

        <div class="brand-name">
            SIPMAS
        </div>

        <div class="brand-subtitle">
            Sistem Pengaduan Masyarakat<br>
            Kelurahan Sungai Bangek
        </div>

    </div>


    <div class="menu-title">
        PELAYANAN
    </div>


    <nav class="menu">


        <a href="{{ route('petugas.dashboard') }}">

            <span class="menu-icon">
                ▦
            </span>

            <span>
                Dashboard
            </span>

        </a>


        <a href="{{ route('petugas.pengaduan.index') }}">

            <span class="menu-icon">
                ▱
            </span>

            <span>
                Pengaduan Masuk
            </span>

        </a>


        <a href="{{ route('petugas.pengaduan.create') }}">

            <span class="menu-icon">
                ⌑
            </span>

            <span>
                Input Pengaduan
            </span>

        </a>


        <a href="{{ route('petugas.pengaduan.data') }}">

            <span class="menu-icon">
                ▤
            </span>

            <span>
                Data Pengaduan
            </span>

        </a>


        <a href="{{ route('petugas.pengaduan.arsip') }}">

            <span class="menu-icon">
                ⌁
            </span>

            <span>
                Arsip Pengaduan
            </span>

        </a>


        <a
            href="{{ route('petugas.pengaduan.laporan') }}"
            class="active"
        >

            <span class="menu-icon">
                ▥
            </span>

            <span>
                Laporan
            </span>

        </a>


        <a href="#">

            <span class="menu-icon">
                ♧
            </span>

            <span>
                Notifikasi
            </span>

            <span class="badge">
                3
            </span>

        </a>


    </nav>


    <div class="sidebar-bottom">


        <div class="profile">

            <div class="profile-avatar">
                BS
            </div>

            <div>

                <div class="profile-name">
                    {{ auth()->user()->nama_lengkap ?? 'Petugas SIPMAS' }}
                </div>

                <div class="profile-role">
                    Petugas
                </div>

            </div>

        </div>


        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="logout"
            >
                ← Keluar
            </button>

        </form>


    </div>


</aside>



<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">


        <div class="breadcrumb">

            Petugas /
            <strong>Laporan Pengaduan</strong>

        </div>


        <div class="search-box">

            <span>
                ⌕
            </span>

            <input
                type="text"
                placeholder="Cari laporan, kategori, atau kata kunci..."
            >

        </div>


    </header>



    <!-- CONTENT -->

    <section class="content">


        <h1 class="page-title">
            Laporan Pengaduan
        </h1>


        <p class="page-subtitle">
            Rekapitulasi dan statistik pengaduan warga
        </p>



        <!-- =================================================
             STATISTIK
        ================================================== -->

        <div class="stats">


            <div class="stat-card">

                <div class="stat-icon icon-blue">
                    ▤
                </div>

                <div>

                    <div class="stat-label">
                        Total Pengaduan
                    </div>

                    <div class="stat-number">
                        {{ $totalPengaduan }}
                    </div>

                    <div class="stat-description">
                        Jumlah seluruh pengaduan masuk
                    </div>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon icon-green">
                    ✓
                </div>

                <div>

                    <div class="stat-label">
                        Selesai
                    </div>

                    <div class="stat-number">
                        {{ $totalSelesai }}
                    </div>

                    <div class="stat-description">
                        Pengaduan yang telah ditangani
                    </div>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon icon-orange">
                    ◷
                </div>

                <div>

                    <div class="stat-label">
                        Diproses
                    </div>

                    <div class="stat-number">
                        {{ $totalDiproses }}
                    </div>

                    <div class="stat-description">
                        Pengaduan dalam proses penanganan
                    </div>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon icon-red">
                    ×
                </div>

                <div>

                    <div class="stat-label">
                        Ditolak
                    </div>

                    <div class="stat-number">
                        {{ $totalDitolak }}
                    </div>

                    <div class="stat-description">
                        Pengaduan tidak dapat diproses
                    </div>

                </div>

            </div>


        </div>



        <!-- =================================================
             FILTER
        ================================================== -->

        <form
            method="GET"
            action="{{ route('petugas.pengaduan.laporan') }}"
            class="filter-card"
        >


            <div class="filter-group">

                <label>
                    Rentang Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    value="{{ $tanggalMulai }}"
                >

            </div>


            <div class="filter-group">

                <label>
                    Sampai
                </label>

                <input
                    type="date"
                    name="tanggal_selesai"
                    value="{{ $tanggalSelesai }}"
                >

            </div>


            <div class="filter-group">

                <label>
                    Kategori
                </label>

                <select name="kategori">

                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach($kategori as $item)

                        <option
                            value="{{ $item->id_kategori }}"
                            {{ request('kategori') == $item->id_kategori ? 'selected' : '' }}
                        >
                            {{ $item->nama_kategori }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="filter-group">

                <label>
                    Status
                </label>

                <select name="status">

                    <option value="">
                        Semua Status
                    </option>

                    <option
                        value="selesai"
                        {{ request('status') == 'selesai' ? 'selected' : '' }}
                    >
                        Selesai
                    </option>

                    <option
                        value="diproses"
                        {{ request('status') == 'diproses' ? 'selected' : '' }}
                    >
                        Diproses
                    </option>

                    <option
                        value="diteruskan"
                        {{ request('status') == 'diteruskan' ? 'selected' : '' }}
                    >
                        Diteruskan
                    </option>

                    <option
                        value="ditolak"
                        {{ request('status') == 'ditolak' ? 'selected' : '' }}
                    >
                        Ditolak
                    </option>

                    <option
                        value="diajukan"
                        {{ request('status') == 'diajukan' ? 'selected' : '' }}
                    >
                        Diajukan
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="filter-button"
            >
                ▥ &nbsp; Tampilkan Laporan
            </button>


        </form>



        <!-- =================================================
             GRAFIK
        ================================================== -->

        <div class="report-grid">


            <!-- GRAFIK BULANAN -->

            <div class="card">

                <div class="card-title">
                    ▥ &nbsp; Grafik Pengaduan per Bulan
                </div>


                @if(count($grafikBulan) > 0)

                    <div class="chart">

                        @php

                            $maxTotal = collect(
                                $grafikBulan
                            )->max('total');

                            if ($maxTotal < 1) {
                                $maxTotal = 1;
                            }

                        @endphp


                        @foreach($grafikBulan as $bulan)


                            <div class="chart-item">


                                <div class="bar-value">
                                    {{ $bulan['total'] }}
                                </div>


                                <div
                                    class="bar"
                                    style="
                                        height:
                                        {{ ($bulan['total'] / $maxTotal) * 110 }}px;
                                    "
                                >
                                </div>


                                <div class="bar-label">
                                    {{ substr($bulan['nama'], 0, 3) }}
                                </div>


                            </div>


                        @endforeach


                    </div>

                @else

                    <div
                        style="
                            height:145px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#91a5b6;
                            font-size:10px;
                        "
                    >
                        Belum ada data pengaduan pada periode ini.
                    </div>

                @endif

            </div>



            <!-- DISTRIBUSI -->

            @php

                $totalStatus =
                    $totalSelesai
                    +
                    $totalDiproses
                    +
                    $totalDitolak;

                if ($totalStatus == 0) {
                    $persenSelesai = 0;
                    $persenDiproses = 0;
                } else {
                    $persenSelesai =
                        ($totalSelesai / $totalStatus) * 360;

                    $persenDiproses =
                        ($totalDiproses / $totalStatus) * 360;
                }

            @endphp


            <div class="card">

                <div class="card-title">
                    ◔ &nbsp; Distribusi Status Pengaduan
                </div>


                <div class="distribution">


                    <div
                        class="donut"
                        style="
                            --selesai:
                            {{ $persenSelesai }};

                            --diproses:
                            {{ $persenDiproses }};
                        "
                    >

                        <div class="donut-center">

                            <small>
                                Total
                            </small>

                            <strong>
                                {{ $totalStatus }}
                            </strong>

                        </div>

                    </div>



                    <div class="legend">


                        <div class="legend-row">

                            <span
                                class="legend-dot"
                                style="
                                    background:#22b573;
                                "
                            ></span>

                            Selesai

                            <span class="legend-total">
                                {{ $totalSelesai }}
                            </span>

                        </div>


                        <div class="legend-row">

                            <span
                                class="legend-dot"
                                style="
                                    background:#2988e4;
                                "
                            ></span>

                            Diproses

                            <span class="legend-total">
                                {{ $totalDiproses }}
                            </span>

                        </div>


                        <div class="legend-row">

                            <span
                                class="legend-dot"
                                style="
                                    background:#ff9f19;
                                "
                            ></span>

                            Ditolak

                            <span class="legend-total">
                                {{ $totalDitolak }}
                            </span>

                        </div>


                    </div>


                </div>


            </div>


        </div>



        <!-- =================================================
             RINGKASAN
        ================================================== -->

        <div class="card summary-card">


            <div class="card-title">
                ▤ &nbsp; Ringkasan Laporan
            </div>


            <div
                style="
                    overflow-x:auto;
                "
            >

                <table class="summary-table">


                    <thead>

                        <tr>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Selesai
                            </th>

                            <th>
                                Diproses
                            </th>

                            <th>
                                Ditolak
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse(
                            $ringkasanKategori
                            as $item
                        )


                            <tr>

                                <td class="category-name">

                                    {{ $item->nama_kategori }}

                                </td>


                                <td>
                                    {{ $item->total }}
                                </td>


                                <td>
                                    {{ $item->selesai }}
                                </td>


                                <td>
                                    {{ $item->diproses }}
                                </td>


                                <td>
                                    {{ $item->ditolak }}
                                </td>

                            </tr>


                        @empty


                            <tr>

                                <td
                                    colspan="5"
                                    style="
                                        text-align:center;
                                        padding:25px;
                                        color:#91a5b6;
                                    "
                                >
                                    Belum ada data.
                                </td>

                            </tr>


                        @endforelse


                    </tbody>


                </table>

            </div>


        </div>


    </section>


</main>


</body>

</html>