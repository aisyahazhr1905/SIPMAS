<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $guarded = ['id_pengaduan'];
    protected $casts = ['tgl_pengaduan' => 'datetime', 'batas_waktu' => 'datetime', 'tgl_selesai' => 'datetime'];

    public function pelapor() { return $this->belongsTo(Pengguna::class, 'id_pelapor', 'id_pengguna'); }
    public function kategori() { return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori'); }
    public function lampiran() { return $this->hasMany(Lampiran::class, 'id_pengaduan', 'id_pengaduan'); }
    public function penerusans() { return $this->hasMany(Penerusan::class, 'id_pengaduan', 'id_pengaduan')->latest('tgl_penerusan'); }
    public function riwayat() { return $this->hasMany(RiwayatStatus::class, 'id_pengaduan', 'id_pengaduan')->latest('tgl_perubahan'); }
}
