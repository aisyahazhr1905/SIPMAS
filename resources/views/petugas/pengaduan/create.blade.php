<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Input Pengaduan - SIPMAS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 245px;
            background: #172554;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            z-index: 10;
        }

        .logo {
            padding: 25px 22px;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .logo h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 12px;
            color: #cbd5e1;
            line-height: 1.4;
        }

        .menu {
            padding: 20px 12px 90px;
        }

        .menu-title {
            font-size: 11px;
            color: #94a3b8;
            text-transform: uppercase;
            margin: 10px 12px;
        }

        .menu a {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 12px 13px;
            margin-bottom: 5px;
            color: #dbeafe;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
        }

        .menu a:hover,
        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .icon {
            width: 20px;
            text-align: center;
        }

        .logout {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 245px;
            padding: 10px 12px 20px;
            background: #172554;
        }

        .logout button {
            width: 100%;
            border: none;
            background: #1e3a8a;
            color: #dbeafe;
            padding: 11px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
        }

        .logout button:hover {
            background: #2563eb;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 245px;
            width: calc(100% - 245px);
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar h1 {
            font-size: 21px;
            margin-bottom: 4px;
        }

        .topbar p {
            font-size: 12px;
            color: #6b7280;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .profile strong {
            display: block;
            font-size: 12px;
        }

        .profile span {
            font-size: 10px;
            color: #6b7280;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 28px 30px;
        }

        .heading {
            margin-bottom: 20px;
        }

        .heading h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .heading p {
            font-size: 12px;
            color: #6b7280;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 9px;
            padding: 25px;
            max-width: 100%;
        }

        .info {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #1e40af;
            padding: 12px 15px;
            border-radius: 7px;
            font-size: 11px;
            margin-bottom: 22px;
        }

        .validation-summary {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 12px 15px;
            border-radius: 7px;
            font-size: 11px;
            margin-bottom: 22px;
        }

        .validation-summary ul {
            margin-top: 7px;
            margin-left: 18px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: bold;
            color: #374151;
        }

        label span {
            color: #dc2626;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            padding: 10px 12px;
            font-size: 12px;
            outline: none;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.08);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .field-error {
            color: #dc2626;
            font-size: 11px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            margin-top: 5px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 12px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            .sidebar {
                width: 210px;
            }

            .logout {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .row {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="logo">
            <h2>SIPMAS</h2>
            <p>Sistem Informasi Pengaduan Masyarakat</p>
        </div>

        <nav class="menu">

            <div class="menu-title">
                Menu Utama
            </div>

            <a href="{{ route('petugas.dashboard') }}">
                <span class="icon">▦</span>
                Dashboard
            </a>

            <a href="{{ route('petugas.pengaduan.index') }}">
                <span class="icon">▤</span>
                Pengaduan Masuk
            </a>

            <a href="{{ route('petugas.pengaduan.create') }}" class="active">
                <span class="icon">＋</span>
                Input Pengaduan
            </a>


            <div class="menu-title">
                Pengelolaan
            </div>

            <a href="#">
                <span class="icon">✓</span>
                Verifikasi Pengaduan
            </a>

            <a href="#">
                <span class="icon">◆</span>
                Prioritas & Penerusan
            </a>

            <a href="#">
                <span class="icon">↻</span>
                Status & Tanggapan
            </a>

            <a href="#">
                <span class="icon">▣</span>
                Arsip Pengaduan
            </a>


            <div class="menu-title">
                Laporan
            </div>

            <a href="#">
                <span class="icon">▥</span>
                Laporan Rekapitulasi
            </a>

        </nav>


        <!-- LOGOUT -->

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit">
                    ⇥ &nbsp; Keluar
                </button>

            </form>

        </div>

    </aside>


    <!-- ================= MAIN ================= -->

    <main class="main">

        <!-- TOPBAR -->

        <header class="topbar">

            <div>

                <h1>
                    Input Pengaduan
                </h1>

                <p>
                    Input pengaduan atas nama warga
                </p>

            </div>


            <div class="profile">

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}
                </div>

                <div>

                    <strong>
                        {{ auth()->user()->nama_lengkap }}
                    </strong>

                    <span>
                        Petugas
                    </span>

                </div>

            </div>

        </header>


        <!-- CONTENT -->

        <section class="content">

            <div class="heading">

                <h2>
                    Input Pengaduan Atas Nama Warga
                </h2>

                <p>
                    Masukkan pengaduan warga yang disampaikan melalui petugas.
                </p>

            </div>


            <div class="card">

                <!-- INFORMASI -->

                <div class="info">

                    Pengaduan yang dibuat melalui halaman ini akan tercatat
                    atas nama warga yang dipilih dan diproses oleh petugas
                    yang sedang login.

                </div>


                <!-- VALIDATION ERROR -->

                @if($errors->any())

                    <div class="validation-summary">

                        <strong>
                            Terdapat kesalahan pada data yang dimasukkan.
                        </strong>

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- FORM -->

                <form
                    action="{{ route('petugas.pengaduan.store') }}"
                    method="POST"
                >

                    @csrf


                    <!-- WARGA + KATEGORI -->

                    <div class="row">

                        <!-- WARGA -->

                        <div class="form-group">

                            <label for="id_pelapor">
                                Warga / Pelapor
                                <span>*</span>
                            </label>

                            <select
                                name="id_pelapor"
                                id="id_pelapor"
                                required
                            >

                                <option value="">
                                    -- Pilih Warga --
                                </option>

                                @foreach($warga as $item)

                                    <option
                                        value="{{ $item->id_pengguna }}"
                                        {{ old('id_pelapor') == $item->id_pengguna ? 'selected' : '' }}
                                    >

                                        {{ $item->nama_lengkap }}
                                        - NIK {{ $item->nik }}

                                    </option>

                                @endforeach

                            </select>


                            @error('id_pelapor')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- KATEGORI -->

                        <div class="form-group">

                            <label for="id_kategori">
                                Kategori
                                <span>*</span>
                            </label>

                            <select
                                name="id_kategori"
                                id="id_kategori"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori --
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

                    </div>


                    <!-- JUDUL -->

                    <div class="form-group">

                        <label for="judul">
                            Judul Pengaduan
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="judul"
                            id="judul"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Jalan rusak di sekitar RT 02"
                            required
                        >


                        @error('judul')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- URAIAN -->

                    <div class="form-group">

                        <label for="uraian">
                            Uraian Pengaduan
                            <span>*</span>
                        </label>

                        <textarea
                            name="uraian"
                            id="uraian"
                            placeholder="Jelaskan pengaduan warga secara lengkap..."
                            required
                        >{{ old('uraian') }}</textarea>


                        @error('uraian')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- LOKASI -->

                    <div class="form-group">

                        <label for="lokasi_kejadian">
                            Lokasi Kejadian
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="lokasi_kejadian"
                            id="lokasi_kejadian"
                            value="{{ old('lokasi_kejadian') }}"
                            placeholder="Contoh: Jalan Sungai Bangek RT 02 RW 03"
                            required
                        >


                        @error('lokasi_kejadian')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- SUMBER PENGADUAN -->

                    <div class="form-group">

                        <label for="sumber_pengaduan">
                            Sumber Pengaduan
                            <span>*</span>
                        </label>

                        <select
                            name="sumber_pengaduan"
                            id="sumber_pengaduan"
                            required
                        >

                            <option value="">
                                -- Pilih Sumber Pengaduan --
                            </option>

                            <option
                                value="online"
                                {{ old('sumber_pengaduan') == 'online' ? 'selected' : '' }}
                            >
                                Online
                            </option>

                            <option
                                value="offline"
                                {{ old('sumber_pengaduan') == 'offline' ? 'selected' : '' }}
                            >
                                Offline
                            </option>

                        </select>


                        @error('sumber_pengaduan')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- BUTTON -->

                    <div class="actions">

                        <a
                            href="{{ route('petugas.pengaduan.index') }}"
                            class="btn btn-secondary"
                        >
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Simpan Pengaduan
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </main>

</div>

</body>
</html>