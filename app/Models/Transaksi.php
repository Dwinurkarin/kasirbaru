<?php

namespace App\Models;

use App\Models\TransaksiDetail;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['tanggal', 'total', 'pembayaran'];

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
