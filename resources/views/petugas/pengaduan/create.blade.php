<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Input Pengaduan Warga - SIPMAS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #18324b;
            font-size: 14px;
        }

        /* =====================================================
           LAYOUT
        ===================================================== */

        .app {
            min-height: 100vh;
            display: flex;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: 260px;
            min-width: 260px;
            min-height: 100vh;
            background: #12324d;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.20);
            border-radius: 10px;
        }

        .brand {
            padding: 30px 25px 25px;
        }

        .brand-top {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2e689d;
            font-size: 24px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
            line-height: 1;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #c3d2df;
            margin-top: 7px;
        }

        .sidebar-line {
            height: 1px;
            background: rgba(255,255,255,.14);
            margin: 0 25px 25px;
        }

        .menu-title {
            padding: 0 25px;
            margin-bottom: 12px;
            color: #89a1b5;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .menu {
            padding: 0 15px;
        }

        .menu a {
            min-height: 48px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 11px 14px;
            margin-bottom: 5px;
            color: #d4e0e9;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,.08);
            color: #fff;
        }

        .menu a.active {
            background: #3977ac;
            color: #fff;
            font-weight: 600;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .badge {
            margin-left: auto;
            min-width: 21px;
            height: 21px;
            border-radius: 50%;
            background: #f05b63;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 10px;
            font-weight: bold;
        }

        /* =====================================================
           SIDEBAR PROFILE
        ===================================================== */

        .sidebar-bottom {
            margin-top: auto;
            padding: 22px 25px 25px;
        }

        .profile-line {
            height: 1px;
            background: rgba(255,255,255,.14);
            margin-bottom: 18px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            background: #3977ac;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .profile-name {
            color: #fff;
            font-size: 13px;
            font-weight: 600;
        }

        .profile-role {
            color: #9db1c2;
            font-size: 11px;
            margin-top: 3px;
        }

        .logout {
            margin-top: 18px;
        }

        .logout button {
            border: 0;
            background: transparent;
            color: #b9c9d6;
            cursor: pointer;
            font-size: 12px;
            padding: 0;
        }

        .logout button:hover {
            color: #fff;
        }

        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            background: #f4f7fb;
        }

        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            height: 80px;
            background: #fff;
            border-bottom: 1px solid #dce5ee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .breadcrumb {
            color: #8da1b3;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #173653;
        }

        .search {
            width: 270px;
            height: 40px;
            border: 1px solid #dce5ee;
            border-radius: 7px;
            background: #fff;
            display: flex;
            align-items: center;
            padding: 0 13px;
            color: #9aacbc;
        }

        .search span {
            margin-right: 8px;
            font-size: 14px;
        }

        .search input {
            width: 100%;
            border: 0;
            outline: 0;
            font-size: 12px;
            color: #50677c;
        }

        .search input::placeholder {
            color: #9aacbc;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding: 25px 35px 45px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 300px;
            gap: 20px;
            align-items: start;
        }

        /* =====================================================
           CARD
        ===================================================== */

        .card {
            background: #fff;
            border: 1px solid #dce5ee;
            border-radius: 9px;
            box-shadow: 0 1px 3px rgba(18,50,77,.03);
        }

        .card-header {
            padding: 17px 20px;
            border-bottom: 1px solid #edf1f5;
        }

        .card-title {
            font-size: 15px;
            font-weight: 600;
            color: #25435f;
        }

        .card-body {
            padding: 18px 20px;
        }

        /* =====================================================
           FORM
        ===================================================== */

        .section-card {
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 14px;
            font-weight: 600;
            color: #274761;
            margin-bottom: 15px;
        }

        .form-row {
            display: grid;
            gap: 10px;
            margin-bottom: 12px;
        }

        .form-row.search-row {
            grid-template-columns: minmax(0, 1fr) 130px;
        }

        .form-row.three {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .form-row.two {
            grid-template-columns: 1fr 1fr;
        }

        .form-group {
            min-width: 0;
        }

        label {
            display: block;
            font-size: 11px;
            color: #50667b;
            margin-bottom: 6px;
        }

        .required {
            color: #d9534f;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d6e1eb;
            background: #fff;
            border-radius: 5px;
            color: #354e65;
            font-size: 12px;
            outline: none;
            transition: .2s;
        }

        input,
        select {
            height: 38px;
            padding: 0 10px;
        }

        textarea {
            min-height: 95px;
            resize: vertical;
            padding: 10px;
            line-height: 1.5;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4d88ba;
            box-shadow: 0 0 0 2px rgba(77,136,186,.10);
        }

        .search-warga {
            position: relative;
        }

        .search-warga input {
            padding-left: 31px;
        }

        .search-warga .search-icon {
            position: absolute;
            left: 11px;
            top: 11px;
            color: #9db0c0;
            font-size: 12px;
        }

        .not-registered {
            height: 38px;
            border: 1px solid #d6e1eb;
            border-radius: 5px;
            background: #fff;
            color: #3570a0;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }

        .not-registered:hover {
            background: #f2f7fb;
        }

        /* =====================================================
           SOURCE BUTTON
        ===================================================== */

        .source-buttons {
            display: flex;
            gap: 2px;
        }

        .source-buttons input {
            display: none;
        }

        .source-buttons label {
            margin: 0;
            height: 34px;
            padding: 0 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d9e3ec;
            background: #fff;
            color: #8195a7;
            cursor: pointer;
            font-size: 11px;
        }

        .source-buttons label:first-of-type {
            border-radius: 5px 0 0 5px;
        }

        .source-buttons label:last-of-type {
            border-radius: 0 5px 5px 0;
        }

        .source-buttons input:checked + label {
            background: #3977ac;
            border-color: #3977ac;
            color: #fff;
            font-weight: 600;
        }

        /* =====================================================
           UPLOAD
        ===================================================== */

        .upload-box {
            height: 48px;
            border: 1px dashed #bfd0df;
            border-radius: 5px;
            background: #fafcfe;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #91a5b7;
            font-size: 11px;
            cursor: pointer;
        }

        .upload-box:hover {
            background: #f5f9fc;
            border-color: #6f9fc4;
        }

        .upload-box input {
            display: none;
        }

        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary-card {
            padding: 18px;
            margin-bottom: 14px;
        }

        .summary-title {
            font-size: 14px;
            font-weight: 600;
            color: #274761;
            margin-bottom: 17px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 13px;
            font-size: 11px;
        }

        .summary-item:last-child {
            margin-bottom: 0;
        }

        .summary-label {
            color: #8b9cac;
        }

        .summary-value {
            color: #304a61;
            font-weight: 600;
            text-align: right;
        }

        /* =====================================================
           INFO
        ===================================================== */

        .info-box {
            background: #eaf4ff;
            border: 1px solid #c9e1f7;
            color: #52728f;
            border-radius: 5px;
            padding: 12px;
            font-size: 10px;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        /* =====================================================
           BUTTONS
        ===================================================== */

        .btn {
            width: 100%;
            height: 40px;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-primary {
            background: #3977ac;
            color: #fff;
        }

        .btn-primary:hover {
            background: #2f6697;
        }

        .btn-secondary {
            background: #fff;
            border: 1px solid #d6e1eb;
            color: #3f6787;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background: #f6f9fc;
        }

        /* =====================================================
           ERROR
        ===================================================== */

        .alert-error {
            background: #fff1f1;
            border: 1px solid #f0c8c8;
            color: #a94442;
            border-radius: 6px;
            padding: 12px 14px;
            margin-bottom: 15px;
            font-size: 12px;
        }

        .alert-error ul {
            margin: 7px 0 0 17px;
        }

        .field-error {
            color: #d9534f;
            font-size: 10px;
            margin-top: 4px;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {
            .sidebar {
                width: 225px;
                min-width: 225px;
            }

            .main {
                margin-left: 225px;
                width: calc(100% - 225px);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .summary-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }

            .summary-card,
            .info-box {
                margin-bottom: 0;
            }

            .summary-actions {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                position: relative;
                width: 220px;
                min-width: 220px;
            }

            .main {
                margin-left: 0;
                width: calc(100% - 220px);
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

            .form-row.three,
            .form-row.two {
                grid-template-columns: 1fr;
            }

            .summary-column {
                display: block;
            }

            .summary-card,
            .info-box {
                margin-bottom: 14px;
            }
        }

        @media (max-width: 600px) {
            .app {
                display: block;
            }

            .sidebar {
                position: relative;
                width: 100%;
                min-width: 100%;
                min-height: auto;
            }

            .sidebar-bottom {
                margin-top: 20px;
            }

            .main {
                width: 100%;
                margin-left: 0;
            }

            .topbar {
                height: auto;
                padding: 18px;
                gap: 15px;
                align-items: flex-start;
                flex-direction: column;
            }

            .search {
                width: 100%;
            }

            .content {
                padding: 15px;
            }

            .form-row.search-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="app">

    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-top">
                <div class="brand-logo">
                    ✦
                </div>

                <div>
                    <div class="brand-name">SIPMAS</div>
                    <div class="brand-subtitle">
                        Kelurahan Sungai Bangek
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-line"></div>

        <div class="menu-title">
            Pelayanan
        </div>

        <nav class="menu">

            <a href="{{ route('petugas.dashboard') }}">
                <span class="menu-icon">▦</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('petugas.pengaduan.index') }}">
                <span class="menu-icon">▱</span>
                <span>Pengaduan Masuk</span>

                @php
                    $jumlahPengaduan = \Illuminate\Support\Facades\DB::table('pengaduan')
                        ->where('status', 'diajukan')
                        ->count();
                @endphp

                @if($jumlahPengaduan > 0)
                    <span class="badge">
                        {{ $jumlahPengaduan }}
                    </span>
                @endif
            </a>

            <a href="{{ route('petugas.pengaduan.create') }}" class="active">
                <span class="menu-icon">▧</span>
                <span>Input Pengaduan</span>
            </a>

            <a href="{{ route('petugas.pengaduan.index') }}">
                <span class="menu-icon">▤</span>
                <span>Data Pengaduan</span>
            </a>

            <a href="#">
                <span class="menu-icon">⌁</span>
                <span>Laporan</span>
            </a>

            <a href="#">
                <span class="menu-icon">♧</span>
                <span>Notifikasi</span>

                <span class="badge">3</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="profile-line"></div>

            <div class="profile">

                <div class="profile-avatar">
                    BS
                </div>

                <div>
                    <div class="profile-name">
                        {{ auth()->user()->nama_lengkap ?? 'Budi Santoso' }}
                    </div>

                    <div class="profile-role">
                        Petugas
                    </div>
                </div>

            </div>

            <div class="logout">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">
                        → &nbsp; Keluar
                    </button>
                </form>

            </div>

        </div>

    </aside>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}
    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div>
                <div class="breadcrumb">
                    Petugas / Input Pengaduan Warga
                </div>

                <h1 class="page-title">
                    Input Pengaduan Warga
                </h1>
            </div>

            <div class="search">

                <span>⌕</span>

                <input
                    type="text"
                    placeholder="Cari nomor tiket / judul..."
                >

            </div>

        </header>


        {{-- CONTENT --}}
        <section class="content">

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="alert-error">

                    <strong>
                        Data belum dapat disimpan.
                    </strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('petugas.pengaduan.store') }}"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="content-grid">

                    {{-- =================================================
                         KOLOM KIRI
                    ================================================== --}}
                    <div>

                        {{-- ================= DATA PELAPOR ================= --}}
                        <div class="card section-card">

                            <div class="card-body">

                                <div class="section-title">
                                    1. Data pelapor
                                </div>


                                {{-- SEARCH WARGA --}}
                                <div class="form-row search-row">

                                    <div class="form-group">

                                        <div class="search-warga">

                                            <span class="search-icon">
                                                ⌕
                                            </span>

                                            <input
                                                type="text"
                                                placeholder="Cari warga terdaftar (NIK / nama)"
                                            >

                                        </div>

                                    </div>

                                    <button
                                        type="button"
                                        class="not-registered"
                                    >
                                        Warga belum terdaftar
                                    </button>

                                </div>


                                {{-- WARGA --}}
                                <div class="form-row three">

                                    <div class="form-group">

                                        <label>
                                            Nama pelapor
                                        </label>

                                        <select
                                            name="id_pelapor"
                                            required
                                        >

                                            <option value="">
                                                Pilih warga
                                            </option>

                                            @foreach($warga as $item)

                                                <option
                                                    value="{{ $item->id_pengguna }}"
                                                    {{ old('id_pelapor') == $item->id_pengguna ? 'selected' : '' }}
                                                >
                                                    {{ $item->nama_lengkap }}
                                                </option>

                                            @endforeach

                                        </select>

                                        @error('id_pelapor')
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            NIK
                                        </label>

                                        <input
                                            type="text"
                                            id="nik"
                                            placeholder="NIK warga"
                                            readonly
                                        >

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            No. HP
                                        </label>

                                        <input
                                            type="text"
                                            id="no_hp"
                                            placeholder="Nomor HP"
                                            readonly
                                        >

                                    </div>

                                </div>


                                {{-- SUMBER --}}
                                <div class="form-group">

                                    <label>
                                        Sumber pengaduan <span class="required">*</span>
                                    </label>

                                    <div class="source-buttons">

                                        <input
                                            type="radio"
                                            name="sumber_pengaduan"
                                            id="langsung"
                                            value="offline"
                                            {{ old('sumber_pengaduan', 'offline') == 'offline' ? 'checked' : '' }}
                                        >

                                        <label for="langsung">
                                            Datang langsung
                                        </label>


                                        <input
                                            type="radio"
                                            name="sumber_pengaduan"
                                            id="surat"
                                            value="online"
                                            {{ old('sumber_pengaduan') == 'online' ? 'checked' : '' }}
                                        >

                                        <label for="surat">
                                            Surat
                                        </label>


                                        <input
                                            type="radio"
                                            name="sumber_pengaduan"
                                            id="rt_rw"
                                            value="online"
                                        >

                                        <label for="rt_rw">
                                            Via RT/RW
                                        </label>

                                    </div>

                                    @error('sumber_pengaduan')
                                        <div class="field-error">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- ================= DATA PENGADUAN ================= --}}
                        <div class="card section-card">

                            <div class="card-body">

                                <div class="section-title">
                                    2. Data pengaduan
                                </div>


                                {{-- JUDUL --}}
                                <div class="form-group" style="margin-bottom: 12px;">

                                    <label>
                                        Judul <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="judul"
                                        value="{{ old('judul') }}"
                                        placeholder="Masukkan judul pengaduan"
                                        required
                                    >

                                    @error('judul')
                                        <div class="field-error">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- KATEGORI + LOKASI --}}
                                <div class="form-row two">

                                    <div class="form-group">

                                        <label>
                                            Kategori <span class="required">*</span>
                                        </label>

                                        <select
                                            name="id_kategori"
                                            required
                                        >

                                            <option value="">
                                                Pilih kategori
                                            </option>

                                            @foreach($kategori as $item)

                                                <option
                                                    value="{{ $item->id_kategori }}"
                                                    {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}
                                                >
                                                    {{ $item->nama_kategori }}
                                                </option>

                                            @endforeach

                                        </select>

                                        @error('id_kategori')
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="form-group">

                                        <label>
                                            Lokasi <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="lokasi_kejadian"
                                            value="{{ old('lokasi_kejadian') }}"
                                            placeholder="Contoh: Pos ronda RW 03"
                                            required
                                        >

                                        @error('lokasi_kejadian')
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- URAIAN --}}
                                <div class="form-group" style="margin-bottom: 12px;">

                                    <label>
                                        Uraian <span class="required">*</span>
                                    </label>

                                    <textarea
                                        name="uraian"
                                        placeholder="Jelaskan pengaduan secara lengkap..."
                                        required
                                    >{{ old('uraian') }}</textarea>

                                    @error('uraian')
                                        <div class="field-error">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- LAMPIRAN --}}
                                <div class="form-group">

                                    <label>
                                        Lampiran (opsional)
                                    </label>

                                    <label class="upload-box">

                                        <input
                                            type="file"
                                            name="lampiran"
                                        >

                                        ↑ &nbsp; Unggah foto / pindai surat pengaduan

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         KOLOM KANAN
                    ================================================== --}}
                    <div class="summary-column">

                        {{-- RINGKASAN --}}
                        <div class="card summary-card">

                            <div class="summary-title">
                                Ringkasan
                            </div>


                            <div class="summary-item">

                                <span class="summary-label">
                                    Sumber
                                </span>

                                <span class="summary-value">
                                    Datang langsung
                                </span>

                            </div>


                            <div class="summary-item">

                                <span class="summary-label">
                                    Status awal
                                </span>

                                <span class="summary-value">
                                    Diterima
                                </span>

                            </div>


                            <div class="summary-item">

                                <span class="summary-label">
                                    Nomor tiket
                                </span>

                                <span class="summary-value">
                                    Dibuat otomatis
                                </span>

                            </div>


                            <div class="summary-item">

                                <span class="summary-label">
                                    Diinput oleh
                                </span>

                                <span class="summary-value">
                                    {{ auth()->user()->nama_lengkap ?? 'Budi Santoso' }}
                                </span>

                            </div>

                        </div>


                        {{-- INFO --}}
                        <div class="info-box">

                            ▣ Warga akan menerima notifikasi bila memiliki akun terdaftar.

                        </div>


                        {{-- ACTIONS --}}
                        <div class="summary-actions">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Simpan Pengaduan
                            </button>

                            <button
                                type="button"
                                class="btn btn-secondary"
                            >
                                Simpan &amp; Cetak Tanda Terima
                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </section>

    </main>

</div>


{{-- =====================================================
     DATA WARGA → NIK & NO HP
====================================================== --}}

<script>

    const wargaData = @json($warga);

    const wargaSelect = document.querySelector(
        'select[name="id_pelapor"]'
    );

    const nikInput = document.getElementById('nik');
    const hpInput = document.getElementById('no_hp');


    function updateWarga() {

        const id = wargaSelect.value;

        const warga = wargaData.find(
            item => String(item.id_pengguna) === String(id)
        );

        if (warga) {

            nikInput.value = warga.nik ?? '';

            hpInput.value = warga.no_hp ?? '';

        } else {

            nikInput.value = '';

            hpInput.value = '';

        }
    }


    wargaSelect.addEventListener(
        'change',
        updateWarga
    );


    updateWarga();

</script>

</body>
</html>