<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // Ambil semua data barang dari database
        $barangs = Barang::all();

        // Kirim data ke view
        return view('pages.barang.index', compact('barangs'));
    }
    public function create()
    {
        return view('pages.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang|max:10',
            'nama_barang' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barang.create')->with('success', 'Barang berhasil ditambahkan!');
    }
    public function show($id)
{
    $barang = Barang::findOrFail($id);

    return view('barang.detail', compact('barang'));
}

public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }

}
