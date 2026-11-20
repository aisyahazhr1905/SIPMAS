<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SipMas - Sistem Informasi Pengaduan Masyarakat</title>

    <style>
        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #39789d;
            color: #123f68;
        }


        /* =====================================================
           CONTAINER UTAMA
        ===================================================== */

        .page {
            width: 100%;
            max-width: 1540px;
            min-height: 100vh;
            margin: 0 auto;
            background: #eaf6ff;
            overflow: hidden;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            height: 90px;
            padding: 0 38px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #ffffff;
        }

        /* BRAND */

        .brand {
            min-width: 300px;

            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: #e8f3ff;

            color: #0878d1;
            font-size: 20px;
            font-weight: bold;
        }

        .brand-text h1 {
            margin-bottom: 5px;

            color: #0878d1;
            font-size: 23px;
            line-height: 1;
        }

        .brand-text p {
            color: #52718b;
            font-size: 10px;
            line-height: 1.35;
        }


        /* NAVIGASI */

        .navigation {
            height: 100%;

            display: flex;
            align-items: center;
            gap: 38px;
        }

        .navigation a {
            position: relative;

            height: 100%;
            padding-top: 3px;

            display: flex;
            align-items: center;

            text-decoration: none;
            color: #31516c;

            font-size: 13px;
        }

        .navigation a.active {
            color: #0878d1;
            font-weight: bold;
        }

        .navigation a.active::after {
            content: "";

            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;

            height: 2px;
            background: #0878d1;
        }


        /* BUTTON HEADER */

        .header-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-login,
        .btn-register {
            height: 38px;
            padding: 0 23px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 6px;

            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-login {
            color: #0878d1;
            background: #ffffff;
            border: 1px solid #cfe3f4;
        }

        .btn-register {
            color: #ffffff;
            background: #0878d1;
            border: 1px solid #0878d1;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;

            width: 100%;
            height: 360px;

            overflow: hidden;

            background: #0878d1;
        }


        /* FOTO HERO */

        .hero-photo {
            position: absolute;
            top: 0;
            right: 0;

            width: 58%;
            height: 100%;

            object-fit: cover;
            object-position: center center;

            z-index: 1;
        }


        /* =====================================================
           BENTUK BIRU HERO
           Dibuat lebih bulat dan masuk ke area foto
        ===================================================== */

        .hero-blue {
            position: absolute;
            top: 0;
            left: 0;

            width: 55%;
            height: 100%;

            background: #0878d1;

            z-index: 2;

            /*
            Bentuk biru dibuat seperti lengkungan
            pada desain contoh
            */
            clip-path: ellipse(78% 105% at 0% 50%);
        }


        /* =====================================================
           KONTEN HERO
        ===================================================== */

        .hero-content {
            position: relative;

            z-index: 4;

            width: 52%;
            height: 100%;

            padding: 40px 30px 30px 55px;

            color: #ffffff;
        }


        /* JUDUL UTAMA */

        .hero-content h2 {
            max-width: 390px;
            margin-bottom: 2px;

            color: #ffffff;

            font-size: 25px;
            line-height: 1.08;
            font-weight: 700;
        }


        /* TAGLINE */

        .hero-tagline {
            margin-bottom: 3px;

            color: #8fdcff;

            font-size: 25px;
            line-height: 1.05;
            font-weight: 700;
            font-style: italic;
        }


        /* DESKRIPSI */

        .hero-content p {
            max-width: 350px;
            margin-bottom: 22px;

            color: #ffffff;

            font-size: 11px;
            line-height: 1.4;
        }


        /* BUTTON HERO */

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hero-btn-primary,
        .hero-btn-secondary {
            height: 34px;
            padding: 0 18px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 6px;

            text-decoration: none;

            font-size: 11px;
            font-weight: bold;
        }

        .hero-btn-primary {
            color: #0878d1;
            background: #ffffff;
        }

        .hero-btn-secondary {
            color: #ffffff;
            background: transparent;
            border: 1px solid #ffffff;
        }


        /* =====================================================
           CARD LACAK PENGADUAN
        ===================================================== */

        .tracking-card {
            position: absolute;
            right: 25px;
            bottom: 28px;

            z-index: 5;

            width: 205px;
            padding: 14px;

            background: #ffffff;
            border-radius: 9px;

            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.14);
        }

        .tracking-card h3 {
            margin-bottom: 8px;

            color: #123f68;
            font-size: 12px;
        }

        .tracking-label {
            margin-bottom: 4px;

            color: #648096;
            font-size: 8px;
        }

        .tracking-form {
            display: flex;
            gap: 5px;
        }

        .tracking-form input {
            width: 100%;
            height: 28px;
            padding: 0 7px;

            border: 1px solid #d5e4ef;
            border-radius: 4px;

            color: #123f68;
            font-size: 8px;
        }

        .tracking-form button {
            width: 40px;

            border: none;
            border-radius: 4px;

            background: #0878d1;
            color: #ffffff;

            font-size: 8px;
            font-weight: bold;
        }

        .tracking-status {
            display: flex;
            justify-content: space-between;

            margin-top: 12px;
        }

        .status {
            text-align: center;

            color: #7c8d99;
            font-size: 7px;
        }

        .status-dot {
            width: 8px;
            height: 8px;

            margin: 0 auto 3px;

            border-radius: 50%;
            background: #20bd78;
        }

        .status.orange .status-dot {
            background: #f6a900;
        }

        .status.gray .status-dot {
            background: #ccd5dc;
        }


        /* =====================================================
           STATISTIK
        ===================================================== */

        .statistics {
            padding: 18px 36px 10px;

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;

            background: #eaf6ff;
        }

        .stat-card {
            height: 70px;
            padding: 10px 18px;

            display: flex;
            align-items: center;

            background: #ffffff;
            border-radius: 8px;

            box-shadow: 0 3px 10px rgba(30, 100, 150, 0.08);
        }

        .stat-icon {
            width: 39px;
            height: 39px;
            margin-right: 13px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: #e7f3ff;

            color: #0878d1;
            font-size: 16px;
        }

        .stat-card h3 {
            margin-bottom: 2px;

            color: #123f68;
            font-size: 18px;
        }

        .stat-card p {
            color: #648096;
            font-size: 8px;
        }


        /* =====================================================
           CARA KERJA
        ===================================================== */

        .work-section {
            padding: 6px 36px 16px;

            background: #eaf6ff;
        }

        .section-title {
            margin: 3px 0 13px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .section-title span {
            width: 45px;
            height: 1px;

            background: #b7dff5;
        }

        .section-title h2 {
            color: #123f68;
            font-size: 15px;
        }

        .work-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .work-card {
            height: 86px;
            padding: 11px;

            background: #ffffff;
            border-radius: 7px;

            box-shadow: 0 2px 8px rgba(30, 100, 150, 0.06);
        }

        .work-number {
            width: 22px;
            height: 22px;
            margin-bottom: 7px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #0878d1;
            color: #ffffff;

            font-size: 9px;
            font-weight: bold;
        }

        .work-card h3 {
            margin-bottom: 3px;

            color: #123f68;
            font-size: 9px;
        }

        .work-card p {
            color: #71889b;
            font-size: 7px;
            line-height: 1.35;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            height: 28px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #075a9e;
            color: #ffffff;

            font-size: 7px;
        }


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 1000px) {

            .header {
                padding: 0 25px;
            }

            .navigation {
                gap: 20px;
            }

            .hero-content {
                padding-left: 30px;
            }

            .hero-content h2 {
                font-size: 25px;
            }

            .hero-tagline {
                font-size: 21px;
            }

            .hero-content p {
                font-size: 11px;
            }
        }


        /* =====================================================
           RESPONSIVE MOBILE
        ===================================================== */

        @media (max-width: 750px) {

            .header {
                height: auto;
                padding: 15px;

                flex-wrap: wrap;
                gap: 12px;
            }

            .brand {
                min-width: auto;
            }

            .navigation {
                order: 3;

                width: 100%;
                height: 45px;

                justify-content: center;
            }

            .navigation a {
                height: 45px;
            }

            .header-buttons {
                margin-left: auto;
            }


            /* HERO MOBILE */

            .hero {
                height: 620px;
            }

            .hero-photo {
                top: auto;
                bottom: 0;

                width: 100%;
                height: 300px;
            }

            .hero-blue {
                width: 100%;
                height: 58%;

                border-radius: 0 0 50% 50%;
                clip-path: none;
            }

            .hero-content {
                width: 100%;
                padding: 45px 25px;
            }

            .hero-content h2 {
                font-size: 28px;
            }

            .hero-tagline {
                font-size: 25px;
            }

            .hero-content p {
                font-size: 13px;
            }

            .tracking-card {
                display: none;
            }


            /* STATISTIK MOBILE */

            .statistics {
                grid-template-columns: 1fr;
            }


            /* CARA KERJA MOBILE */

            .work-grid {
                grid-template-columns: 1fr 1fr;
            }
        }


        /* =====================================================
           RESPONSIVE HP KECIL
        ===================================================== */

        @media (max-width: 500px) {

            .brand-text h1 {
                font-size: 20px;
            }

            .brand-text p {
                font-size: 9px;
            }

            .header-buttons {
                width: 100%;
                margin-left: 0;
            }

            .btn-login,
            .btn-register {
                flex: 1;
            }

            .navigation {
                gap: 15px;
            }

            .navigation a {
                font-size: 11px;
            }

            .hero-content h2 {
                font-size: 25px;
            }

            .hero-tagline {
                font-size: 23px;
            }

            .hero-content p {
                font-size: 12px;
            }

            .work-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>


<body>

    <div class="page">

        <!-- =================================================
             HEADER
        ================================================== -->

        <header class="header">

            <!-- BRAND -->
            <div class="brand">

                <div class="brand-logo">
                    SP
                </div>

                <div class="brand-text">
                    <h1>SipMas</h1>

                    <p>
                        Sistem Informasi Pengaduan Masyarakat<br>
                        Kelurahan Sungai Bangek
                    </p>
                </div>

            </div>


            <!-- NAVIGASI -->
            <nav class="navigation">

                <a href="/" class="active">
                    Beranda
                </a>

                <a href="#">
                    Cara Pengaduan
                </a>

                <a href="#">
                    Kontak
                </a>

            </nav>


            <!-- BUTTON -->
            <div class="header-buttons">

                <a
                    href="{{ route('login') }}"
                    class="btn-login"
                >
                    Masuk
                </a>

                <a
                    href="#"
                    class="btn-register"
                >
                    Daftar
                </a>

            </div>

        </header>


        <!-- =================================================
             HERO
        ================================================== -->

        <section class="hero">

            <!-- FOTO -->
            <img
                src="{{ asset('gedung-kelurahan.jpg') }}"
                class="hero-photo"
                alt="Kelurahan Sungai Bangek"
            >


            <!-- PANEL BIRU -->
            <div class="hero-blue"></div>


            <!-- KONTEN HERO -->
            <div class="hero-content">

                <h2>
                    Bersama Kita Wujudkan<br>
                    Pelayanan yang Lebih Baik,
                </h2>

                <div class="hero-tagline">
                    Aspirasi Warga, Langkah<br>
                    untuk Perubahan
                </div>

                <p>
                    Laporkan pengaduan, sampaikan aspirasi,<br>
                    dan jadikan kampus kita lebih responsif.
                </p>

                <div class="hero-buttons">

                    <a
                        href="{{ route('login') }}"
                        class="hero-btn-primary"
                    >
                        Ajukan Pengaduan
                    </a>

                    <a
                        href="#"
                        class="hero-btn-secondary"
                    >
                        Lacak Pengaduan
                    </a>

                </div>

            </div>

            <!-- =================================================
                 CARD LACAK STATUS
            ================================================== -->

            <div class="tracking-card">

                <h3>
                    Lacak Status Pengaduan
                </h3>

                <div class="tracking-label">
                    Nomor Tiket
                </div>

                <div class="tracking-form">

                    <input
                        type="text"
                        value="SP-0412"
                        placeholder="Nomor tiket"
                    >

                    <button>
                        Cari
                    </button>

                </div>

                <div class="tracking-status">

                    <div class="status">
                        <div class="status-dot"></div>
                        Diterima
                    </div>

                    <div class="status">
                        <div class="status-dot"></div>
                        Diverifikasi
                    </div>

                    <div class="status orange">
                        <div class="status-dot"></div>
                        Diproses
                    </div>

                    <div class="status gray">
                        <div class="status-dot"></div>
                        Selesai
                    </div>

                </div>

            </div>

        </section>


        <!-- =================================================
             STATISTIK
        ================================================== -->

        <section class="statistics">

            <div class="stat-card">

                <div class="stat-icon">
                    👥
                </div>

                <div>
                    <h3>1.248</h3>
                    <p>Total Pengaduan</p>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ▤
                </div>

                <div>
                    <h3>1.102</h3>
                    <p>Pengaduan Selesai</p>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ◷
                </div>

                <div>
                    <h3>2.4 hari</h3>
                    <p>Rata-rata Penanganan</p>
                </div>

            </div>

        </section>


        <!-- =================================================
             CARA KERJA
        ================================================== -->

        <section class="work-section">

            <div class="section-title">

                <span></span>

                <h2>
                    Cara Kerja
                </h2>

                <span></span>

            </div>


            <div class="work-grid">

                <div class="work-card">

                    <div class="work-number">
                        1
                    </div>

                    <h3>
                        Daftar / Login
                    </h3>

                    <p>
                        Buat akun warga atau masuk ke akun SIPMAS.
                    </p>

                </div>


                <div class="work-card">

                    <div class="work-number">
                        2
                    </div>

                    <h3>
                        Isi Pengaduan
                    </h3>

                    <p>
                        Masukkan judul, kategori, lokasi, dan uraian.
                    </p>

                </div>


                <div class="work-card">

                    <div class="work-number">
                        3
                    </div>

                    <h3>
                        Diverifikasi
                    </h3>

                    <p>
                        Pengaduan diperiksa oleh petugas.
                    </p>

                </div>


                <div class="work-card">

                    <div class="work-number">
                        4
                    </div>

                    <h3>
                        Pantau & Tanggapan
                    </h3>

                    <p>
                        Pantau status dan perkembangan pengaduan.
                    </p>

                </div>

            </div>

        </section>


        <!-- =================================================
             FOOTER
        ================================================== -->

        <footer class="footer">

            © 2026 Kelurahan Sungai Bangek, Kota Padang
            &nbsp; | &nbsp;
            Jam Layanan: Senin–Jumat 08.00–16.00

        </footer>

    </div>

</body>

</html>