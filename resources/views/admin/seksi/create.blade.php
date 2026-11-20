<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Seksi - SIPMAS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-simpan {
            background: #198754;
            color: white;
        }

        .btn-kembali {
            background: #6c757d;
            color: white;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Data Seksi</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.seksi.store') }}" method="POST">
        @csrf

        <label for="nama_seksi">Nama Seksi</label>

        <input
            type="text"
            id="nama_seksi"
            name="nama_seksi"
            value="{{ old('nama_seksi') }}"
            placeholder="Contoh: Seksi Pelayanan"
            required
        >

        <label for="penanggung_jawab">Penanggung Jawab</label>

        <input
            type="text"
            id="penanggung_jawab"
            name="penanggung_jawab"
            value="{{ old('penanggung_jawab') }}"
            placeholder="Nama penanggung jawab"
            required
        >

        <button type="submit" class="btn btn-simpan">
            Simpan
        </button>

        <a href="{{ route('admin.seksi.index') }}" class="btn btn-kembali">
            Kembali
        </a>

    </form>

</div>

</body>
</html>