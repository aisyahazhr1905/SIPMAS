<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerusan extends Model
{
    protected $table = 'penerusan';
    protected $primaryKey = 'id_penerusan';
    protected $guarded = ['id_penerusan'];
    protected $casts = ['tgl_penerusan' => 'datetime'];
    public function petugas() { return $this->belongsTo(Pengguna::class, 'id_petugas', 'id_pengguna'); }
    public function rtRw() { return $this->belongsTo(RtRw::class, 'id_rt_rw', 'id_rt_rw'); }
    public function seksi() { return $this->belongsTo(Seksi::class, 'id_seksi', 'id_seksi'); }
}
