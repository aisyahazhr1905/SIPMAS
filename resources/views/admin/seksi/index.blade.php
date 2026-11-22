
@extends('layouts.admin')

@section('title', 'Seksi Penanggung Jawab - SIPMAS')
@section('breadcrumb', 'Seksi Penanggung Jawab')

@section('content')

<div class="page-heading">
    <h1>Seksi Penanggung Jawab</h1>
    <p>Kelola seksi yang bertanggung jawab dalam penanganan pengaduan.</p>
</div>

<div class="admin-card">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h2 style="margin:0; color:#183b56; font-size:18px;">
                Data Seksi
            </h2>
            <p style="margin:5px 0 0; color:#6b7c93; font-size:13px;">
                Daftar seksi dan penanggung jawab.
            </p>
        </div>

        <a href="{{ route('admin.seksi.create') }}"
           class="admin-btn admin-btn-success">
            + Tambah Seksi
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">

            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Nama Seksi</th>
                    <th>Penanggung Jawab</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($seksi as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong style="color:#183b56;">
                                {{ $item->nama_seksi }}
                            </strong>
                        </td>

                        <td>
                            {{ $item->penanggung_jawab }}
                        </td>

                        <td>

                            <div class="action-group">

                                <a href="{{ route('admin.seksi.edit', $item->id_seksi) }}"
                                   class="admin-btn admin-btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.seksi.destroy', $item->id_seksi) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus seksi ini?')"
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
                        <td colspan="4"
                            style="text-align:center; padding:35px; color:#8b96a5;">
                            Belum ada data seksi.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection
