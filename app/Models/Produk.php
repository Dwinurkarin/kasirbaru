<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = [
        'kode',
        'nama',
        'harga',
        'stok',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
