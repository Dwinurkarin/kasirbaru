@extends('template')

@section('konten')
<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            @if (!$transaksiAktif)
                <form action="{{ route('transaksi.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Transaksi Baru</button>
                </form>
            @else

            @endif
        </div>
    </div>

    @if ($transaksiAktif)
    <div class="row mt-2">
        <div class="col-8">
            <div class="card border-primary">
                <div class="card-body">
                    <h4 class="card-title">No Invoice : {{ $transaksiAktif->kode }}</h4>
                    <form action="{{ route('transaksi.update', $transaksiAktif->id ?? null) }}" method="POST">
                        @csrf
                        <input type="text" name="kode" class="form-control" placeholder="No Invoice" value="{{ old('kode') }}">
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaProduk as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produk->produk->kode }}</td>
                                <td>{{ $produk->produk->nama }}</td>
                                <td>{{ number_format($produk->produk->harga, 2, '.', ',') }}</td>
                                <td>{{ $produk->jumlah }}</td>
                                <td>{{ number_format($produk->produk->harga * $produk->jumlah, 2, '.', ',') }}</td>
                                <td>
                                    <form action="{{ route('transaksi.hapus', $produk->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h4 class="card-title">Total Biaya</h4>
                    <div class="d-flex justify-content-between">
                        <span>Rp.</span>
                        <span>{{ number_format($totalSemuaBelanja, 2, '.', ',') }}</span>
                    </div>
                </div>
            </div>
            <div class="card border-primary mt-2">
                <div class="card-body">
                    <h4 class="card-title">Bayar</h4>
                    <input type="number" class="form-control" placeholder="Bayar" name="bayar">
                </div>
            </div>
            <div class="card border-primary mt-2">
                <div class="card-body">
                    <h4 class="card-title">Kembalian</h4>
                    <div class="d-flex justify-content-between">
                        <span>Rp.</span>
                        <span>{{ number_format($kembalian, 2, '.', ',') }}</span>
                    </div>
                </div>
            </div>
            @if ($bayar)
                @if ($kembalian < 0)
                    <div class="alert alert-danger mt-2" role="alert">
                        Uang Kurang
                    </div>
                @else
                    <form action="{{ route('transaksi.selesai') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mt-2 w-100">Bayar</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
    @endif
</div>
@endsection
