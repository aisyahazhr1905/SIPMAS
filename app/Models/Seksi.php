<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'seksi';

    protected $primaryKey = 'id_seksi';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nama_seksi',
        'penanggung_jawab',
    ];
}