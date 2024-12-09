<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Laporan;

class TransaksiController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        $barangs = Barang::all(); // Ambil semua data barang
        return view('pages.transaksi.index', compact('barangs', 'kategoris'));
    }

    public function cariBarang(Request $request)
    {
        // Cari barang berdasarkan kode
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        if ($barang) {
            // Ambil informasi kategori dari barang
            $kategori = Kategori::find($barang->kategori_id);

            // Return data barang beserta kategorinya
            return response()->json([
                'barang' => $barang,
                'kategori' => $kategori
            ]);
        } else {
            // Jika barang tidak ditemukan, return null
            return response()->json(null);
        }
    }

    public function simpanTransaksi(Request $request)
    {
        // Validasi input transaksi
        $request->validate([
            'total' => 'required|integer',
            'pembayaran' => 'required|integer|min:' . $request->total,
        ]);
    
        // Decode items dari JSON menjadi array
        $items = json_decode($request->items, true);
        if (!is_array($items) || empty($items)) {
            return redirect()->back()->withErrors(['error' => 'Data barang tidak valid.']);
        }
    
        // Buat transaksi
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'total' => $request->total,
            'pembayaran' => $request->pembayaran,
        ]);
    
        // Simpan detail transaksi
        foreach ($items as $item) {
            $barang = Barang::find($item['barang_id']);
            $subtotal = $barang->harga * $item['jumlah'];
    
            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang->id,
                'jumlah' => $item['jumlah'],
                'subtotal' => $subtotal,
            ]);
        }
    
        // Hitung kembalian
        $kembalian = $request->pembayaran - $request->total;
        
        if ($kembalian < 0) {
            return redirect()->back()->withErrors(['error' => 'Uang pembayaran kurang dari total.']);
        }
    
        // Simpan data ke tabel laporan
        Laporan::create([
            'tanggal' => now(),
            'transaksi_id' => $transaksi->id,
            'total' => $request->total,
        ]);
    
        // Redirect kembali ke halaman transaksi dengan pesan sukses dan kembalian
        return redirect()->route('transaksi.index')->with([
            'success' => 'Transaksi berhasil disimpan dan laporan telah ditambahkan.',
            'kembalian' => $kembalian
        ]);
    }
}
