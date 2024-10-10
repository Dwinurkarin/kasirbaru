<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksiAktif = Transaksi::where('status', 'aktif')->first();
        $semuaProduk = $transaksiAktif ? collect($transaksiAktif->produk) : collect([]);
        $totalSemuaBelanja = $semuaProduk->sum(fn($produk) => $produk['harga'] * $produk['jumlah']);
        $kembalian = request()->bayar ? request()->bayar - $totalSemuaBelanja : null;

        return view('pages.transaksi.index', compact('transaksiAktif', 'semuaProduk', 'totalSemuaBelanja', 'kembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
