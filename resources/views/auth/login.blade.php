<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SIPMAS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #3f7ca3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .page {
            width: 100%;
            max-width: 900px;
        }

        .login-wrapper {
            width: 100%;
            height: 480px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
        }

        /* =========================
           PANEL KIRI
        ========================== */

        .left-panel {
            background: linear-gradient(
                145deg,
                #173f68,
                #285f87
            );

            color: white;
            padding: 35px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .brand-icon {
            width: 27px;
            height: 27px;
            background: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1c4d75;
            font-size: 14px;
            font-weight: bold;
        }

        .brand-name {
            font-size: 14px;
            font-weight: bold;
        }

        .brand-subtitle {
            font-size: 7px;
            opacity: 0.85;
            margin-top: 2px;
        }

        .left-content {
            max-width: 360px;
        }

        .left-content h1 {
            font-size: 25px;
            line-height: 1.18;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .left-content p {
            font-size: 10px;
            line-height: 1.6;
            color: #e0ebf4;
            max-width: 330px;
        }

        .left-footer {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 7px;
            color: #d5e3ee;
        }

        /* =========================
           PANEL KANAN
        ========================== */

        .right-panel {
            background: #f4f7fb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-card {
            width: 100%;
            max-width: 315px;
            background: white;
            padding: 26px 28px;
            border-radius: 5px;
            box-shadow: 0 6px 20px rgba(20, 45, 70, 0.08);
        }

        .login-header {
            margin-bottom: 14px;
        }

        .login-header h2 {
            font-size: 20px;
            color: #263746;
            margin-bottom: 5px;
        }

        .login-header p {
            font-size: 9px;
            color: #8a97a3;
        }

        /* =========================
           ROLE
        ========================== */

        .role-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4px;
            margin-bottom: 16px;
        }

        .role-item {
            border: none;
            background: #f0f3f6;
            color: #7d8994;
            height: 30px;
            border-radius: 3px;
            font-size: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .role-item.active {
            background: #1d5687;
            color: white;
            font-weight: bold;
        }

        .role-item:hover {
            background: #2d6b9c;
            color: white;
        }

        /* =========================
           ERROR
        ========================== */

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 9px;
            border-radius: 4px;
            margin-bottom: 13px;
            font-size: 9px;
        }

        /* =========================
           FORM
        ========================== */

        .form-group {
            margin-bottom: 13px;
        }

        .form-group label {
            display: block;
            color: #596773;
            font-size: 9px;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            height: 33px;
            border: 1px solid #dce2e7;
            border-radius: 3px;
            padding: 0 9px;
            font-size: 10px;
            color: #344454;
            outline: none;
            background: white;
        }

        .form-group input:focus {
            border-color: #4d83a7;
        }

        .form-group input::placeholder {
            color: #b4bdc5;
        }

        /* =========================
           OPTIONS
        ========================== */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 2px 0 14px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #7b8791;
            font-size: 8px;
        }

        .remember input {
            width: 11px;
            height: 11px;
            accent-color: #1d5687;
        }

        .forgot {
            color: #28628e;
            text-decoration: none;
            font-size: 8px;
            font-weight: 600;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        /* =========================
           BUTTON
        ========================== */

        .btn-login {
            width: 100%;
            height: 34px;
            border: none;
            border-radius: 3px;
            background: #1d5687;
            color: white;
            font-size: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #16466f;
        }

        /* =========================
           REGISTER
        ========================== */

        .register {
            text-align: center;
            margin-top: 11px;
            color: #8b969f;
            font-size: 8px;
        }

        .register a {
            color: #24608c;
            font-weight: bold;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 750px) {

            .login-wrapper {
                height: auto;
                grid-template-columns: 1fr;
            }

            .left-panel {
                min-height: 300px;
            }

            .right-panel {
                min-height: 420px;
            }
        }

        @media (max-width: 450px) {

            .left-panel {
                padding: 25px;
            }

            .left-content h1 {
                font-size: 21px;
            }

            .right-panel {
                padding: 20px;
            }

            .login-card {
                padding: 22px;
            }

            .role-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="login-wrapper">

        <!-- =========================
             KIRI
        ========================== -->

        <div class="left-panel">

            <div class="brand">

                <div class="brand-icon">
                    S
                </div>

                <div>

                    <div class="brand-name">
                        SIPMAS
                    </div>

                    <div class="brand-subtitle">
                        Sistem Informasi Pengaduan Masyarakat
                    </div>

                </div>

            </div>


            <div class="left-content">

                <h1>
                    Sampaikan pengaduan,<br>
                    pantau penanganannya,<br>
                    kapan saja dimana saja.
                </h1>

                <p>
                    Sistem Informasi Pengaduan Masyarakat berbasis web.
                    Setiap pengaduan mendapat nomor tiket dan dapat dilacak
                    statusnya secara transparan.
                </p>

            </div>


            <div class="left-footer">

                <span>© SIPMAS 2026</span>
                <span>•</span>
                <span>Notifikasi status</span>
                <span>•</span>
                <span>Riwayat tindak lanjut</span>

            </div>

        </div>


        <!-- =========================
             KANAN
        ========================== -->

        <div class="right-panel">

            <div class="login-card">

                <div class="login-header">

                    <h2>
                        Masuk sebagai
                    </h2>

                    <p>
                        Pilih peran, lalu masukkan akun Anda
                    </p>

                </div>


                <!-- PILIHAN ROLE -->

                <div class="role-list">

                    <button
                        type="button"
                        class="role-item active"
                        data-role="warga"
                    >
                        Masyarakat
                    </button>

                    <button
                        type="button"
                        class="role-item"
                        data-role="petugas"
                    >
                        Petugas
                    </button>

                    <button
                        type="button"
                        class="role-item"
                        data-role="lurah"
                    >
                        Pimpinan
                    </button>

                    <button
                        type="button"
                        class="role-item"
                        data-role="admin"
                    >
                        Admin
                    </button>

                </div>


                @if ($errors->any())

                    <div class="error">
                        {{ $errors->first() }}
                    </div>

                @endif


                <form
                    action="{{ route('login.process') }}"
                    method="POST"
                >

                    @csrf

                    <!-- ROLE YANG DIPILIH DIKIRIM KE BACKEND -->
                    <input
                        type="hidden"
                        name="role"
                        id="selectedRole"
                        value="warga"
                    >


                    <div class="form-group">

                        <label for="email">
                            Email / NIK
                        </label>

                        <input
                            type="text"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email atau NIK"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="password">
                            Kata Sandi
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan kata sandi"
                            required
                        >

                    </div>


                    <div class="form-options">

                        <label class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                            >

                            <span>
                                Ingat saya
                            </span>

                        </label>


                        <a
                            href="#"
                            class="forgot"
                            onclick="alert('Fitur lupa kata sandi akan segera tersedia.')"
                        >
                            Lupa kata sandi?
                        </a>

                    </div>


                    <button
                        type="submit"
                        class="btn-login"
                    >
                        Masuk
                    </button>

                </form>


                <div class="register">

                    Belum punya akun?

                    <a
                        href="#"
                        onclick="alert('Halaman pendaftaran akan segera tersedia.')"
                    >
                        Daftar sekarang
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    const roleButtons = document.querySelectorAll('.role-item');
    const selectedRole = document.getElementById('selectedRole');

    roleButtons.forEach(function(button) {

        button.addEventListener('click', function() {

            // Hapus active dari semua role
            roleButtons.forEach(function(item) {
                item.classList.remove('active');
            });

            // Aktifkan role yang diklik
            this.classList.add('active');

            // Simpan role ke hidden input
            selectedRole.value = this.dataset.role;

        });

    });

</script>

</body>
</html>