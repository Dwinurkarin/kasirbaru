@extends('template')

@section('konten')
<div class="container">
    <h1>Detail Barang</h1>

    <div class="card">
        <div class="card-header">
            Kode Barang: {{ $barang->kode_barang }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Nama Barang: {{ $barang->nama_barang }}</h5>
            <p class="card-text">Harga: Rp{{ number_format($barang->harga, 0, ',', '.') }}</p>
        </div>
    </div>

    <a href="{{ route('barang.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
