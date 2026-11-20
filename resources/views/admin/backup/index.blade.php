<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Backup & Restore Data - SIPMAS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fb;
            color: #172033;
        }

        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 235px;
            background: #0b2942;
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
        }

        .logo {
            padding: 25px 22px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .logo h2 {
            margin: 0;
            font-size: 20px;
            letter-spacing: 1px;
        }

        .logo p {
            margin: 5px 0 0;
            font-size: 11px;
            color: #b9c9d8;
        }

        .menu {
            padding: 20px 12px;
        }

        .menu-title {
            font-size: 11px;
            color: #8fa8bd;
            text-transform: uppercase;
            margin: 8px 12px 10px;
        }

        .menu a {
            display: block;
            color: #d9e5ef;
            text-decoration: none;
            padding: 11px 13px;
            border-radius: 5px;
            margin-bottom: 4px;
            font-size: 13px;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .menu a.active {
            background: #1e75b9;
            color: white;
        }

        .admin-info {
            margin-top: auto;
            padding: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
        }

        .admin-info span {
            font-size: 10px;
            color: #9fb2c2;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 235px;
            width: calc(100% - 235px);
            min-height: 100vh;
        }

        /* =========================
           HEADER
        ========================= */

        .topbar {
            height: 65px;
            background: white;
            border-bottom: 1px solid #e2e7ee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .breadcrumb {
            font-size: 12px;
            color: #7b8797;
        }

        .breadcrumb strong {
            color: #26364a;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .search {
            width: 210px;
            padding: 9px 12px;
            border: 1px solid #dce2e9;
            border-radius: 5px;
            font-size: 11px;
        }

        .notification {
            font-size: 18px;
            color: #697789;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #1976b8;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .profile span {
            font-size: 11px;
            color: #4d5c6d;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 28px 30px 40px;
        }

        .page-title {
            margin-bottom: 22px;
        }

        .page-title h1 {
            margin: 0;
            font-size: 23px;
            color: #172b40;
        }

        .page-title p {
            margin: 6px 0 0;
            color: #7b8797;
            font-size: 12px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #e7f7ed;
            border: 1px solid #b9e7c9;
            color: #18733c;
        }

        .alert-error {
            background: #fdecec;
            border: 1px solid #f3bcbc;
            color: #a12626;
        }

        /* =========================
           CARDS
        ========================= */

        .cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 22px;
        }

        .card {
            background: white;
            border: 1px solid #e1e6ed;
            border-radius: 7px;
            padding: 20px;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .card-icon {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            background: #edf5fb;
            color: #1976b8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .card h3 {
            margin: 0;
            font-size: 15px;
            color: #26364a;
        }

        .card p {
            margin: 0 0 15px;
            color: #7b8797;
            font-size: 11px;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn {
            display: inline-block;
            border: none;
            border-radius: 5px;
            padding: 9px 14px;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: #1976b8;
            color: white;
        }

        .btn-primary:hover {
            background: #125f95;
        }

        .btn-success {
            background: #25a66a;
            color: white;
        }

        .btn-warning {
            background: #f0ad35;
            color: white;
        }

        .btn-danger {
            background: #dc5b5b;
            color: white;
        }

        .btn-secondary {
            background: #687789;
            color: white;
        }

        /* =========================
           FILE INPUT
        ========================= */

        .file-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d8dfe7;
            border-radius: 5px;
            background: #fafbfd;
            font-size: 11px;
            margin-bottom: 12px;
        }

        .warning {
            margin-top: 12px;
            padding: 10px 12px;
            background: #fff4df;
            border: 1px solid #f3d39a;
            color: #956516;
            border-radius: 5px;
            font-size: 11px;
        }

        /* =========================
           TABLE
        ========================= */

        .history-card {
            background: white;
            border: 1px solid #e1e6ed;
            border-radius: 7px;
            overflow: hidden;
        }

        .history-header {
            padding: 18px 20px;
            border-bottom: 1px solid #e6eaf0;
        }

        .history-header h3 {
            margin: 0;
            font-size: 15px;
            color: #26364a;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f7f9fb;
            color: #536274;
            font-size: 11px;
            font-weight: bold;
            text-align: left;
            padding: 12px 14px;
            border-bottom: 1px solid #e1e6ed;
        }

        td {
            padding: 12px 14px;
            font-size: 11px;
            color: #536274;
            border-bottom: 1px solid #edf0f4;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-backup {
            background: #dff4e9;
            color: #23804f;
        }

        .badge-file {
            background: #eaf2fb;
            color: #2870a8;
        }

        .actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .actions .btn {
            padding: 6px 9px;
            font-size: 10px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #8b96a5;
            font-size: 12px;
        }

        .back {
            margin-top: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .layout {
                display: block;
            }

            .topbar {
                height: auto;
                padding: 15px;
                gap: 10px;
            }

            .search {
                display: none;
            }

            .content {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

    <div class="layout">

        {{-- =========================
         SIDEBAR
    ========================== --}}

        <aside class="sidebar">

            <div class="logo">
                <h2>SIPMAS</h2>
                <p>Sistem Informasi Pengaduan Masyarakat</p>
            </div>

            <nav class="menu">

                <div class="menu-title">
                    Menu Utama
                </div>

                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.pengguna.index') }}">
                    Pengguna & Hak Akses
                </a>

                <a href="{{ route('admin.kategori.index') }}">
                    Kategori Pengaduan
                </a>

                <a href="{{ route('admin.rt_rw.index') }}">
                    Data RT/RW
                </a>

                <a href="{{ route('admin.seksi.index') }}">
                    Seksi Penanggung Jawab
                </a>

                <a href="{{ route('admin.backup.index') }}" class="active">
                    Backup & Restore
                </a>

            </nav>

            <div class="admin-info">
                <strong>Admin SIPMAS</strong>
                <span>Administrator</span>
            </div>

        </aside>


        {{-- =========================
         MAIN CONTENT
    ========================== --}}

        <main class="main">

            {{-- HEADER --}}

            <header class="topbar">

                <div class="breadcrumb">
                    Admin &nbsp;/&nbsp;
                    <strong>Backup & Restore Data</strong>
                </div>

                <div class="top-right">

                    <input
                        type="text"
                        class="search"
                        placeholder="Cari menu atau data...">

                    <div class="notification">
                        🔔
                    </div>

                    <div class="profile">
                        <div class="avatar">
                            A
                        </div>

                        <span>
                            Admin Sistem
                        </span>
                    </div>

                </div>

            </header>


            {{-- CONTENT --}}

            <section class="content">

                <div class="page-title">
                    <h1>Backup & Restore Data</h1>
                    <p>
                        Kelola pencadangan dan pemulihan data SIPMAS.
                    </p>
                </div>


                {{-- ALERT SUCCESS --}}

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif


                {{-- ALERT ERROR --}}

                @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif


                {{-- =========================
                 BACKUP & RESTORE CARDS
            ========================== --}}

                <div class="cards">

                    {{-- BACKUP --}}

                    <div class="card">

                        <div class="card-header">

                            <div class="card-icon">
                                💾
                            </div>

                            <h3>Backup Data</h3>

                        </div>

                        <p>
                            Simpan salinan data SIPMAS untuk menjaga keamanan
                            dan mengantisipasi kehilangan data.
                        </p>

                        <form action="{{ route('admin.backup.create') }}" method="POST">
                            @csrf

                            <button type="submit" class="btn btn-success">
                                Buat Backup Sekarang
                            </button>

                        </form>

                    </div>


                    {{-- RESTORE --}}

                    <div class="card">

                        <div class="card-header">

                            <div class="card-icon">
                                ♻
                            </div>

                            <h3>Restore Data</h3>

                        </div>

                        <p>
                            Pilih berkas backup untuk mengembalikan data
                            SIPMAS.
                        </p>

                        <form
                            action="{{ route('admin.backup.restore') }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input
                                type="file"
                                name="backup_file"
                                accept=".sql,.txt"
                                class="file-input"
                                required>

                            <button
                                type="submit"
                                class="btn btn-warning"
                                onclick="return confirm('Yakin ingin melakukan restore database? Data yang tersedia dapat berubah atau tertimpa oleh data dari file backup.')">
                                Restore Data
                            </button>

                        </form>

                        <div class="warning">
                            ⚠ Pastikan file backup yang dipilih benar.
                            Proses restore dapat mengubah data yang saat ini
                            tersedia.
                        </div>

                    </div>

                </div>


                {{-- =========================
                 RIWAYAT BACKUP
            ========================== --}}

                <div class="history-card">

                    <div class="history-header">
                        <h3>Riwayat Backup</h3>
                    </div>

                    <div class="table-wrapper">

                        <table>

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nama Berkas</th>
                                    <th>Ukuran</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($files as $file)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <span class="badge badge-backup">
                                            Backup
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-file">
                                            {{ $file->getFilename() }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ number_format($file->getSize() / 1024, 2) }}
                                        KB
                                    </td>

                                    <td>
                                        {{ date('d-m-Y H:i:s', $file->getMTime()) }}
                                    </td>

                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('admin.backup.download', $file->getFilename()) }}"
                                                class="btn btn-primary">
                                                Unduh
                                            </a>


                                            <form
                                                action="{{ route('admin.backup.destroy', $file->getFilename()) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus file backup ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="6" class="empty">
                                        Belum ada data backup.
                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- KEMBALI --}}

                <div class="back">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="btn btn-secondary">
                        ← Kembali ke Dashboard
                    </a>

                </div>

            </section>

        </main>

    </div>

</body>

</html>