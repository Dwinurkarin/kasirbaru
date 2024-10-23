<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $semuaTransaksi = Transaksi::where('status', 'selesai')->get();
        return view('pages.laporan.index', compact('semuaTransaksi'));
    }
}
    