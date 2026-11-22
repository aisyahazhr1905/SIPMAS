@extends('layouts.admin')

@section('title', 'Tambah Kategori - SIPMAS')
@section('breadcrumb', 'Tambah Kategori')

@section('content')

<div class="page-heading">
    <h1>Tambah Kategori</h1>
    <p>Tambahkan kategori baru untuk pengaduan masyarakat.</p>
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
            Form Kategori Pengaduan
        </h2>

        <p style="
            margin: 0;
            color: #6b7c93;
            font-size: 13px;
        ">
            Isi data kategori dengan lengkap dan benar.
        </p>
    </div>

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_kategori">
                Nama Kategori
            </label>

            <input
                type="text"
                id="nama_kategori"
                name="nama_kategori"
                class="form-control"
                value="{{ old('nama_kategori') }}"
                placeholder="Contoh: Infrastruktur"
                required
            >
        </div>

        <div class="form-group">
            <label for="deskripsi">
                Deskripsi
            </label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                class="form-control"
                placeholder="Masukkan deskripsi kategori..."
            >{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">
                Status
            </label>

            <select
                id="status"
                name="status"
                class="form-control"
                required
            >
                <option value="">-- Pilih Status --</option>

                <option value="aktif"
                    {{ old('status') === 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="nonaktif"
                    {{ old('status') === 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
        </div>

        <div style="
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 10px;
            margin-top: 10px;
            border-top: 1px solid #e5ebf0;
        ">

            <a
                href="{{ route('admin.kategori.index') }}"
                class="admin-btn admin-btn-secondary"
            >
                Batal
            </a>

            <button
                type="submit"
                class="admin-btn admin-btn-primary"
            >
                Simpan Kategori
            </button>

        </div>

    </form>

</div>

@endsection