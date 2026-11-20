<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Pengguna - SIPMAS</title>
</head>

<body>

    <h1>Kelola Pengguna</h1>

    <p>Halaman Kelola Pengguna berhasil dibuka.</p>

    <a href="{{ route('admin.dashboard') }}">
        Kembali ke Dashboard
    </a>

    <hr>

    <a href="{{ route('admin.pengguna.create') }}">
        + Tambah Pengguna
    </a>

    <br><br>

    @foreach($pengguna as $item)
    <p>
        {{ $item->nama_lengkap }}
        - {{ $item->email }}
        - {{ $item->role }}
    </p>
    @endforeach

</body>

</html>