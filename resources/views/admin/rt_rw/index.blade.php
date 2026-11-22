
@extends('layouts.admin')

@section('title', 'Data RT/RW - SIPMAS')
@section('breadcrumb', 'Data RT/RW')

@section('content')

<div class="page-heading">
    <h1>Data RT/RW</h1>
    <p>Kelola data RT dan RW yang digunakan dalam sistem SIPMAS.</p>
</div>

<div class="admin-card">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h2 style="margin:0; color:#183b56; font-size:18px;">
                Data RT/RW
            </h2>
            <p style="margin:5px 0 0; color:#6b7c93; font-size:13px;">
                Daftar RT dan RW beserta nama ketua.
            </p>
        </div>

        <a href="{{ route('admin.rt_rw.create') }}"
           class="admin-btn admin-btn-success">
            + Tambah Data RT/RW
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">

            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Nama Ketua</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($rtRw as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->no_rt }}</td>

                        <td>{{ $item->no_rw }}</td>

                        <td>
                            <strong style="color:#183b56;">
                                {{ $item->nama_ketua }}
                            </strong>
                        </td>

                        <td>
                            <div class="action-group">

                                <a href="{{ route('admin.rt_rw.edit', $item->id_rt_rw) }}"
                                   class="admin-btn admin-btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.rt_rw.destroy', $item->id_rt_rw) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data RT/RW ini?')"
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
                        <td colspan="5"
                            style="text-align:center; padding:35px; color:#8b96a5;">
                            Belum ada data RT/RW.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection
