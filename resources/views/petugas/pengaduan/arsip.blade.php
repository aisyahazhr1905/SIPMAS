<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Arsip Pengaduan - SIPMAS</title>


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

            background: #f3f7fb;

            color: #253b53;
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

            background: #10324f;

            color: white;

            padding: 20px 14px;

            overflow-y: auto;

            z-index: 100;
        }


        .brand {
            padding: 0 8px 18px;
        }


        .brand-name {

            font-size: 23px;

            font-weight: 700;

            letter-spacing: .2px;
        }


        .brand-subtitle {

            margin-top: 3px;

            font-size: 8px;

            line-height: 1.5;

            color: #a9bfd0;
        }


        .sidebar-line {

            height: 1px;

            background: rgba(
                255,
                255,
                255,
                .08
            );

            margin: 0 0 18px;
        }


        .menu-title {

            font-size: 9px;

            color: #89a5ba;

            margin:

                0 8px 9px;

            text-transform: uppercase;
        }


        .menu {

            display: flex;

            flex-direction: column;

            gap: 4px;
        }


        .menu a {

            display: flex;

            align-items: center;

            gap: 10px;

            min-height: 38px;

            padding: 9px 9px;

            border-radius: 7px;

            color: #e2edf5;

            text-decoration: none;

            font-size: 13px;

            transition: .2s;
        }


        .menu a:hover {

            background: rgba(
                255,
                255,
                255,
                .08
            );
        }


        .menu a.active {

            background: #2f6695;

            color: white;
        }


        .menu-icon {

            width: 18px;

            text-align: center;

            font-size: 15px;

            flex-shrink: 0;
        }


        .badge {

            margin-left: auto;

            min-width: 18px;

            height: 18px;

            padding: 0 5px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 5px;

            background: #ff7272;

            color: white;

            font-size: 9px;

            font-weight: 700;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .sidebar-bottom {

            position: absolute;

            left: 14px;

            right: 14px;

            bottom: 18px;

            padding-top: 14px;

            border-top: 1px solid
                rgba(
                    255,
                    255,
                    255,
                    .08
                );
        }


        .profile {

            display: flex;

            align-items: center;

            gap: 9px;
        }


        .profile-avatar {

            width: 28px;

            height: 28px;

            border-radius: 50%;

            background: #286a9c;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 9px;

            font-weight: 700;
        }


        .profile-name {

            font-size: 9px;

            font-weight: 700;
        }


        .profile-role {

            margin-top: 2px;

            color: #a9bfd0;

            font-size: 8px;
        }


        .logout {

            margin-top: 10px;

            color: #a9bfd0;

            font-size: 9px;

            text-decoration: none;
        }


        .logout:hover {

            color: white;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 270px;

            min-height: 100vh;

            background: #f3f7fb;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 43px;

            background: white;

            border-top: 3px solid #1787df;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 24px;

            border-bottom: 1px solid
                #e5edf4;
        }


        .breadcrumb {

            color: #8298ab;

            font-size: 10px;
        }


        .breadcrumb span {

            color: #45637d;
        }


        .top-search {

            width: 220px;

            height: 31px;

            border: 1px solid #d8e4ef;

            border-radius: 5px;

            display: flex;

            align-items: center;

            padding: 0 9px;

            gap: 7px;

            background: white;
        }


        .top-search span {

            color: #7190aa;

            font-size: 13px;
        }


        .top-search input {

            width: 100%;

            border: 0;

            outline: none;

            font-size: 9px;

            color: #536d84;
        }


        .top-search input::placeholder {

            color: #9db0c1;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            padding: 27px 22px 50px;
        }


        .title-area {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 15px;
        }


        .title-icon {

            width: 30px;

            height: 30px;

            border-radius: 6px;

            background: #4da6f5;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;
        }


        .page-title {

            margin: 0;

            font-size: 20px;

            color: #173b61;

            font-weight: 700;
        }


        .page-subtitle {

            margin-top: 3px;

            color: #89a2b8;

            font-size: 9px;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-card {

            background: white;

            border: 1px solid #e0eaf3;

            border-radius: 8px;

            padding: 16px;

            margin-bottom: 15px;

            box-shadow:
                0 1px 3px
                rgba(
                    26,
                    66,
                    98,
                    .03
                );
        }


        .filter-grid {

            display: grid;

            grid-template-columns:
                1.1fr
                1fr
                1fr
                1fr;

            gap: 13px;

            align-items: end;
        }


        .filter-group label {

            display: block;

            margin-bottom: 6px;

            color: #4b6277;

            font-size: 9px;

            font-weight: 700;
        }


        .input-wrap {

            height: 35px;

            border: 1px solid #d8e4ef;

            border-radius: 5px;

            display: flex;

            align-items: center;

            background: white;

            overflow: hidden;
        }


        .input-wrap span {

            padding-left: 9px;

            color: #7190aa;

            font-size: 13px;
        }


        .input-wrap input,
        .input-wrap select {

            width: 100%;

            height: 100%;

            border: 0;

            outline: none;

            padding: 0 9px;

            background: white;

            color: #4d6479;

            font-size: 10px;
        }


        .input-wrap input {

            padding-left: 7px;
        }


        .filter-buttons {

            display: flex;

            justify-content: flex-end;

            gap: 8px;

            margin-top: 12px;
        }


        .btn {

            height: 31px;

            padding: 0 15px;

            border: 0;

            border-radius: 6px;

            font-size: 9px;

            font-weight: 600;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;
        }


        .btn-reset {

            background: #edf4f9;

            color: #55758e;
        }


        .btn-apply {

            background: #2e6595;

            color: white;
        }


        /* =====================================================
           ARCHIVE CARD
        ===================================================== */

        .archive-card {

            background: white;

            border: 1px solid #e0eaf3;

            border-radius: 8px;

            padding: 13px;

            box-shadow:
                0 1px 3px
                rgba(
                    26,
                    66,
                    98,
                    .03
                );
        }


        .archive-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 5px 1px 13px;
        }


        .archive-title {

            margin: 0;

            color: #314a63;

            font-size: 14px;

            font-weight: 700;
        }


        .archive-count {

            color: #8099ae;

            font-size: 9px;

            margin-left: 5px;
        }


        .btn-export {

            background: #edf5fb;

            color: #4b7392;

            border: 0;

            border-radius: 6px;

            height: 31px;

            padding: 0 13px;

            font-size: 9px;

            font-weight: 600;

            cursor: pointer;
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

            min-width: 760px;
        }


        thead th {

            background: #f1f6fb;

            color: #7690a7;

            font-size: 8px;

            font-weight: 700;

            text-align: left;

            padding: 10px 8px;

            border-bottom: 1px solid
                #dce7f0;
        }


        tbody td {

            padding: 12px 8px;

            border-bottom: 1px solid
                #e3ebf2;

            color: #526b82;

            font-size: 9px;

            vertical-align: middle;
        }


        tbody tr:last-child td {

            border-bottom: 0;
        }


        .ticket {

            color: #326994;

            font-weight: 700;

            white-space: nowrap;
        }


        .title-cell {

            color: #425a71;

            font-weight: 500;
        }


        .category {

            color: #91a5b7;
        }


        .status {

            display: inline-flex;

            align-items: center;

            padding: 4px 9px;

            border-radius: 5px;

            font-size: 8px;

            font-weight: 700;
        }


        .status-selesai {

            background: #d9f5e8;

            color: #269467;
        }


        .status-ditolak {

            background: #ffe1df;

            color: #e35c59;
        }


        .detail-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            height: 30px;

            padding: 0 12px;

            border-radius: 6px;

            background: #edf4fa;

            color: #47718f;

            text-decoration: none;

            font-size: 9px;

            font-weight: 700;
        }


        .detail-btn:hover {

            background: #dcecf8;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .archive-footer {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-top: 13px;

            margin-top: 3px;

            border-top: 1px solid
                #edf2f6;
        }


        .showing {

            color: #8aa0b4;

            font-size: 8px;
        }


        .pagination {

            display: flex;

            align-items: center;

            gap: 4px;
        }


        .pagination a,
        .pagination span {

            min-width: 23px;

            height: 23px;

            padding: 0 5px;

            border: 1px solid #d8e4ee;

            border-radius: 5px;

            background: white;

            color: #64809a;

            display: flex;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            font-size: 8px;
        }


        .pagination .active {

            background: #286a9c;

            border-color: #286a9c;

            color: white;
        }


        .pagination .disabled {

            opacity: .5;

            pointer-events: none;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            text-align: center;

            padding: 45px 20px;

            color: #8da2b5;

            font-size: 10px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 950px) {

            .sidebar {

                width: 220px;
            }


            .main {

                margin-left: 220px;
            }


            .filter-grid {

                grid-template-columns:
                    1fr 1fr;
            }
        }


        @media (max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;

                min-height: auto;
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


            .topbar {

                padding: 0 14px;
            }


            .top-search {

                display: none;
            }


            .content {

                padding: 20px 14px;
            }


            .filter-grid {

                grid-template-columns: 1fr;
            }


            .filter-buttons {

                justify-content: stretch;
            }


            .filter-buttons .btn {

                flex: 1;
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
                    \Illuminate\Support\Facades\DB::table(
                        'pengaduan'
                    )
                    ->where(
                        'status',
                        'diajukan'
                    )
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

        <a href="{{ route('petugas.pengaduan.data') }}">

            <span class="menu-icon">
                ▤
            </span>

            <span>
                Data Pengaduan
            </span>

        </a>


        <!-- ARSIP PENGADUAN -->

        <a
            href="{{ route('petugas.pengaduan.arsip') }}"
            class="active"
        >

            <span class="menu-icon">
                ⌁
            </span>

            <span>
                Arsip Pengaduan
            </span>

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

            <span class="badge">
                3
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
                style="
                    background:none;
                    border:0;
                    padding:0;
                    cursor:pointer;
                    font-family:inherit;
                "
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
                Petugas
            </span>

            &nbsp;/&nbsp;

            <span>
                Arsip Pengaduan
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
                ⌁
            </div>


            <div>

                <h1 class="page-title">
                    Arsip Pengaduan
                </h1>

                <div class="page-subtitle">
                    Kelola pengaduan yang telah selesai atau ditolak
                </div>

            </div>


        </div>



        <!-- FILTER -->

        <form
            method="GET"
            action="{{ route('petugas.pengaduan.arsip') }}"
            class="filter-card"
        >


            <div class="filter-grid">


                <!-- PENCARIAN -->

                <div class="filter-group">

                    <label>
                        Kata kunci
                    </label>

                    <div class="input-wrap">

                        <span>
                            ⌕
                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Judul / no. tiket"
                        >

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
                                Semua
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


                <!-- PERIODE -->

                <div class="filter-group">

                    <label>
                        Periode
                    </label>

                    <div class="input-wrap">

                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="{{ request('tanggal_mulai') }}"
                        >

                        <span style="
                            padding:0;
                            color:#9aaebe;
                        ">
                            -
                        </span>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            value="{{ request('tanggal_selesai') }}"
                        >

                    </div>

                </div>


            </div>


            <!-- BUTTON -->

            <div class="filter-buttons">


                <a
                    href="{{ route('petugas.pengaduan.arsip') }}"
                    class="btn btn-reset"
                >
                    Reset
                </a>


                <button
                    type="submit"
                    class="btn btn-apply"
                >
                    Terapkan
                </button>


            </div>


        </form>



        <!-- ARCHIVE TABLE -->

        <div class="archive-card">


            <div class="archive-header">


                <div>

                    <h2 class="archive-title">

                        Ditemukan
                        <span class="archive-count">
                            {{ $arsip->total() }} arsip
                        </span>

                    </h2>

                </div>


                <button
                    type="button"
                    class="btn-export"
                    onclick="window.print()"
                >
                    ↓&nbsp; Ekspor
                </button>


            </div>



            @if($arsip->count() > 0)


                <div class="table-wrapper">

                    <table>


                        <thead>

                            <tr>

                                <th>
                                    NO. TIKET
                                </th>

                                <th>
                                    JUDUL
                                </th>

                                <th>
                                    KATEGORI
                                </th>

                                <th>
                                    TGL MASUK
                                </th>

                                <th>
                                    TGL SELESAI
                                </th>

                                <th>
                                    STATUS
                                </th>

                                <th>
                                    AKSI
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach($arsip as $item)


                                <tr>


                                    <td>

                                        <span class="ticket">
                                            {{ $item->no_tiket }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="title-cell">
                                            {{ $item->judul }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="category">
                                            {{ $item->nama_kategori ?? '-' }}
                                        </span>

                                    </td>


                                    <td>

                                        {{ $item->tgl_pengaduan
                                            ? \Carbon\Carbon::parse(
                                                $item->tgl_pengaduan
                                            )->translatedFormat('j M Y')
                                            : '-'
                                        }}

                                    </td>


                                    <td>

                                        {{ $item->tgl_selesai
                                            ? \Carbon\Carbon::parse(
                                                $item->tgl_selesai
                                            )->translatedFormat('j M Y')
                                            : '-'
                                        }}

                                    </td>


                                    <td>


                                        @if($item->status === 'selesai')

                                            <span
                                                class="status status-selesai"
                                            >
                                                Selesai
                                            </span>

                                        @else

                                            <span
                                                class="status status-ditolak"
                                            >
                                                Ditolak
                                            </span>

                                        @endif


                                    </td>


                                    <td>

                                        <a
                                            href="#"
                                            class="detail-btn"
                                            onclick="
                                                alert(
                                                    'Detail pengaduan {{ $item->no_tiket }}'
                                                );
                                                return false;
                                            "
                                        >
                                            Detail
                                        </a>

                                    </td>


                                </tr>


                            @endforeach


                        </tbody>


                    </table>

                </div>


                <!-- FOOTER -->

                <div class="archive-footer">


                    <div class="showing">

                        Menampilkan
                        {{ $arsip->firstItem() }}
                        -
                        {{ $arsip->lastItem() }}
                        dari
                        {{ $arsip->total() }}
                        data

                    </div>


                    <div class="pagination">

                        @if($arsip->onFirstPage())

                            <span class="disabled">
                                ‹
                            </span>

                        @else

                            <a href="{{ $arsip->previousPageUrl() }}">
                                ‹
                            </a>

                        @endif


                        @foreach($arsip->getUrlRange(
                            1,
                            $arsip->lastPage()
                        ) as $page => $url)


                            @if($page == $arsip->currentPage())

                                <span class="active">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $url }}">
                                    {{ $page }}
                                </a>

                            @endif


                        @endforeach


                        @if($arsip->hasMorePages())

                            <a href="{{ $arsip->nextPageUrl() }}">
                                ›
                            </a>

                        @else

                            <span class="disabled">
                                ›
                            </span>

                        @endif

                    </div>


                </div>


            @else


                <div class="empty">

                    Belum ada pengaduan yang masuk ke arsip.

                </div>


            @endif


        </div>


    </section>


</main>


</body>

</html>