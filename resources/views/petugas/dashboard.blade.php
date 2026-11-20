<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - SIPMAS</title>

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

        /* ================= SIDEBAR ================= */

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
            transition: 0.2s;
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
            left: 12px;
            right: 12px;
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

        /* ================= CONTENT ================= */

        .main {
            margin-left: 245px;
            width: calc(100% - 245px);
            min-height: 100vh;
        }

        /* ================= TOPBAR ================= */

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
            position: relative;
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
            color: #111827;
        }

        .profile-info span {
            font-size: 10px;
            color: #6b7280;
        }

        /* ================= CONTENT AREA ================= */

        .content {
            padding: 28px 30px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 20px;
            margin-bottom: 6px;
            color: #111827;
        }

        .welcome p {
            font-size: 13px;
            color: #6b7280;
        }

        /* ================= STAT CARDS ================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 9px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-info p {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 9px;
        }

        .stat-info h3 {
            font-size: 25px;
            color: #111827;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .yellow {
            background: #fef3c7;
            color: #d97706;
        }

        .orange {
            background: #ffedd5;
            color: #ea580c;
        }

        .green {
            background: #dcfce7;
            color: #16a34a;
        }

        /* ================= MAIN GRID ================= */

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

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
            color: #111827;
        }

        .card-header a {
            font-size: 11px;
            color: #2563eb;
            text-decoration: none;
        }

        /* ================= TABLE ================= */

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
            padding: 12px 15px;
            text-transform: uppercase;
        }

        td {
            padding: 13px 15px;
            border-top: 1px solid #f1f5f9;
            font-size: 11px;
            color: #374151;
        }

        .status {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: bold;
        }

        .status-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .status-process {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-success {
            background: #dcfce7;
            color: #166534;
        }

        /* ================= QUICK ACTION ================= */

        .quick-actions {
            padding: 20px;
        }

        .action {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #374151;
            padding: 12px;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            margin-bottom: 10px;
            font-size: 12px;
            transition: 0.2s;
        }

        .action:hover {
            border-color: #2563eb;
            background: #eff6ff;
            color: #1d4ed8;
        }

        .action-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .top-right .search {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
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

            <a href="{{ route('petugas.dashboard') }}" class="active">
                <span class="icon">▦</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('petugas.pengaduan.index') }}">
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
                <h1>Dashboard Petugas</h1>
                <p>Kelola pengaduan masyarakat</p>
            </div>

            <div class="top-right">

                <div class="search">
                    <input
                        type="text"
                        placeholder="Cari pengaduan..."
                    >
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

            <div class="welcome">
                <h2>Selamat Datang, {{ auth()->user()->nama_lengkap }}</h2>
                <p>
                    Pantau dan kelola pengaduan masyarakat melalui dashboard petugas.
                </p>
            </div>


            <!-- STATISTIK -->
            <div class="stats">

                <div class="stat-card">

                    <div class="stat-info">
                        <p>Total Pengaduan</p>
                        <h3>24</h3>
                    </div>

                    <div class="stat-icon blue">
                        ▤
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-info">
                        <p>Menunggu Verifikasi</p>
                        <h3>8</h3>
                    </div>

                    <div class="stat-icon yellow">
                        !
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-info">
                        <p>Sedang Diproses</p>
                        <h3>10</h3>
                    </div>

                    <div class="stat-icon orange">
                        ↻
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-info">
                        <p>Pengaduan Selesai</p>
                        <h3>6</h3>
                    </div>

                    <div class="stat-icon green">
                        ✓
                    </div>

                </div>

            </div>


            <!-- BAGIAN BAWAH -->
            <div class="dashboard-grid">

                <!-- PENGADUAN TERBARU -->
                <div class="card">

                    <div class="card-header">
                        <h3>Pengaduan Terbaru</h3>

                        <a href="#">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="table-container">

                        <table>

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengadu</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>01</td>
                                    <td>Ahmad Fauzi</td>
                                    <td>Infrastruktur</td>
                                    <td>20 Nov 2026</td>
                                    <td>
                                        <span class="status status-warning">
                                            Menunggu
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>02</td>
                                    <td>Siti Rahma</td>
                                    <td>Pelayanan</td>
                                    <td>20 Nov 2026</td>
                                    <td>
                                        <span class="status status-process">
                                            Diproses
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>03</td>
                                    <td>Andi Saputra</td>
                                    <td>Kebersihan</td>
                                    <td>19 Nov 2026</td>
                                    <td>
                                        <span class="status status-success">
                                            Selesai
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>04</td>
                                    <td>Dewi Lestari</td>
                                    <td>Administrasi</td>
                                    <td>19 Nov 2026</td>
                                    <td>
                                        <span class="status status-warning">
                                            Menunggu
                                        </span>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- AKSI CEPAT -->
                <div class="card">

                    <div class="card-header">
                        <h3>Aksi Cepat</h3>
                    </div>

                    <div class="quick-actions">

                        <a href="#" class="action">

                            <span class="action-icon">
                                ＋
                            </span>

                            <span>
                                Input Pengaduan Atas Nama Warga
                            </span>

                        </a>


                        <a href="#" class="action">

                            <span class="action-icon">
                                ✓
                            </span>

                            <span>
                                Verifikasi Pengaduan
                            </span>

                        </a>


                        <a href="#" class="action">

                            <span class="action-icon">
                                ◆
                            </span>

                            <span>
                                Prioritas & Penerusan
                            </span>

                        </a>


                        <a href="#" class="action">

                            <span class="action-icon">
                                ▥
                            </span>

                            <span>
                                Lihat Laporan
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>