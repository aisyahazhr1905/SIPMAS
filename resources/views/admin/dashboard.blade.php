<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - SIPMAS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #0f172a;
            color: white;
            padding: 25px 18px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #60a5fa;
            padding: 0 15px;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 12px;
            color: #94a3b8;
            padding: 0 15px;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            margin: 20px 15px 10px;
        }

        .menu a {
            display: block;
            padding: 13px 15px;
            margin-bottom: 5px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #dc2626;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .topbar h2 {
            color: #1e293b;
        }

        .user {
            color: #475569;
            font-size: 14px;
        }

        .content {
            padding: 35px;
        }

        .welcome {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            color: #1e293b;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #64748b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.04);
        }

        .card h3 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .card .number {
            font-size: 30px;
            font-weight: bold;
            color: #2563eb;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">SIPMAS</div>

        <div class="subtitle">
            Sistem Informasi Pengaduan Masyarakat
        </div>

        <div class="menu">

            <div class="menu-title">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}" class="active">
                Dashboard
            </a>

            <div class="menu-title">Manajemen Sistem</div>

            <a href="{{ route('admin.pengguna.index') }}">
                Kelola Pengguna
            </a>
            
            <a href="{{ route('admin.kategori.index') }}">
                Kategori Pengaduan
            </a>

            <a href="#">
                Data RT/RW
            </a>

            <a href="#">
                Data Seksi
            </a>

            <div class="menu-title">Pemeliharaan</div>

            <a href="#">
                Backup & Restore
            </a>

        </div>

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

        <div class="topbar">

            <h2>Dashboard Admin</h2>

            <div class="user">
                {{ Auth::user()->nama_lengkap }}
            </div>

        </div>


        <div class="content">

            <div class="welcome">

                <h1>Selamat Datang, Admin</h1>

                <p>
                    Kelola sistem SIPMAS melalui menu yang tersedia.
                </p>

            </div>


            <div class="cards">

                <div class="card">
                    <h3>Total Pengguna</h3>
                    <div class="number">0</div>
                </div>

                <div class="card">
                    <h3>Total Pengaduan</h3>
                    <div class="number">0</div>
                </div>

                <div class="card">
                    <h3>Pengaduan Selesai</h3>
                    <div class="number">0</div>
                </div>

            </div>

        </div>

    </main>

</body>
</html>