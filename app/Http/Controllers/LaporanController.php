<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua data laporan
        $laporans = Laporan::with('transaksi')->get();

        // Tampilkan view laporan
        return view('pages.laporan.index', compact('laporans'));
    }
}
