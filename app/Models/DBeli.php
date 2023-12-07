<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBeli extends Model
{
    use HasFactory;

    protected $table = 'dbelis';
    protected $guarded = ['id'];

    public function hbeli(){
        return $this->belongsTo(HBeli::class, 'NOTRANSAKSI', 'NOTRANSAKSI');
    }
}
