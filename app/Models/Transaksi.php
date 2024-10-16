<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'total',
        'status',
    ];

    public function Laporan()
    {
        return $this->hasMany(Laporan::class);
    }


}
