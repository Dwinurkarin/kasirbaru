@extends('template')
@section('judul','Barang')
@section('konten')
    <div class="page-heading"> 
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">
            <span class="bi bi-plus-circle"></span> Tambah Barang
        </a>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $index => $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>
                                        <a href="{{ route('barang.edit', $barang->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
