<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Data Pengaduan - SIPMAS</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #eef6ff;

            color: #244b6d;

            font-size: 13px;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            width: 270px;

            background: #103654;

            color: white;

            padding: 22px 18px;

            overflow-y: auto;
        }


        .brand {
            padding-bottom: 22px;
        }


        .brand-name {

            font-size: 22px;

            font-weight: 700;

            letter-spacing: .3px;
        }


        .brand-subtitle {

            margin-top: 5px;

            font-size: 8px;

            line-height: 1.5;

            color: #b9cddd;
        }


        .sidebar-line {

            height: 1px;

            background:
                rgba(255,255,255,.12);

            margin-bottom: 22px;
        }


        .menu-title {

            margin-bottom: 10px;

            font-size: 9px;

            text-transform: uppercase;

            color: #91a9bc;
        }


        .menu {

            display: flex;

            flex-direction: column;

            gap: 5px;
        }


        .menu a {

            height: 38px;

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 0 12px;

            border-radius: 6px;

            color: #e9f2f8;

            text-decoration: none;

            font-size: 13px;

            transition: .2s;
        }


        .menu a:hover {

            background:
                rgba(255,255,255,.08);
        }


        .menu a.active {

            background: #28699d;
        }


        .menu-icon {

            width: 19px;

            text-align: center;

            font-size: 15px;
        }


        .badge {

            margin-left: auto;

            min-width: 19px;

            height: 19px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ff7772;

            color: white;

            border-radius: 5px;

            font-size: 10px;
        }


        .sidebar-bottom {

            position: absolute;

            left: 18px;
            right: 18px;

            bottom: 22px;
        }


        .profile {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 15px;
        }


        .profile-avatar {

            width: 34px;
            height: 34px;

            border-radius: 50%;

            background: #39749f;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 10px;

            font-weight: 700;
        }


        .profile-name {

            font-size: 11px;

            font-weight: 600;
        }


        .profile-role {

            margin-top: 3px;

            font-size: 9px;

            color: #9eb5c7;
        }


        .logout {

            color: #a9bdcd;

            font-size: 11px;

            text-decoration: none;

            background: none;

            border: none;

            padding: 0;

            cursor: pointer;
        }


        /* =========================================
           MAIN
        ========================================= */

        .main {

            margin-left: 270px;

            min-height: 100vh;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {

            height: 58px;

            background: white;

            border-top: 2px solid #1593e6;

            border-bottom: 1px solid #e2edf6;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }


        .breadcrumb {

            font-size: 12px;

            color: #62819b;
        }


        .breadcrumb span {

            color: #176ca9;
        }


        .top-search {

            width: 220px;

            height: 36px;

            border: 1px solid #d6e4f2;

            border-radius: 6px;

            display: flex;

            align-items: center;

            padding: 0 11px;

            color: #8ba6bc;
        }


        .top-search span {

            margin-right: 7px;

            font-size: 15px;
        }


        .top-search input {

            width: 100%;

            border: 0;

            outline: none;

            font-size: 11px;
        }


        /* =========================================
           CONTENT
        ========================================= */

        .content {

            padding: 24px 28px 45px;
        }


        .title-area {

            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 22px;
        }


        .title-icon {

            width: 42px;

            height: 42px;

            border-radius: 9px;

            background: #4aa9f7;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;
        }


        .page-title {

            margin: 0;

            font-size: 25px;

            color: #123d69;
        }


        .page-subtitle {

            margin-top: 5px;

            color: #82a1bd;

            font-size: 12px;
        }


        /* =========================================
           FILTER
        ========================================= */

        .filter-card {

            background: white;

            border: 1px solid #dceaf6;

            border-radius: 8px;

            padding: 18px;

            margin-bottom: 18px;
        }


        .filter-grid {

            display: grid;

            grid-template-columns:
                1.5fr
                1fr
                1fr
                1fr;

            gap: 14px;
        }


        .filter-group label {

            display: block;

            margin-bottom: 7px;

            font-size: 11px;

            color: #4f718d;
        }


        .input-wrap {

            height: 38px;

            border: 1px solid #cfe0ef;

            border-radius: 6px;

            display: flex;

            align-items: center;

            padding: 0 10px;

            background: white;
        }


        .input-wrap span {

            color: #7aa3c6;

            font-size: 14px;

            margin-right: 7px;
        }


        .input-wrap input,
        .input-wrap select {

            width: 100%;

            height: 100%;

            border: 0;

            outline: none;

            background: transparent;

            color: #466984;

            font-size: 11px;
        }


        .filter-actions {

            margin-top: 14px;

            display: flex;

            justify-content: flex-end;

            gap: 8px;
        }


        .btn-reset,
        .btn-search {

            height: 36px;

            padding: 0 17px;

            border-radius: 6px;

            font-size: 11px;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;
        }


        .btn-reset {

            border: 1px solid #d3e1ed;

            background: white;

            color: #55758f;
        }


        .btn-search {

            border: 0;

            background: #0875d1;

            color: white;
        }


        /* =========================================
           TABLE
        ========================================= */

        .table-card {

            background: white;

            border: 1px solid #dceaf6;

            border-radius: 8px;

            overflow: hidden;
        }


        .table-header {

            padding: 16px 18px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #e5eef6;
        }


        .table-title {

            display: flex;

            align-items: center;

            gap: 9px;

            font-size: 14px;

            font-weight: 700;

            color: #174b79;
        }


        .table-title-icon {

            width: 25px;

            height: 25px;

            border-radius: 5px;

            background: #45a7f4;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 13px;
        }


        .total-data {

            background: #e8f4ff;

            color: #1675c2;

            padding: 6px 10px;

            border-radius: 12px;

            font-size: 10px;
        }


        .table-wrapper {

            overflow-x: auto;
        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }


        thead {

            background: #edf6ff;
        }


        th {

            height: 42px;

            padding: 0 12px;

            text-align: left;

            color: #295477;

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;
        }


        td {

            height: 55px;

            padding: 0 12px;

            border-top: 1px solid #edf2f6;

            color: #365a78;

            font-size: 11px;

            white-space: nowrap;
        }


        tbody tr:hover {

            background: #f8fbfe;
        }


        .ticket {

            color: #1769a8;

            font-weight: 600;
        }


        .category {

            display: inline-block;

            padding: 5px 10px;

            border-radius: 12px;

            background: #dfeeff;

            color: #2873b5;

            font-size: 10px;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 5px 10px;

            border-radius: 12px;

            font-size: 10px;
        }


        .status::before {

            content: "";

            width: 6px;

            height: 6px;

            border-radius: 50%;
        }


        .status.diajukan {

            background: #fff0d9;

            color: #b87812;
        }


        .status.diajukan::before {

            background: #e9a52d;
        }


        .status.diverifikasi {

            background: #e4f1ff;

            color: #2575bd;
        }


        .status.diverifikasi::before {

            background: #3288d0;
        }


        .status.diproses {

            background: #e4efff;

            color: #3479c1;
        }


        .status.diproses::before {

            background: #3c8de0;
        }


        .status.diteruskan {

            background: #eee8ff;

            color: #7554ba;
        }


        .status.diteruskan::before {

            background: #8062cb;
        }


        .status.selesai {

            background: #dff5eb;

            color: #26926a;
        }


        .status.selesai::before {

            background: #35a878;
        }


        .status.ditolak {

            background: #ffe4e5;

            color: #d35a5e;
        }


        .status.ditolak::before {

            background: #e86a6f;
        }


        /* =========================================
           ACTION
        ========================================= */

        .action {

            display: flex;

            gap: 7px;
        }


        .btn-detail {

            height: 32px;

            padding: 0 12px;

            border: 0;

            border-radius: 5px;

            background: #0875d1;

            color: white;

            font-size: 10px;

            cursor: pointer;
        }


        .btn-more {

            width: 32px;

            height: 32px;

            border: 1px solid #cfe0ef;

            border-radius: 5px;

            background: white;

            color: #5c7d98;

            font-size: 16px;

            cursor: pointer;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .table-footer {

            min-height: 55px;

            padding: 0 18px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: #f7fbff;
        }


        .showing {

            color: #87a3ba;

            font-size: 10px;
        }


        .pagination {

            display: flex;

            gap: 5px;
        }


        .pagination a {

            width: 30px;

            height: 30px;

            border: 1px solid #d6e5f1;

            border-radius: 5px;

            display: flex;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            color: #56809f;

            font-size: 11px;

            background: white;
        }


        .pagination a.active {

            background: #0875d1;

            border-color: #0875d1;

            color: white;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1000px) {

            .sidebar {

                width: 230px;
            }

            .main {

                margin-left: 230px;
            }

            .filter-grid {

                grid-template-columns: 1fr 1fr;
            }
        }


        @media (max-width: 700px) {

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

                margin-top: 25px;
            }

            .main {

                margin-left: 0;
            }

            .top-search {

                display: none;
            }

            .filter-grid {

                grid-template-columns: 1fr;
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


    <div class="sidebar-line"></div>


    <div class="menu-title">
        PETUGAS
    </div>


    <nav class="menu">


        <!-- DASHBOARD -->

        <a href="{{ route('petugas.dashboard') }}">

            <span class="menu-icon">
                ⌂
            </span>

            <span>
                Dashboard
            </span>

        </a>


        <!-- PENGADUAN MASUK -->

        <a href="{{ route('petugas.pengaduan.index') }}">

            <span class="menu-icon">
                ▱
            </span>

            <span>
                Pengaduan Masuk
            </span>

            @php

                $jumlahMasuk =
                    \Illuminate\Support\Facades\DB::table('pengaduan')
                        ->where('status', 'diajukan')
                        ->count();

            @endphp


            @if($jumlahMasuk > 0)

                <span class="badge">
                    {{ $jumlahMasuk }}
                </span>

            @endif

        </a>


        <!-- INPUT PENGADUAN -->

        <a href="{{ route('petugas.pengaduan.create') }}">

            <span class="menu-icon">
                ＋
            </span>

            <span>
                Input Pengaduan
            </span>

        </a>


        <!-- DATA PENGADUAN -->

        <a
            href="{{ route('petugas.pengaduan.data') }}"
            class="active"
        >

            <span class="menu-icon">
                ▤
            </span>

            <span>
                Data Pengaduan
            </span>

        </a>


        <!-- ARSIP -->

        <!-- ARSIP PENGADUAN -->

        <a href="{{ route('petugas.pengaduan.arsip') }}">
            <span class="menu-icon">⌁</span>
            <span>Arsip Pengaduan</span>
        </a>


        <!-- LAPORAN -->

        <a href="#">

            <span class="menu-icon">
                ▥
            </span>

            <span>
                Laporan
            </span>

        </a>


        <!-- NOTIFIKASI -->

        <a href="#">

            <span class="menu-icon">
                ♧
            </span>

            <span>
                Notifikasi
            </span>

        </a>


    </nav>


    <!-- PROFILE -->

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

            <span>
                ⌂
            </span>

            &nbsp;

            Beranda

            &nbsp;›&nbsp;

            <span>
                Data Pengaduan
            </span>

        </div>


        <div class="top-search">

            <span>
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


        <!-- TITLE -->

        <div class="title-area">


            <div class="title-icon">
                ▤
            </div>


            <div>

                <h1 class="page-title">
                    Data Pengaduan
                </h1>


                <div class="page-subtitle">
                    Kelola seluruh data pengaduan warga
                </div>

            </div>


        </div>


        <!-- FILTER -->

        <form
            method="GET"
            action="{{ route('petugas.pengaduan.data') }}"
            class="filter-card"
        >


            <div class="filter-grid">


                <!-- SEARCH -->

                <div class="filter-group">

                    <label>
                        Pencarian
                    </label>


                    <div class="input-wrap">

                        <span>
                            ⌕
                        </span>


                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nomor tiket / judul..."
                        >

                    </div>

                </div>


                <!-- STATUS -->

                <div class="filter-group">

                    <label>
                        Status
                    </label>


                    <div class="input-wrap">

                        <select name="status">

                            <option value="">
                                Semua Status
                            </option>

                            <option
                                value="diajukan"
                                {{ request('status') == 'diajukan' ? 'selected' : '' }}
                            >
                                Diajukan
                            </option>

                            <option
                                value="diverifikasi"
                                {{ request('status') == 'diverifikasi' ? 'selected' : '' }}
                            >
                                Diverifikasi
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
                                value="selesai"
                                {{ request('status') == 'selesai' ? 'selected' : '' }}
                            >
                                Selesai
                            </option>

                            <option
                                value="ditolak"
                                {{ request('status') == 'ditolak' ? 'selected' : '' }}
                            >
                                Ditolak
                            </option>

                        </select>

                    </div>

                </div>


                <!-- KATEGORI -->

                <div class="filter-group">

                    <label>
                        Kategori
                    </label>


                    <div class="input-wrap">

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

                </div>


                <!-- TANGGAL -->

                <div class="filter-group">

                    <label>
                        Tanggal
                    </label>


                    <div class="input-wrap">

                        <span>
                            ▣
                        </span>


                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="{{ request('tanggal_mulai') }}"
                        >

                    </div>

                </div>


            </div>


            <div class="filter-actions">


                <a
                    href="{{ route('petugas.pengaduan.data') }}"
                    class="btn-reset"
                >
                    Reset
                </a>


                <button
                    type="submit"
                    class="btn-search"
                >
                    Cari Data
                </button>


            </div>


        </form>


        <!-- TABLE -->

        <div class="table-card">


            <div class="table-header">


                <div class="table-title">

                    <div class="table-title-icon">
                        ▤
                    </div>

                    Daftar Pengaduan

                </div>


                <div class="total-data">

                    Total Data:
                    {{ $pengaduan->count() }}

                </div>


            </div>


            <div class="table-wrapper">


                <table>


                    <thead>

                        <tr>

                            <th>
                                No.
                            </th>

                            <th>
                                Nomor Tiket
                            </th>

                            <th>
                                Judul Pengaduan
                            </th>

                            <th>
                                Pelapor
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse($pengaduan as $index => $item)


                            <tr>


                                <td>
                                    {{ $index + 1 }}
                                </td>


                                <td class="ticket">

                                    {{ $item->no_tiket }}

                                </td>


                                <td>

                                    {{ $item->judul }}

                                </td>


                                <td>

                                    {{ $item->nama_pelapor ?? '-' }}

                                </td>


                                <td>

                                    <span class="category">

                                        {{ $item->nama_kategori ?? '-' }}

                                    </span>

                                </td>


                                <td>

                                    {{ $item->tgl_pengaduan
                                        ? \Carbon\Carbon::parse($item->tgl_pengaduan)->format('d M Y')
                                        : '-'
                                    }}

                                </td>


                                <td>


                                    <span
                                        class="status {{ $item->status }}"
                                    >

                                        @switch($item->status)

                                            @case('diajukan')
                                                Diajukan
                                                @break

                                            @case('diverifikasi')
                                                Diverifikasi
                                                @break

                                            @case('diproses')
                                                Diproses
                                                @break

                                            @case('diteruskan')
                                                Diteruskan
                                                @break

                                            @case('selesai')
                                                Selesai
                                                @break

                                            @case('ditolak')
                                                Ditolak
                                                @break

                                            @default
                                                {{ ucfirst($item->status) }}

                                        @endswitch

                                    </span>


                                </td>


                                <td>


                                    <div class="action">


                                        <button
                                            type="button"
                                            class="btn-detail"
                                            onclick="alert('Detail pengaduan {{ $item->no_tiket }}')"
                                        >
                                            ◉ Detail
                                        </button>


                                        <button
                                            type="button"
                                            class="btn-more"
                                        >
                                            ⋮
                                        </button>


                                    </div>


                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td
                                    colspan="8"
                                    style="
                                        text-align:center;
                                        height:120px;
                                        color:#91a8ba;
                                    "
                                >

                                    Belum ada data pengaduan.

                                </td>

                            </tr>


                        @endforelse


                    </tbody>


                </table>


            </div>


            <!-- FOOTER -->

            <div class="table-footer">


                <div class="showing">

                    Menampilkan
                    {{ $pengaduan->count() }}
                    data pengaduan

                </div>


                <div class="pagination">

                    <a href="#">
                        ‹
                    </a>

                    <a
                        href="#"
                        class="active"
                    >
                        1
                    </a>

                    <a href="#">
                        ›
                    </a>

                </div>


            </div>


        </div>


    </section>


</main>


</body>

</html>