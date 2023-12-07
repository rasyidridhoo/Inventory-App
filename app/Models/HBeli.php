<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HBeli extends Model
{
    use HasFactory;
    protected $table = 'hbelis';
    protected $guarded = ['id'];

    public function dbeli(){
        return $this->hasMany(DBeli::class, 'NOTRANSAKSI', 'NOTRANSAKSI');
    }
}
