@extends('layouts.admin')

@section('title', 'Dashboard Admin - SIPMAS')

@section('breadcrumb', 'Dashboard')

@section('content')

<div class="page-heading">

    <h1>Dashboard Admin</h1>

    <p>
        Kelola dan pantau sistem SIPMAS melalui menu administrasi yang tersedia.
    </p>

</div>


{{-- =====================================================
     SELAMAT DATANG
===================================================== --}}

<div class="admin-card welcome-card">

    <div class="welcome-icon">
        👋
    </div>

    <div>

        <h2>
            Selamat Datang, Admin
        </h2>

        <p>
            Kelola data pengguna, kategori pengaduan, RT/RW,
            seksi penanggung jawab, serta backup data SIPMAS.
        </p>

    </div>

</div>


{{-- =====================================================
     RINGKASAN DATA
===================================================== --}}

<div class="summary-heading">

    <h2>
        Ringkasan Data
    </h2>

    <p>
        Informasi singkat mengenai data yang terdapat dalam sistem.
    </p>

</div>


<div class="dashboard-cards">


    {{-- TOTAL PENGGUNA --}}

    <div class="stat-card">

        <div class="stat-card-top">

            <div>

                <h3>
                    Total Pengguna
                </h3>

                <div class="stat-number">
                    0
                </div>

                <p class="stat-card-description">
                    Pengguna terdaftar
                </p>

            </div>

            <div class="stat-icon">
                👤
            </div>

        </div>

    </div>


    {{-- TOTAL PENGADUAN --}}

    <div class="stat-card">

        <div class="stat-card-top">

            <div>

                <h3>
                    Total Pengaduan
                </h3>

                <div class="stat-number">
                    0
                </div>

                <p class="stat-card-description">
                    Seluruh pengaduan
                </p>

            </div>

            <div class="stat-icon">
                📋
            </div>

        </div>

    </div>


    {{-- PENGADUAN SELESAI --}}

    <div class="stat-card">

        <div class="stat-card-top">

            <div>

                <h3>
                    Pengaduan Selesai
                </h3>

                <div class="stat-number">
                    0
                </div>

                <p class="stat-card-description">
                    Pengaduan yang telah selesai
                </p>

            </div>

            <div class="stat-icon stat-icon-success">
                ✓
            </div>

        </div>

    </div>

</div>


{{-- =====================================================
     MANAJEMEN SISTEM
===================================================== --}}

<div class="admin-card" style="margin-top:25px;">

    <h2 class="management-heading">
        Manajemen Sistem
    </h2>

    <p class="management-description">
        Gunakan menu berikut untuk mengelola data SIPMAS.
    </p>


    <div class="management-grid">


        {{-- PENGGUNA --}}

        <a
            href="{{ route('admin.pengguna.index') }}"
            class="management-link"
        >

            <strong>
                Pengguna & Hak Akses
            </strong>

            <span>
                Kelola akun dan hak akses pengguna.
            </span>

        </a>


        {{-- KATEGORI --}}

        <a
            href="{{ route('admin.kategori.index') }}"
            class="management-link"
        >

            <strong>
                Kategori Pengaduan
            </strong>

            <span>
                Kelola kategori pengaduan masyarakat.
            </span>

        </a>


        {{-- RT/RW --}}

        <a
            href="{{ route('admin.rt_rw.index') }}"
            class="management-link"
        >

            <strong>
                Data RT/RW
            </strong>

            <span>
                Kelola data RT dan RW kelurahan.
            </span>

        </a>


        {{-- SEKSI --}}

        <a
            href="{{ route('admin.seksi.index') }}"
            class="management-link"
        >

            <strong>
                Seksi Penanggung Jawab
            </strong>

            <span>
                Kelola seksi penanggung jawab pengaduan.
            </span>

        </a>


        {{-- BACKUP --}}

        <a
            href="{{ route('admin.backup.index') }}"
            class="management-link"
        >

            <strong>
                Backup & Restore
            </strong>

            <span>
                Kelola pencadangan dan pemulihan data.
            </span>

        </a>


    </div>

</div>

@endsection