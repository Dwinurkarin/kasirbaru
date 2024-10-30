<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksi_detail';

    protected $fillable = ['transaksi_id', 'barang_id', 'jumlah', 'subtotal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
