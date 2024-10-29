<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.index');
    }

    public function getBarang(Request $request)
    {
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        if ($barang) {
            return response()->json($barang);
        } else {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|exists:barang,kode_barang',
            'total_bayar' => 'required|numeric|min:0',
        ]);

        Transaksi::create([
            'kode_barang' => $request->kode_barang,
            'total_bayar' => $request->total_bayar,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil!');
    }
}
