@extends('template')
@section('judul','Laporan')
@section('konten')
    <div class="page-heading">

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tanggal & Waktu</th>
                                <th>Kode Invoice</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <td>{{ $laporan->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y H:i') }}</td>
                                    <td>INV/{{ $laporan->transaksi_id }}</td>
                                    <td>Rp{{ number_format($laporan->total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
