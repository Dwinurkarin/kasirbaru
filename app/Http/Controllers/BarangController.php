<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori untuk dropdown
        $kategoris = Kategori::all();

        // Ambil kategori yang dipilih dari query string
        $selectedCategory = $request->query('kategori_id');

        // Filter barang berdasarkan kategori yang dipilih
        $barangs = Barang::when($selectedCategory, function ($query, $selectedCategory) {
            return $query->where('kategori_id', $selectedCategory); // Filter berdasarkan kategori_id
        })->get();

        // Kembalikan view dengan data barang dan kategori
        return view('pages.barang.index', compact('barangs', 'kategoris', 'selectedCategory'));
    }


    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('pages.barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'kategori_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp,svg,gif,', // Validasi untuk file gambar
        ]);
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); // Nama file unik
            $foto->move(public_path('foto-barang'), $fotoName); // Pindahkan ke public/foto-barang
            $fotoPath = 'foto-barang/' . $fotoName; // Simpan path relatif
        }

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'foto' => $fotoPath, // Simpan path gambar ke kolom database
        ]);

        return redirect()->route('barang.index');
    }
    public function getBarangByCategory(Request $request)
    {
        $category = $request->query('category');
        $barangs = Barang::where('kategori_id', $category)->get(); // Asumsikan kolom kategori bernama `kategori`

        return response()->json($barangs);
    }
    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Ambil data barang berdasarkan ID
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('pages.barang.edit', compact('barang', 'kategoris')); // Mengembalikan view edit dengan data barang
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,' . $id, // Unik kecuali barang yang sedang diedit
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg', // Validasi untuk file gambar
        ]);

        // Ambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Simpan foto baru jika ada, dan hapus foto lama
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari folder public/foto-barang
            if ($barang->foto && file_exists(public_path($barang->foto))) {
                unlink(public_path($barang->foto));
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); // Nama file unik
            $foto->move(public_path('foto-barang'), $fotoName); // Pindahkan ke public/foto-barang
            $fotoPath = 'foto-barang/' . $fotoName; // Simpan path relatif
        } else {
            $fotoPath = $barang->foto; // Pertahankan foto lama jika tidak ada foto baru
        }

        // Update data barang
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'foto' => $fotoPath,
        ]);

        // Redirect ke halaman index barang
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Ambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Hapus foto dari folder public/foto-barang jika ada
        if ($barang->foto && file_exists(public_path($barang->foto))) {
            unlink(public_path($barang->foto));
        }

        // Hapus data barang dari database
        $barang->delete();

        // Redirect ke halaman index barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
