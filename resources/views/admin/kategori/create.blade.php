<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori - SIPMAS</title>
</head>
<body>

    <h1>Tambah Kategori</h1>

    <a href="{{ route('admin.kategori.index') }}">
        ← Kembali
    </a>

    <hr>

    <form action="{{ route('admin.kategori.store') }}" method="POST">

        @csrf

        <div>
            <label>Nama Kategori</label><br>
            <input type="text" name="nama_kategori" required>
        </div>

        <br>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="deskripsi"></textarea>
        </div>

        <br>

        <div>
            <label>Status</label><br>
            <select name="status" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <br>

        <button type="submit">
            Simpan Kategori
        </button>

    </form>

</body>
</html>