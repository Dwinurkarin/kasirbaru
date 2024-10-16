@extends('template')

@section('konten')
<div class="container">
    <h1>Daftar Transaksi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->kode }}</td>
                    <td>{{ $transaksi->total }}</td>
                    <td>
                        @if ($transaksi->status == 'completed')
                            <span class="badge bg-success">Completed</span>
                        @elseif ($transaksi->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif ($transaksi->status == 'cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        @if ($transaksi->status == 'pending')
                        <form action="{{ route('transaksi.cancel', $transaksi->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
                        </form>

                            <form action="{{ route('transaksi.bayar', $transaksi->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Bayar</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Tidak ada aksi</span>
                        @endif

                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
