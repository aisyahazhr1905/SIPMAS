<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Seksi - SIPMAS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-tambah {
            background: #198754;
            margin-bottom: 20px;
        }

        .btn-edit {
            background: #0d6efd;
        }

        .btn-hapus {
            background: #dc3545;
        }

        .btn-kembali {
            background: #6c757d;
            margin-top: 20px;
        }

        .alert {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f1f1;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Data Seksi Penanggung Jawab</h2>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.seksi.create') }}" class="btn btn-tambah">
        + Tambah Seksi
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Seksi</th>
                <th>Penanggung Jawab</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($seksi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_seksi }}</td>
                    <td>{{ $data->penanggung_jawab }}</td>
                    <td>
                        <a href="{{ route('admin.seksi.edit', $data->id_seksi) }}"
                           class="btn btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('admin.seksi.destroy', $data->id_seksi) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data seksi ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-hapus">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">
                        Belum ada data seksi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-kembali">
        Kembali ke Dashboard
    </a>

</div>

</body>
</html>