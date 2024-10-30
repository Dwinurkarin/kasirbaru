<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi (opsional jika sudah sesuai)
    protected $table = 'laporan';

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'tanggal',
        'transaksi_id',
        'total',
    ];

    // Relasi dengan model Transaksi (opsional jika ingin akses data transaksi dari laporan)
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
