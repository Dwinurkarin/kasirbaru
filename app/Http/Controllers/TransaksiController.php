<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksis = Transaksi::all(); // Mengambil semua data transaksi
        return view('pages.transaksi.index', compact('transaksis'));
    }

    // Menampilkan form create transaksi baru
    public function create()
    {
        return view('pages.transaksi.create');
    }

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'total' => 'required|integer|min:1',
        ]);

        Transaksi::create([
            'kode' => $request->kode,
            'total' => $request->total,
            'status' => 'pending', // Default status adalah pending
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('pages.transaksi.edit', compact('transaksi'));
    }

    // Mengupdate transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'total' => 'required|integer|min:1',
            'status' => 'required|string|in:pending,completed,cancelled',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'kode' => $request->kode,
            'total' => $request->total,
            'status' => $request->status,  // Mengizinkan perubahan status
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate.');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    // Membatalkan (menghapus) transaksi
    public function cancel($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibatalkan dan dihapus.');
    }

    // Menandai transaksi sebagai sudah dibayar
    public function bayar(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => 'completed']);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibayar.');
    }
}
