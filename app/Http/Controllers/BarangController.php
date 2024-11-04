<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('pages.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('pages.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Mengambil barang berdasarkan ID
        return view('pages.barang.edit', compact('barang')); // Mengembalikan view edit dengan data barang
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,' . $id, // Unik, kecuali untuk barang yang sedang diedit
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($id); // Mengambil barang berdasarkan ID
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index'); // Redirect ke index barang dengan pesan sukses
    }
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id); // Mengambil barang berdasarkan ID

        $barang->delete(); // Menghapus barang

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.'); // Redirect ke halaman index barang dengan pesan sukses
    }
}
