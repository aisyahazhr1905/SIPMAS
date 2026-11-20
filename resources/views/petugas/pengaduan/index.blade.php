<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaduan Masuk - SIPMAS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        /* SIDEBAR */

        .sidebar {
            width: 245px;
            background: #172554;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .logo {
            padding: 25px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 12px;
            color: #cbd5e1;
        }

        .menu {
            padding: 20px 12px;
        }

        .menu-title {
            font-size: 11px;
            color: #94a3b8;
            text-transform: uppercase;
            margin: 10px 12px;
            letter-spacing: 0.5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #dbeafe;
            padding: 12px 13px;
            margin-bottom: 5px;
            border-radius: 7px;
            font-size: 13px;
        }

        .menu a:hover {
            background: #1e3a8a;
            color: white;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        .logout {
            position: sticky;
            bottom: 0;
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
            background: #dc2626;
            color: white;
        }

        /* MAIN */

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

        .page-title h1 {
            font-size: 21px;
            color: #111827;
            margin-bottom: 4px;
        }

        .page-title p {
            font-size: 12px;
            color: #6b7280;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search {
            width: 220px;
        }

        .search input {
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            padding: 9px 12px;
            outline: none;
            font-size: 12px;
            background: #f9fafb;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            font-size: 13px;
        }

        .profile-info strong {
            display: block;
            font-size: 12px;
        }

        .profile-info span {
            font-size: 10px;
            color: #6b7280;
        }

        /* CONTENT */

        .content {
            padding: 28px 30px;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .heading h2 {
            font-size: 20px;
            color: #111827;
            margin-bottom: 5px;
        }

        .heading p {
            font-size: 12px;
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 12px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        /* CARD */

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 9px;
            overflow: hidden;
        }

        .card-header {
            padding: 17px 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 14px;
        }

        .total {
            font-size: 11px;
            color: #6b7280;
        }

        /* TABLE */

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            font-size: 10px;
            text-align: left;
            padding: 13px 15px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 14px 15px;
            border-top: 1px solid #f1f5f9;
            font-size: 11px;
            color: #374151;
            white-space: nowrap;
        }

        .ticket {
            color: #2563eb;
            font-weight: bold;
        }

        .status,
        .priority {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: bold;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #92400e;
        }

        .status-proses {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .priority-tinggi {
            background: #fee2e2;
            color: #b91c1c;
        }

        .priority-sedang {
            background: #fef3c7;
            color: #92400e;
        }

        .priority-rendah {
            background: #e0f2fe;
            color: #0369a1;
        }

        .btn-process {
            background: #eff6ff;
            color: #2563eb;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 10px;
        }

        .btn-process:hover {
            background: #2563eb;
            color: white;
        }

        /* EMPTY */

        .empty {
            text-align: center;
            padding: 70px 20px;
        }

        .empty-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .empty h3 {
            font-size: 15px;
            margin-bottom: 7px;
            color: #374151;
        }

        .empty p {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 18px;
        }

        @media (max-width: 900px) {
            .top-right .search {
                display: none;
            }

            .heading {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <h2>SIPMAS</h2>
            <p>Sistem Informasi Pengaduan Masyarakat</p>
        </div>

        <nav class="menu">

            <div class="menu-title">Menu Utama</div>

            <a href="{{ route('petugas.dashboard') }}">
                <span class="icon">▦</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('petugas.pengaduan.index') }}" class="active">
                <span class="icon">▤</span>
                <span>Pengaduan Masuk</span>
            </a>

            <a href="#">
                <span class="icon">＋</span>
                <span>Input Pengaduan</span>
            </a>

            <div class="menu-title">Pengelolaan</div>

            <a href="#">
                <span class="icon">✓</span>
                <span>Verifikasi Pengaduan</span>
            </a>

            <a href="#">
                <span class="icon">◆</span>
                <span>Prioritas & Penerusan</span>
            </a>

            <a href="#">
                <span class="icon">↻</span>
                <span>Status & Tanggapan</span>
            </a>

            <a href="#">
                <span class="icon">▣</span>
                <span>Arsip Pengaduan</span>
            </a>

            <div class="menu-title">Laporan</div>

            <a href="#">
                <span class="icon">▥</span>
                <span>Laporan Rekapitulasi</span>
            </a>

        </nav>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    ⇥ &nbsp; Keluar
                </button>
            </form>
        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="page-title">
                <h1>Pengaduan Masuk</h1>
                <p>Kelola dan tindak lanjuti pengaduan masyarakat</p>
            </div>

            <div class="top-right">

                <div class="search">
                    <input type="text" placeholder="Cari pengaduan...">
                </div>

                <div class="profile">
                    <div class="profile-avatar">
                        P
                    </div>

                    <div class="profile-info">
                        <strong>{{ auth()->user()->nama_lengkap }}</strong>
                        <span>Petugas</span>
                    </div>
                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <div class="heading">

                <div>
                    <h2>Daftar Pengaduan Masuk</h2>
                    <p>
                        Daftar pengaduan masyarakat yang masuk ke sistem.
                    </p>
                </div>

                <a href="{{ route('petugas.pengaduan.create') }}" class="btn">
                    + Input Pengaduan
                </a>

            </div>


            <div class="card">

                <div class="card-header">

                    <h3>Pengaduan Masyarakat</h3>

                    <span class="total">
                        Total: {{ $pengaduan->count() }} pengaduan
                    </span>

                </div>


                @if($pengaduan->count() > 0)

                    <div class="table-container">

                        <table>

                            <thead>
                                <tr>
                                    <th>No. Tiket</th>
                                    <th>Judul</th>
                                    <th>Pelapor</th>
                                    <th>Kategori</th>
                                    <th>Prioritas</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Batas Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($pengaduan as $item)

                                    <tr>

                                        <td>
                                            <span class="ticket">
                                                {{ $item->no_tiket }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $item->judul }}
                                        </td>

                                        <td>
                                            {{ $item->nama_pelapor ?? '-' }}
                                        </td>

                                        <td>
                                            {{ $item->nama_kategori ?? '-' }}
                                        </td>

                                        <td>

                                            @if($item->prioritas === 'tinggi')
                                                <span class="priority priority-tinggi">
                                                    Tinggi
                                                </span>

                                            @elseif($item->prioritas === 'sedang')
                                                <span class="priority priority-sedang">
                                                    Sedang
                                                </span>

                                            @else
                                                <span class="priority priority-rendah">
                                                    {{ ucfirst($item->prioritas ?? 'Rendah') }}
                                                </span>
                                            @endif

                                        </td>

                                        <td>

                                            @if($item->status === 'menunggu')
                                                <span class="status status-menunggu">
                                                    Menunggu
                                                </span>

                                            @elseif($item->status === 'selesai')
                                                <span class="status status-selesai">
                                                    Selesai
                                                </span>

                                            @else
                                                <span class="status status-proses">
                                                    {{ ucfirst($item->status ?? 'Diproses') }}
                                                </span>
                                            @endif

                                        </td>

                                        <td>
                                            {{ $item->tgl_pengaduan ?? '-' }}
                                        </td>

                                        <td>
                                            {{ $item->batas_waktu ?? '-' }}
                                        </td>

                                        <td>
                                            <a href="#" class="btn-process">
                                                Proses
                                            </a>
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty">

                        <div class="empty-icon">
                            ▤
                        </div>

                        <h3>Belum Ada Pengaduan</h3>

                        <p>
                            Belum terdapat pengaduan masyarakat yang masuk ke dalam sistem.
                        </p>

                        <a href="#" class="btn">
                            + Input Pengaduan
                        </a>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>

</body>
</html>