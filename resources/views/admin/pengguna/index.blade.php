
@extends('layouts.admin')

@section('title', 'Pengguna & Hak Akses - SIPMAS')
@section('breadcrumb', 'Pengguna & Hak Akses')

@section('content')

<div class="page-heading">
    <h1>Pengguna & Hak Akses</h1>
    <p>Kelola akun pengguna dan hak akses dalam sistem SIPMAS.</p>
</div>

<div class="admin-card">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h2 style="margin:0; color:#183b56; font-size:18px;">
                Data Pengguna
            </h2>
            <p style="margin:5px 0 0; color:#6b7c93; font-size:13px;">
                Daftar pengguna, peran, dan status akun.
            </p>
        </div>

        <a href="{{ route('admin.pengguna.create') }}"
           class="admin-btn admin-btn-success">
            + Tambah Pengguna
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pengguna as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong style="color:#183b56;">
                                {{ $item->nama_lengkap }}
                            </strong>
                        </td>

                        <td>{{ $item->email }}</td>

                        <td>{{ $item->no_hp }}</td>

                        <td>
                            <span style="
                                display:inline-block;
                                padding:5px 10px;
                                border-radius:12px;
                                background:#eaf2fb;
                                color:#2870a8;
                                font-size:12px;
                                font-weight:600;
                            ">
                                {{ ucfirst($item->role) }}
                            </span>
                        </td>

                        <td>

                            @if($item->status_akun === 'aktif')

                                <span style="
                                    display:inline-block;
                                    padding:5px 10px;
                                    border-radius:12px;
                                    background:#dff4e9;
                                    color:#23804f;
                                    font-size:12px;
                                    font-weight:600;
                                ">
                                    Aktif
                                </span>

                            @else

                                <span style="
                                    display:inline-block;
                                    padding:5px 10px;
                                    border-radius:12px;
                                    background:#fde5e5;
                                    color:#a52323;
                                    font-size:12px;
                                    font-weight:600;
                                ">
                                    Nonaktif
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="action-group">

                                @if(Route::has('admin.pengguna.edit'))

                                    <a href="{{ route('admin.pengguna.edit', $item->id_pengguna) }}"
                                       class="admin-btn admin-btn-warning">
                                        Edit
                                    </a>

                                @endif

                                <form action="{{ route('admin.pengguna.destroy', $item->id_pengguna) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')"
                                      style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="admin-btn admin-btn-danger">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7"
                            style="text-align:center; padding:35px; color:#8b96a5;">
                            Belum ada data pengguna.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection
