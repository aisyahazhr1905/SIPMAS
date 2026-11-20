<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - SIPMAS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fa;
            color: #263b50;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 138px;
            height: 100vh;
            background: #10324d;
            color: white;
            padding: 18px 10px;
        }

        .logo {
            font-size: 14px;
            font-weight: 700;
            padding: 0 7px;
        }

        .subtitle {
            font-size: 6px;
            color: #b7c7d5;
            margin-top: 3px;
            padding: 0 7px;
        }

        .menu {
            margin-top: 35px;
        }

        .menu a {
            display: block;
            padding: 10px 9px;
            margin-bottom: 5px;
            border-radius: 6px;
            text-decoration: none;
            color: #c8d7e3;
            font-size: 9px;
        }

        .menu a:hover,
        .menu a.active {
            background: #27699c;
            color: white;
        }

        .badge {
            float: right;
            background: #e94d52;
            color: white;
            min-width: 14px;
            text-align: center;
            padding: 2px 4px;
            border-radius: 8px;
            font-size: 7px;
        }

        .logout {
            position: absolute;
            bottom: 12px;
            left: 10px;
            color: #9eb1c0;
            font-size: 8px;
        }

        .main {
            margin-left: 138px;
            min-height: 100vh;
        }

        .topbar {
            height: 64px;
            background: white;
            border-bottom: 1px solid #e2e9ef;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .breadcrumb {
            color: #8b9aaa;
            font-size: 9px;
            margin-bottom: 5px;
        }

        .page-title {
            font-size: 18px;
            color: #253b51;
        }

        .search {
            width: 180px;
            height: 30px;
            border: 1px solid #d9e2eb;
            border-radius: 6px;
            padding: 0 10px;
            font-size: 9px;
            outline: none;
        }

        .content {
            padding: 20px;
        }

        .card {
            background: white;
            border: 1px solid #dce5ec;
            border-radius: 9px;
            overflow: hidden;
        }

        .toolbar {
            height: 48px;
            border-bottom: 1px solid #e2e9ef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 14px;
        }

        .tabs {
            display: flex;
            gap: 28px;
            height: 100%;
            align-items: end;
        }

        .tab {
            height: 100%;
            display: flex;
            align-items: center;
            position: relative;
            font-size: 10px;
            color: #8a9aaa;
            text-decoration: none;
        }

        .tab.active {
            color: #23669b;
            font-weight: 700;
        }

        .tab.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: #23669b;
        }

        .mark-all {
            border: 1px solid #d7e1ea;
            background: white;
            color: #356b96;
            border-radius: 5px;
            padding: 7px 12px;
            font-size: 9px;
            cursor: pointer;
        }

        .notification {
            display: flex;
            align-items: center;
            min-height: 62px;
            padding: 10px;
            border-bottom: 1px solid #e7edf2;
            text-decoration: none;
            color: inherit;
            margin: 0 12px;
        }

        .notification.unread {
            background: #f4f8fc;
        }

        .icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            flex: 0 0 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 12px;
        }

        .icon-warning {
            background: #fff0cf;
            color: #d59a1d;
        }

        .icon-success {
            background: #d9f5ea;
            color: #15905b;
        }

        .icon-info {
            background: #e0ecfb;
            color: #3d74a6;
        }

        .icon-danger {
            background: #ffe0e0;
            color: #dd4949;
        }

        .title {
            font-size: 11px;
            color: #344a5f;
            margin-bottom: 4px;
        }

        .message {
            font-size: 9px;
            color: #8a9aaa;
            line-height: 1.4;
        }

        .time {
            margin-left: auto;
            padding-left: 10px;
            font-size: 8px;
            color: #8b9aaa;
            white-space: nowrap;
        }

        .empty {
            padding: 35px;
            text-align: center;
            color: #8b9aaa;
            font-size: 10px;
        }

        .alert {
            margin-bottom: 12px;
            padding: 9px 12px;
            background: #e0f5e9;
            color: #19744c;
            border-radius: 6px;
            font-size: 9px;
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="logo">SIPMAS</div>
    <div class="subtitle">Kelurahan Sungai Bangek</div>

    <nav class="menu">
        <a href="{{ route('warga.dashboard') }}">⌂ &nbsp; Beranda</a>
        <a href="{{ route('warga.pengaduan.create') }}">✎ &nbsp; Ajukan Pengaduan</a>
        <a href="{{ route('warga.pengaduan.index') }}">▣ &nbsp; Pengaduan Saya</a>
        <a href="{{ route('warga.notifikasi.index') }}" class="active">
            ♧ &nbsp; Notifikasi
            @if($belumDibaca > 0)
                <span class="badge">{{ $belumDibaca }}</span>
            @endif
        </a>
    </nav>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                style="background:none;border:0;color:#9eb1c0;font-size:8px;cursor:pointer;">
                ↪ Keluar
            </button>
        </form>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <div class="breadcrumb">Notifikasi</div>
            <h1 class="page-title">Notifikasi</h1>
        </div>

        <input class="search" type="text" placeholder="⌕  Cari nomor tiket / judul...">
    </header>

    <section class="content">

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="card">

            <div class="toolbar">
                <div class="tabs">
                    <a class="tab active" href="{{ route('warga.notifikasi.index') }}">
                        Semua
                    </a>

                    <span class="tab">
                        Belum dibaca ({{ $belumDibaca }})
                    </span>
                </div>

                <form action="{{ route('warga.notifikasi.bacaSemua') }}" method="POST">
                    @csrf
                    <button class="mark-all" type="submit">
                        ✓ Tandai semua dibaca
                    </button>
                </form>
            </div>

            @forelse($notifikasi as $item)

                @php
                    $jenis = strtolower($item->jenis ?? '');

                    if (str_contains($jenis, 'selesai')) {
                        $iconClass = 'icon-success';
                        $icon = '✓';
                    } elseif (str_contains($jenis, 'tolak')) {
                        $iconClass = 'icon-danger';
                        $icon = '×';
                    } elseif (str_contains($jenis, 'proses')) {
                        $iconClass = 'icon-warning';
                        $icon = '⟳';
                    } else {
                        $iconClass = 'icon-info';
                        $icon = '○';
                    }
                @endphp

                <a
                    class="notification {{ $item->status_baca === 'belum_dibaca' ? 'unread' : '' }}"
                    href="{{ route('warga.notifikasi.baca', $item->id_notifikasi) }}"
                >

                    <div class="icon {{ $iconClass }}">
                        {{ $icon }}
                    </div>

                    <div>
                        <div class="title">
                            {{ $item->judul ?? ucwords(str_replace('_', ' ', $item->jenis ?? 'Notifikasi')) }}
                        </div>

                        <div class="message">
                            @if($item->id_pengaduan && $item->pengaduan)
                                {{ $item->pengaduan->no_tiket }} ·
                            @endif
                            {{ $item->pesan }}
                        </div>
                    </div>

                    <div class="time">
                        @if($item->tgl_kirim)
                            {{ \Carbon\Carbon::parse($item->tgl_kirim)->diffForHumans() }}
                        @endif
                    </div>

                </a>

            @empty

                <div class="empty">
                    Belum ada notifikasi.
                </div>

            @endforelse

        </div>

    </section>
</main>

</body>
</html>
