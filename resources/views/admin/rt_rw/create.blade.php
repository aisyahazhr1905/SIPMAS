<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah RT/RW - SIPMAS</title>

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

        h2 {
            margin-top: 0;
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
            margin-top: 20px;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
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
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Data RT/RW</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.rt_rw.store') }}" method="POST">
        @csrf

        <label for="no_rt">Nomor RT</label>
        <input
            type="text"
            id="no_rt"
            name="no_rt"
            placeholder="Contoh: 001"
            value="{{ old('no_rt') }}"
            required
        >

        <label for="no_rw">Nomor RW</label>
        <input
            type="text"
            id="no_rw"
            name="no_rw"
            placeholder="Contoh: 005"
            value="{{ old('no_rw') }}"
            required
        >

        <label for="nama_ketua">Nama Ketua RT/RW</label>
        <input
            type="text"
            id="nama_ketua"
            name="nama_ketua"
            placeholder="Masukkan nama ketua"
            value="{{ old('nama_ketua') }}"
            required
        >

        <button type="submit" class="btn btn-simpan">
            Simpan
        </button>

        <a href="{{ route('admin.rt_rw.index') }}" class="btn btn-kembali">
            Kembali
        </a>
    </form>

</div>

</body>
</html>