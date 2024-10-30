@extends('template')
@section('konten')
<div class="container mt-5">
    <h2 class="text-center mb-4">Laporan Transaksi</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Kode Invoice</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
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

@endsection