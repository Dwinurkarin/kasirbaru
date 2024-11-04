<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Laporan;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $barangs = Barang::all(); // Ambil semua data barang
        return view('pages.transaksi.index', compact('barangs'));
    }

    public function cariBarang(Request $request)
    {
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        return response()->json($barang);
    }

    public function simpanTransaksi(Request $request)
    {
        // Validasi input transaksi
        $request->validate([
            'items' => 'required|array',
            'total' => 'required|numeric',
            'pembayaran' => 'required|numeric',
        ]);
    
        // Inisialisasi variabel untuk menyimpan data transaksi
        $total = $request->total;
        $pembayaran = $request->pembayaran;
        $kembalian = $pembayaran - $total;
    
        // Mulai proses penyimpanan transaksi
        $transaksi = Transaksi::create([
            'total' => $total,
            'pembayaran' => $pembayaran,
            'kembalian' => $kembalian,
        ]);
    
        // Iterasi setiap item dan kurangi stoknya
        foreach ($request->items as $item) {
            $barang = Barang::find($item['barang_id']);
    
            if ($barang) {
                // Periksa apakah stok cukup untuk transaksi
                if ($barang->stok >= $item['jumlah']) {
                    // Kurangi stok
                    $barang->stok -= $item['jumlah'];
                    $barang->save();
    
                    // Simpan detail transaksi
                    $transaksi->details()->create([
                        'barang_id' => $item['barang_id'],
                        'jumlah' => $item['jumlah'],
                        'subtotal' => $item['subtotal'],
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
                }
            }
        }
    
        // Masukkan ke laporan setelah transaksi berhasil
        Laporan::create([
            'tanggal' => now(),
            'kode_invoice' => $transaksi->kode_invoice,
            'total' => $transaksi->total,
        ]);
    
        return redirect()->route('transaksi.index')->with([
            'success' => 'Transaksi berhasil!',
            'kembalian' => $kembalian,
        ]);
    }
    
}
