<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatStatus extends Model
{
    protected $table = 'riwayat_status';
    protected $primaryKey = 'id_riwayat';
    protected $guarded = ['id_riwayat'];
    protected $casts = ['tgl_perubahan' => 'datetime'];
    public function petugas() { return $this->belongsTo(Pengguna::class, 'id_petugas', 'id_pengguna'); }
}
