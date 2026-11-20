<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - SIPMAS</title>
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        :root{--navy:#0d2f4a;--blue:#397dbd;--blue-dark:#2f70ad;--bg:#f4f7fb;--text:#20384d;--muted:#8295a7;--line:#e3eaf0;--green:#15966a}
        body{font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
        .sidebar{position:fixed;inset:0 auto 0 0;width:123px;background:var(--navy);color:#fff;display:flex;flex-direction:column;padding:14px 9px 12px;z-index:10}
        .brand{display:flex;align-items:center;gap:7px;padding:2px 5px 14px;border-bottom:1px solid rgba(255,255,255,.08)}
        .brand-logo{width:25px;height:25px;border-radius:7px;background:#fff;display:grid;place-items:center;color:var(--navy);font-size:13px;font-weight:800}.brand-name{font-size:10px;font-weight:800;line-height:1}.brand-sub{font-size:5px;color:#aac0d1;margin-top:3px;white-space:nowrap}
        .menu{padding-top:13px}.menu a{display:flex;align-items:center;gap:7px;color:#b9cad7;text-decoration:none;padding:9px 7px;border-radius:6px;font-size:7.5px;margin-bottom:3px}.menu a:hover,.menu a.active{background:var(--blue-dark);color:#fff}.icon{width:12px;text-align:center;font-size:10px}.badge{margin-left:auto;min-width:12px;height:12px;padding:0 3px;border-radius:8px;background:#ee6a73;color:#fff;font-size:6px;display:inline-flex;align-items:center;justify-content:center}
        .profile-bottom{margin-top:auto;padding:9px 5px 0;border-top:1px solid rgba(255,255,255,.08)}.profile-row{display:flex;gap:6px;align-items:center}.avatar{width:22px;height:22px;border-radius:50%;background:#3f78a6;display:grid;place-items:center;font-size:6.5px;font-weight:700}.profile-name{font-size:7px;font-weight:700;color:#fff}.profile-role{font-size:5.5px;color:#8fa8bb;margin-top:2px}.logout{display:block;margin-top:8px;color:#8fa8bb;text-decoration:none;font-size:6.5px}
        .main{margin-left:123px;min-height:100vh}.topbar{height:58px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 17px}.crumb{font-size:7px;color:#91a0ad;margin-bottom:3px}.page-title{font-size:17px;line-height:1;font-weight:750;color:#1c344a}.top-search{width:155px;height:27px;border:1px solid #dce5ed;border-radius:5px;display:flex;align-items:center;gap:6px;padding:0 9px;color:#a2b0bc;background:#fbfcfe}.top-search span{font-size:8px}.top-search input{border:0;outline:0;width:100%;background:transparent;font-size:7px;color:#526b80}
        .content{padding:17px 18px 28px}.layout{display:grid;grid-template-columns:minmax(0,2.05fr) minmax(205px,.9fr);gap:13px;align-items:start}.card{background:#fff;border:1px solid #dfe7ee;border-radius:8px}.detail-card{padding:13px 14px}.ticket-row{display:flex;align-items:center;justify-content:space-between;gap:10px}.ticket{font-size:8px;font-weight:800;color:#3675a9}.status{display:inline-flex;padding:4px 8px;border-radius:12px;font-size:6px;font-weight:800}.status.diajukan,.status.diverifikasi{background:#e7f2fb;color:#3b7db9}.status.diproses,.status.diteruskan{background:#fff0d4;color:#cf8818}.status.selesai{background:#dff5eb;color:#27906c}.status.ditolak{background:#ffe5e5;color:#d8585e}.title{font-size:17px;line-height:1.2;margin-top:7px;color:#243b51}.meta-grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px;margin-top:13px}.label{font-size:6px;color:#91a1ae;margin-bottom:4px}.value{font-size:7.5px;color:#334a5e;font-weight:650}.desc{margin-top:12px}.desc-text{font-size:7.5px;color:#52697b;line-height:1.55}.photos{display:flex;gap:6px;margin-top:10px}.photo{width:56px;height:43px;border-radius:6px;object-fit:cover;background:linear-gradient(135deg,#a9c8df,#5b89ae);display:block}.photo:nth-child(even){background:linear-gradient(135deg,#bdd7a5,#719d55)}.no-photo{font-size:7px;color:#9aa8b4;padding:8px 0}
        .history-card{padding:13px 12px}.card-title{font-size:10px;font-weight:700;color:#344a5e;margin-bottom:11px}.timeline{position:relative;padding-left:17px}.timeline:before{content:"";position:absolute;left:4px;top:5px;bottom:5px;width:1px;background:#d6e1e9}.event{position:relative;padding-bottom:12px}.event:last-child{padding-bottom:0}.dot{position:absolute;left:-17px;top:1px;width:8px;height:8px;border-radius:50%;background:#3779a9;border:1.5px solid #fff;box-shadow:0 0 0 1px #3779a9}.event.current .dot{background:#20a36f;box-shadow:0 0 0 1px #20a36f}.event-title{font-size:7px;font-weight:750;color:#33495c}.event-date{font-size:6px;color:#8b9ba9;margin-top:3px}.empty-history{font-size:7px;color:#9aa8b4;line-height:1.5}
        .response{margin-top:12px;background:#eefaf5;border:1px solid #ccebdc;border-radius:7px;padding:12px 13px}.response-title{font-size:8px;font-weight:700;color:#40596a;margin-bottom:7px}.response-text{font-size:7.5px;color:#526a79;line-height:1.55}.response-meta{font-size:6px;color:#8a9eaa;margin-top:8px}.rating{margin-top:12px;background:#fff;border:1px solid #dfe7ee;border-radius:8px;padding:11px 12px;text-align:center}.rating-title{font-size:7.5px;color:#4d6274}.rating-sub{font-size:6px;color:#a0adb7;margin-top:4px}.rate-btn{display:inline-block;margin-top:8px;background:#15966a;color:#fff;text-decoration:none;border-radius:5px;padding:7px 14px;font-size:6.5px;font-weight:750}.rated{margin-top:7px;color:#15966a;font-size:7px;font-weight:700}
        .alert{margin-bottom:12px;padding:9px 11px;border-radius:6px;font-size:7px;background:#dff5eb;color:#1b7b56}
        @media(max-width:760px){.sidebar{width:108px}.main{margin-left:108px}.layout{grid-template-columns:1fr}.meta-grid{grid-template-columns:1fr 1fr}.top-search{width:130px}}
        @media(max-width:520px){.sidebar{position:static;width:100%;height:auto}.main{margin-left:0}.profile-bottom{margin-top:10px}.topbar{height:auto;padding:11px;gap:8px}.content{padding:10px}.meta-grid{grid-template-columns:1fr}.top-search{width:125px}}
    </style>
</head>
<body>
@php
    $initials = collect(preg_split('/\s+/', trim($warga->nama_lengkap ?? 'Warga')))->filter()->take(2)->map(fn($word)=>strtoupper(substr($word,0,1)))->implode('');
    $statusLabels = ['diajukan'=>'Diterima','diverifikasi'=>'Diverifikasi','diproses'=>'Diproses','diteruskan'=>'Diproses','selesai'=>'Selesai','ditolak'=>'Ditolak'];
@endphp
<aside class="sidebar">
    <div class="brand"><div class="brand-logo">◉</div><div><div class="brand-name">SIPMAS</div><div class="brand-sub">Kelurahan Sungai Bangek</div></div></div>
    <nav class="menu">
        <a href="{{ route('dashboard') }}"><span class="icon">⌂</span>Beranda</a>
        <a href="{{ route('warga.pengaduan.create') }}"><span class="icon">✎</span>Ajukan Pengaduan</a>
        <a href="{{ route('warga.pengaduan.index') }}" class="active"><span class="icon">◫</span>Pengaduan Saya</a>
        <a href="#"><span class="icon">♧</span>Notifikasi @if($notifikasiBelumDibaca > 0)<span class="badge">{{ $notifikasiBelumDibaca }}</span>@endif</a>
    </nav>
    <div class="profile-bottom">
        <div class="profile-row"><div class="avatar">{{ $initials ?: 'WR' }}</div><div><div class="profile-name">{{ $warga->nama_lengkap }}</div><div class="profile-role">Warga</div></div></div>
        <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="logout" style="background:none;border:0;padding:0;cursor:pointer;">↪ Keluar</button></form>
    </div>
</aside>
<main class="main">
    <header class="topbar">
        <div><div class="crumb">Warga / Pengaduan Saya / {{ $pengaduan->no_tiket }}</div><div class="page-title">Detail Pengaduan</div></div>
        <label class="top-search"><span>⌕</span><input type="search" placeholder="Cari nomor tiket / judul..." aria-label="Cari nomor tiket atau judul"></label>
    </header>
    <section class="content">
        @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
        <div class="layout">
            <div>
                <div class="card detail-card">
                    <div class="ticket-row"><div class="ticket">{{ $pengaduan->no_tiket }}</div><span class="status {{ $pengaduan->status }}">{{ $statusLabels[$pengaduan->status] ?? ucfirst($pengaduan->status) }}</span></div>
                    <h1 class="title">{{ $pengaduan->judul }}</h1>
                    <div class="meta-grid">
                        <div><div class="label">Kategori</div><div class="value">{{ $pengaduan->kategori?->nama_kategori ?? '-' }}</div></div>
                        <div><div class="label">Tanggal pengajuan</div><div class="value">{{ $pengaduan->tgl_pengaduan?->format('d M Y') ?? '-' }}</div></div>
                        <div><div class="label">Lokasi</div><div class="value">{{ $pengaduan->lokasi_kejadian }}</div></div>
                    </div>
                    <div class="desc"><div class="label">Uraian</div><div class="desc-text">{{ $pengaduan->uraian }}</div></div>
                    <div class="photos">
                        @forelse($pengaduan->lampiran as $lampiran)
                            <img class="photo" src="{{ asset('storage/' . $lampiran->path_file) }}" alt="Lampiran pengaduan">
                        @empty
                            <div class="no-photo">Tidak ada lampiran foto.</div>
                        @endforelse
                    </div>
                </div>

                @if($pengaduan->tanggapan->isNotEmpty())
                    <div class="response">
                        <div class="response-title">Tanggapan petugas</div>
                        @foreach($pengaduan->tanggapan as $tanggapan)
                            <div class="response-text">{{ $tanggapan->isi_tanggapan }}</div>
                            <div class="response-meta">{{ $tanggapan->petugas?->nama_lengkap ?? 'Petugas' }} · {{ $tanggapan->tgl_tanggapan?->format('d M Y H:i') }}</div>
                            @if(!$loop->last)<div style="height:10px;border-bottom:1px solid #d8eee2;margin-bottom:10px"></div>@endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <div class="card history-card">
                    <div class="card-title">Riwayat tindak lanjut</div>
                    @if($pengaduan->riwayatStatus->isNotEmpty())
                        <div class="timeline">
                            @foreach($pengaduan->riwayatStatus as $riwayat)
                                <div class="event {{ $loop->first ? 'current' : '' }}">
                                    <span class="dot"></span>
                                    <div class="event-title">
                                        {{ $statusLabels[$riwayat->status] ?? ucfirst($riwayat->status) }}
                                        @if($riwayat->status === 'diteruskan')
                                            ke Seksi Pemerintahan
                                        @endif
                                    </div>
                                    <div class="event-date">{{ $riwayat->tgl_perubahan?->format('d M Y, H:i') }}{{ $riwayat->petugas?->nama_lengkap ? ' · '.$riwayat->petugas->nama_lengkap : '' }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-history">Belum ada riwayat tindak lanjut yang tercatat.</div>
                    @endif
                </div>

                @if($pengaduan->status === 'selesai')
                    <div class="rating">
                        <div class="rating-title">Bagaimana hasil penanganannya?</div>
                        <div class="rating-sub">Penilaian Anda membantu meningkatkan layanan.</div>
                        @if($pengaduan->penilaian)
                            <div class="rated">✓ Sudah dinilai · {{ $pengaduan->penilaian->rating }}/5</div>
                        @else
                            <a href="#" class="rate-btn">★ Beri Penilaian</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
</body>
</html>
