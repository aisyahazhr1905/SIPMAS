<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data RT/RW - SIPMAS</title>

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
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
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

        .alert {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Data RT/RW</h2>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.rt_rw.create') }}" class="btn btn-tambah">
        + Tambah Data RT/RW
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>RT</th>
                <th>RW</th>
                <th>Nama Ketua</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($rtRw as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->no_rt }}</td>
                    <td>{{ $data->no_rw }}</td>
                    <td>{{ $data->nama_ketua }}</td>
                    <td>
                        <a href="{{ route('admin.rt_rw.edit', $data->id_rt_rw) }}"
                           class="btn btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('admin.rt_rw.destroy', $data->id_rt_rw) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                    <td colspan="5" style="text-align:center;">
                        Belum ada data RT/RW.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>