
@extends('layouts.admin')

@section('title', 'Kategori Pengaduan - SIPMAS')
@section('breadcrumb', 'Kategori Pengaduan')

@section('content')

<div class="page-heading">
    <h1>Kategori Pengaduan</h1>
    <p>Kelola kategori pengaduan yang digunakan dalam sistem SIPMAS.</p>
</div>

<div class="admin-card">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h2 style="margin:0; color:#183b56; font-size:18px;">
                Data Kategori Pengaduan
            </h2>
            <p style="margin:5px 0 0; color:#6b7c93; font-size:13px;">
                Daftar kategori pengaduan masyarakat.
            </p>
        </div>

        <a href="{{ route('admin.kategori.create') }}"
           class="admin-btn admin-btn-success">
            + Tambah Kategori
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kategori as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong style="color:#183b56;">
                                {{ $item->nama_kategori }}
                            </strong>
                        </td>

                        <td>
                            {{ $item->deskripsi ?: '-' }}
                        </td>

                        <td>
                            @if($item->status === 'aktif')
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

                                @if(Route::has('admin.kategori.edit'))
                                    <a href="{{ route('admin.kategori.edit', $item->id_kategori) }}"
                                       class="admin-btn admin-btn-warning">
                                        Edit
                                    </a>
                                @endif

                                @if(Route::has('admin.kategori.destroy'))
                                    <form action="{{ route('admin.kategori.destroy', $item->id_kategori) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="admin-btn admin-btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5"
                            style="text-align:center; padding:35px; color:#8b96a5;">
                            Belum ada kategori pengaduan.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
