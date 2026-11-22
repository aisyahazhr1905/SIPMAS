@extends('layouts.admin')

@section('title', 'Tambah Seksi - SIPMAS')
@section('breadcrumb', 'Tambah Seksi')

@section('content')

<div class="page-heading">
    <h1>Tambah Seksi</h1>
    <p>Tambahkan seksi penanggung jawab untuk menangani pengaduan masyarakat.</p>
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
            Form Data Seksi
        </h2>

        <p style="
            margin: 0;
            color: #6b7c93;
            font-size: 13px;
        ">
            Lengkapi data seksi yang akan ditambahkan.
        </p>
    </div>

    <form action="{{ route('admin.seksi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_seksi">
                Nama Seksi
            </label>

            <input
                type="text"
                id="nama_seksi"
                name="nama_seksi"
                class="form-control"
                value="{{ old('nama_seksi') }}"
                placeholder="Contoh: Seksi Pelayanan"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="penanggung_jawab">
                Penanggung Jawab
            </label>

            <input
                type="text"
                id="penanggung_jawab"
                name="penanggung_jawab"
                class="form-control"
                value="{{ old('penanggung_jawab') }}"
                placeholder="Masukkan nama penanggung jawab"
                maxlength="100"
                required
            >
        </div>

        <div style="
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 15px;
            margin-top: 10px;
            border-top: 1px solid #e5ebf0;
        ">

            <a
                href="{{ route('admin.seksi.index') }}"
                class="admin-btn admin-btn-secondary"
            >
                Batal
            </a>

            <button
                type="submit"
                class="admin-btn admin-btn-primary"
            >
                Simpan Seksi
            </button>

        </div>

    </form>

</div>

@endsection