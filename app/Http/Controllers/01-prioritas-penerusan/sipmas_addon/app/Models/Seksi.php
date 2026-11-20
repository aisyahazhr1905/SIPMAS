<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'seksi';
    protected $primaryKey = 'id_seksi';
    protected $guarded = ['id_seksi'];
}
