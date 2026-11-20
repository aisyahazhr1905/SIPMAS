<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - SIPMAS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            SIPMAS
        </div>

        <div class="subtitle">
            Sistem Informasi Pengaduan<br>
            Masyarakat
        </div>

        <div class="menu">

            <!-- MENU UTAMA -->
            <div class="menu-title">
                Menu Utama
            </div>

            <a href="{{ route('admin.dashboard') }}" class="active">
                Dashboard
            </a>


            <!-- MANAJEMEN SISTEM -->
            <div class="menu-title">
                Manajemen Sistem
            </div>

            <a href="{{ route('admin.pengguna.index') }}">
                Kelola Pengguna
            </a>

            <a href="{{ route('admin.kategori.index') }}">
                Kategori Pengaduan
            </a>

            <a href="{{ route('admin.rt_rw.index') }}">
                Data RT/RW
            </a>

            <a href="{{ route('admin.seksi.index') }}">
                Data Seksi
            </a>


            <!-- PEMELIHARAAN -->
            <div class="menu-title">
                Pemeliharaan
            </div>

            <a href="{{ route('admin.backup.index') }}">
                Backup & Restore
            </a>

        </div>


        <!-- LOGOUT -->
        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit">
                    Keluar
                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <h2>
                Dashboard Admin
            </h2>

            <div class="user">
                {{ Auth::user()->nama_lengkap }}
            </div>

        </div>


        <!-- CONTENT -->
        <div class="content">

            <!-- WELCOME -->
            <div class="welcome">

                <h1>
                    Selamat Datang, Admin
                </h1>

                <p>
                    Kelola sistem SIPMAS melalui menu yang tersedia.
                </p>

            </div>


            <!-- DASHBOARD CARDS -->
            <div class="cards">

                <!-- TOTAL PENGGUNA -->
                <div class="dashboard-card">

                    <h3>
                        Total Pengguna
                    </h3>

                    <div class="number">
                        0
                    </div>

                </div>


                <!-- TOTAL PENGADUAN -->
                <div class="dashboard-card">

                    <h3>
                        Total Pengaduan
                    </h3>

                    <div class="number">
                        0
                    </div>

                </div>


                <!-- PENGADUAN SELESAI -->
                <div class="dashboard-card">

                    <h3>
                        Pengaduan Selesai
                    </h3>

                    <div class="number">
                        0
                    </div>

                </div>

            </div>

        </div>

    </main>

</body>
</html>