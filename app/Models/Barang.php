<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga',
    ];
}
