<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = ['nama_kategori']; // Kolom yang dapat diisi

    // Relasi dengan Barang
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
