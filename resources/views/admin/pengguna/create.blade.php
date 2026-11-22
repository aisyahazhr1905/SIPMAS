@extends('layouts.admin')

@section('title', 'Tambah Pengguna - SIPMAS')
@section('breadcrumb', 'Tambah Pengguna')

@section('content')

<div class="page-heading">
    <h1>Tambah Pengguna</h1>
    <p>Tambahkan pengguna baru dan tentukan hak aksesnya dalam sistem SIPMAS.</p>
</div>

@if($errors->any())
    <div class="alert alert-error">
        <strong>Terjadi kesalahan:</strong>

        <ul style="margin: 8px 0 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-card">

    <div style="
        margin-bottom: 22px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e5ebf0;
    ">
        <h2 style="
            margin: 0 0 6px;
            color: #183b56;
            font-size: 18px;
        ">
            Form Data Pengguna
        </h2>

        <p style="
            margin: 0;
            color: #6b7c93;
            font-size: 13px;
        ">
            Lengkapi data pengguna yang akan ditambahkan ke dalam sistem.
        </p>
    </div>

    <form action="{{ route('admin.pengguna.store') }}" method="POST">
        @csrf

        {{-- NAMA LENGKAP --}}
        <div class="form-group">
            <label for="nama_lengkap">
                Nama Lengkap
            </label>

            <input
                type="text"
                id="nama_lengkap"
                name="nama_lengkap"
                class="form-control"
                value="{{ old('nama_lengkap') }}"
                placeholder="Masukkan nama lengkap"
                maxlength="255"
                required
            >
        </div>

        {{-- NIK --}}
        <div class="form-group">
            <label for="nik">
                NIK
            </label>

            <input
                type="text"
                id="nik"
                name="nik"
                class="form-control"
                value="{{ old('nik') }}"
                placeholder="Masukkan NIK"
                maxlength="30"
                required
            >
        </div>

        {{-- EMAIL --}}
        <div class="form-group">
            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
                maxlength="255"
                required
            >
        </div>

        {{-- NOMOR HP --}}
        <div class="form-group">
            <label for="no_hp">
                Nomor HP
            </label>

            <input
                type="text"
                id="no_hp"
                name="no_hp"
                class="form-control"
                value="{{ old('no_hp') }}"
                placeholder="Masukkan nomor HP"
                maxlength="20"
                required
            >
        </div>

        {{-- ALAMAT --}}
        <div class="form-group">
            <label for="alamat">
                Alamat
            </label>

            <textarea
                id="alamat"
                name="alamat"
                class="form-control"
                placeholder="Masukkan alamat lengkap"
                required
            >{{ old('alamat') }}</textarea>
        </div>

        {{-- ROLE --}}
        <div class="form-group">
            <label for="role">
                Role / Hak Akses
            </label>

            <select
                id="role"
                name="role"
                class="form-control"
                required
            >
                <option value="">
                    -- Pilih Role --
                </option>

                <option
                    value="admin"
                    {{ old('role') === 'admin' ? 'selected' : '' }}
                >
                    Admin
                </option>

                <option
                    value="petugas"
                    {{ old('role') === 'petugas' ? 'selected' : '' }}
                >
                    Petugas
                </option>

                <option
                    value="lurah"
                    {{ old('role') === 'lurah' ? 'selected' : '' }}
                >
                    Lurah
                </option>

                <option
                    value="warga"
                    {{ old('role') === 'warga' ? 'selected' : '' }}
                >
                    Warga
                </option>
            </select>

            <small style="
                display: block;
                margin-top: 6px;
                color: #718096;
                font-size: 12px;
            ">
                Pilih hak akses sesuai dengan peran pengguna.
            </small>
        </div>

        {{-- PASSWORD --}}
        <div class="form-group">
            <label for="password">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                placeholder="Minimal 6 karakter"
                required
            >

            <small style="
                display: block;
                margin-top: 6px;
                color: #718096;
                font-size: 12px;
            ">
                Password minimal 6 karakter.
            </small>
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div class="form-group">
            <label for="password_confirmation">
                Konfirmasi Password
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                placeholder="Masukkan kembali password"
                required
            >
        </div>

        {{-- TOMBOL --}}
        <div style="
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 15px;
            margin-top: 10px;
            border-top: 1px solid #e5ebf0;
        ">

            <a
                href="{{ route('admin.pengguna.index') }}"
                class="admin-btn admin-btn-secondary"
            >
                Batal
            </a>

            <button
                type="submit"
                class="admin-btn admin-btn-primary"
            >
                Simpan Pengguna
            </button>

        </div>

    </form>

</div>

@endsection