@extends('layouts.admin')

@section('title', 'Edit Seksi - SIPMAS')
@section('breadcrumb', 'Edit Seksi')

@section('content')

<div class="page-heading">
    <h1>Edit Seksi</h1>
    <p>Perbarui data seksi penanggung jawab dalam sistem SIPMAS.</p>
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
            Form Edit Seksi
        </h2>

        <p style="
            margin: 0;
            color: #6b7c93;
            font-size: 13px;
        ">
            Perbarui data seksi yang dipilih.
        </p>
    </div>

    <form
        action="{{ route('admin.seksi.update', $seksi->id_seksi) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_seksi">
                Nama Seksi
            </label>

            <input
                type="text"
                id="nama_seksi"
                name="nama_seksi"
                class="form-control"
                value="{{ old('nama_seksi', $seksi->nama_seksi) }}"
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
                value="{{ old('penanggung_jawab', $seksi->penanggung_jawab) }}"
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
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection