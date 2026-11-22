<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin SIPMAS')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body>

<div class="admin-wrapper">


    {{-- =====================================================
         SIDEBAR
         ===================================================== --}}

    <aside class="admin-sidebar">


        {{-- LOGO --}}

        <div class="sidebar-brand">

            <div class="sidebar-logo">
                SIPMAS
            </div>

            <div class="sidebar-subtitle">
                Sistem Informasi Pengaduan<br>
                Masyarakat
            </div>

        </div>


        {{-- MENU --}}

        <nav class="sidebar-menu">


            <div class="sidebar-section">
                MENU UTAMA
            </div>


            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                Dashboard

            </a>


            <div class="sidebar-section">
                MANAJEMEN SISTEM
            </div>


            <a href="{{ route('admin.pengguna.index') }}"
               class="{{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">

                Pengguna & Hak Akses

            </a>


            <a href="{{ route('admin.kategori.index') }}"
               class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">

                Kategori Pengaduan

            </a>


            <a href="{{ route('admin.rt_rw.index') }}"
               class="{{ request()->routeIs('admin.rt_rw.*') ? 'active' : '' }}">

                Data RT/RW

            </a>


            <a href="{{ route('admin.seksi.index') }}"
               class="{{ request()->routeIs('admin.seksi.*') ? 'active' : '' }}">

                Seksi Penanggung Jawab

            </a>


            <div class="sidebar-section">
                PEMELIHARAAN
            </div>


            <a href="{{ route('admin.backup.index') }}"
               class="{{ request()->routeIs('admin.backup.*') ? 'active' : '' }}">

                Backup & Restore

            </a>


        </nav>


        {{-- BAGIAN BAWAH --}}

        <div class="sidebar-bottom">


            <div class="admin-info">

                <strong>
                    Admin SIPMAS
                </strong>

                <span>
                    {{ Auth::user()->nama_lengkap ?? 'Administrator' }}
                </span>

            </div>


            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="logout-button">

                    Keluar

                </button>

            </form>


        </div>


    </aside>



    {{-- =====================================================
         MAIN
         ===================================================== --}}

    <div class="admin-main">


        {{-- TOPBAR --}}

        <header class="admin-topbar">


            <div class="breadcrumb">

                <span>
                    Admin
                </span>

                <span>
                    /
                </span>

                <strong>
                    @yield('breadcrumb', 'Dashboard')
                </strong>

            </div>


            <div class="topbar-right">


                <input
                    type="text"
                    class="search-box"
                    placeholder="Cari menu atau data..."
                >


                <div class="notification">
                    🔔
                </div>


                <div class="avatar">
                    A
                </div>


                <span class="topbar-name">
                    Admin Sistem
                </span>


            </div>


        </header>



        {{-- CONTENT --}}

        <main class="admin-content">


            {{-- SUCCESS --}}

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR --}}

            @if(session('error'))

                <div class="alert alert-error">

                    {{ session('error') }}

                </div>

            @endif


            {{-- VALIDATION ERROR --}}

            @if($errors->any())

                <div class="alert alert-error">

                    <strong>
                        Terjadi kesalahan:
                    </strong>

                    <ul style="margin:8px 0 0 18px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            @yield('content')


        </main>


    </div>


</div>

</body>

</html>