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
        return view('pages.transaksi.index');
    }

    public function cariBarang(Request $request)
    {
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        return response()->json($barang);
    }

    public function simpanTransaksi(Request $request)
    {
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
    
            // Kurangi stok barang
            $barang->decrement('stok', $item['jumlah']);
        }
    
        // Hitung kembalian
        $kembalian = $request->pembayaran - $request->total;
    
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
