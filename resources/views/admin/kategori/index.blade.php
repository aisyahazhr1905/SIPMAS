<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori Pengaduan - SIPMAS</title>
</head>
<body>

    <h1>Kategori Pengaduan</h1>

    <a href="{{ route('admin.dashboard') }}">
        ← Kembali ke Dashboard
    </a>

    <br><br>

    <a href="{{ route('admin.kategori.create') }}">
        + Tambah Kategori
    </a>

    <hr>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @forelse($kategori as $item)

        <p>
            <strong>{{ $item->nama_kategori }}</strong>
            -
            {{ $item->deskripsi }}
            -
            {{ $item->status }}
        </p>

    @empty

        <p>Belum ada kategori.</p>

    @endforelse

</body>
</html>