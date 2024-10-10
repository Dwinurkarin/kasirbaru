@extends('template')

@section('konten')
<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                @if (!$transaksiAktif)
                    <form action="{{ route('transaksi.baru') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Transaksi Baru</button>
                    </form>
                @else
                    <form action="{{ route('transaksi.batalkan') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Batalkan Transaksi</button>
                    </form>
                @endif
            </div>
        </div>

        @if ($transaksiAktif)
        <div class="row mt-2">
            <div class="col-8">
            <div class="card border-primary">
                <div class="card-body">
                    <h4 class="card-title">No Invoice : {{ $transaksiAktif->kode }}</h4>
                    <input type="text" class="form-control" placeholder="No Invoice" name="kode">
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
                                <td>{{ $produk->kode }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ number_format($produk->harga, 2, '.', ',') }}</td>
                                <td>{{ $produk->jumlah }}</td>
                                <td>{{ number_format($produk->harga * $produk->jumlah, 2, '.', ',') }}</td>
                                <td>
                                    <form action="{{ route('produk.hapus', $produk->id) }}" method="POST">
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
                        <input type="number" class="form-control" placeholder="Bayar" name="bayar" oninput="this.form.submit()">
                    </div>
                </div>
                <div class="card border-primary mt-2">
                    <div class="card-body">
                        <h4 class="card-title">Kembalian</h4>
                        <div class="d-flex justify-content-between">
                            <span>Rp.</span>
                            {{ number_format($kembalian, 2, '.', ',') }}
                        </div>
                    </div>
                </div>
                @if ($bayar)
                    @if ($kembalian < 0)
                        <div class="alert alert-danger mt-2" role="alert">
                            Uang Kurang
                        </div>
                    @elseif ($kembalian >= 0)
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
</div>
@endsection
