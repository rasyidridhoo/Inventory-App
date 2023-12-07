<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['KODEBRG', 'QTYBELI'];
    protected $table = 'stocks';
    // protected $primaryKey = 'KODEBRG'; 

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'KODEBRG', 'KODEBRG');
    }
}
