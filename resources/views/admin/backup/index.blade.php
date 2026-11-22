@extends('layouts.admin')

@section('title', 'Backup & Restore Data - SIPMAS')

@section('breadcrumb', 'Backup & Restore')

@section('content')

<div class="page-heading">
    <h1>Backup & Restore Data</h1>
    <p>
        Kelola pencadangan dan pemulihan data SIPMAS.
    </p>
</div>


{{-- =====================================================
     BACKUP & RESTORE
===================================================== --}}

<div class="backup-grid">

    {{-- BACKUP DATA --}}
    <div class="backup-card">

        <div class="backup-card-header">

            <div class="backup-icon">
                💾
            </div>

            <div>
                <h3>Backup Data</h3>
                <p>
                    Simpan salinan data SIPMAS untuk menjaga keamanan
                    dan mengantisipasi kehilangan data.
                </p>
            </div>

        </div>

        <form action="{{ route('admin.backup.create') }}" method="POST">
            @csrf

            <button type="submit" class="admin-btn admin-btn-success">
                Buat Backup Sekarang
            </button>
        </form>

    </div>


    {{-- RESTORE DATA --}}
    <div class="backup-card">

        <div class="backup-card-header">

            <div class="backup-icon">
                ♻
            </div>

            <div>
                <h3>Restore Data</h3>
                <p>
                    Pilih berkas backup untuk mengembalikan data SIPMAS.
                </p>
            </div>

        </div>

        <form
            action="{{ route('admin.backup.restore') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <input
                type="file"
                name="backup_file"
                accept=".sql,.txt"
                class="backup-file-input"
                required
            >

            <button
                type="submit"
                class="admin-btn admin-btn-warning"
                onclick="return confirm('Yakin ingin melakukan restore database? Data yang tersedia dapat berubah atau tertimpa oleh data dari file backup.')"
            >
                Restore Data
            </button>

        </form>

        <div class="backup-warning">
            ⚠ Pastikan file backup yang dipilih benar.
            Proses restore dapat mengubah data yang saat ini tersedia.
        </div>

    </div>

</div>


{{-- =====================================================
     RIWAYAT BACKUP
===================================================== --}}

<div class="admin-card backup-history">

    <div class="backup-history-header">
        <h3>Riwayat Backup</h3>
        <p>
            Daftar file backup yang tersimpan pada sistem.
        </p>
    </div>


    <div class="table-wrapper">

        <table class="admin-table">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Nama Berkas</th>
                    <th>Ukuran</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($files as $file)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <span class="badge badge-backup">
                                Backup
                            </span>
                        </td>

                        <td>
                            <span class="badge badge-file">
                                {{ $file->getFilename() }}
                            </span>
                        </td>

                        <td>
                            {{ number_format($file->getSize() / 1024, 2) }}
                            KB
                        </td>

                        <td>
                            {{ date('d-m-Y H:i:s', $file->getMTime()) }}
                        </td>

                        <td>

                            <div class="action-group">

                                <a
                                    href="{{ route('admin.backup.download', $file->getFilename()) }}"
                                    class="admin-btn admin-btn-primary"
                                >
                                    Unduh
                                </a>


                                <form
                                    action="{{ route('admin.backup.destroy', $file->getFilename()) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus file backup ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="admin-btn admin-btn-danger"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="empty-state">
                            Belum ada data backup.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


{{-- KEMBALI --}}

<div class="backup-back">

    <a
        href="{{ route('admin.dashboard') }}"
        class="admin-btn admin-btn-secondary"
    >
        ← Kembali ke Dashboard
    </a>

</div>

@endsection