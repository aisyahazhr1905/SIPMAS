@extends('layouts.admin')

@section('title', 'Edit Data RT/RW - SIPMAS')
@section('breadcrumb', 'Edit Data RT/RW')

@section('content')

<div class="page-heading">
    <h1>Edit Data RT/RW</h1>
    <p>Perbarui data Rukun Tetangga dan Rukun Warga pada sistem SIPMAS.</p>
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
            Form Edit Data RT/RW
        </h2>

        <p style="
            margin: 0;
            color: #6b7c93;
            font-size: 13px;
        ">
            Perbarui data RT/RW yang dipilih.
        </p>
    </div>

    <form
        action="{{ route('admin.rt_rw.update', $rtRw->id_rt_rw) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="no_rt">
                Nomor RT
            </label>

            <input
                type="text"
                id="no_rt"
                name="no_rt"
                class="form-control"
                value="{{ old('no_rt', $rtRw->no_rt) }}"
                placeholder="Contoh: 001"
                maxlength="5"
                required
            >

            <small style="
                display: block;
                margin-top: 6px;
                color: #718096;
                font-size: 12px;
            ">
                Masukkan nomor RT.
            </small>
        </div>

        <div class="form-group">
            <label for="no_rw">
                Nomor RW
            </label>

            <input
                type="text"
                id="no_rw"
                name="no_rw"
                class="form-control"
                value="{{ old('no_rw', $rtRw->no_rw) }}"
                placeholder="Contoh: 005"
                maxlength="5"
                required
            >

            <small style="
                display: block;
                margin-top: 6px;
                color: #718096;
                font-size: 12px;
            ">
                Masukkan nomor RW.
            </small>
        </div>

        <div class="form-group">
            <label for="nama_ketua">
                Nama Ketua RT/RW
            </label>

            <input
                type="text"
                id="nama_ketua"
                name="nama_ketua"
                class="form-control"
                value="{{ old('nama_ketua', $rtRw->nama_ketua) }}"
                placeholder="Masukkan nama ketua RT/RW"
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
                href="{{ route('admin.rt_rw.index') }}"
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