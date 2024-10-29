<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_barang',
        'total_bayar',
    ];

    // Relasi dengan model Barang (jika ingin menambahkan relasi)
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
