@extends('template')

@section('konten')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Barang
            </h3>
        </div>

        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">
            <span class="bi bi-plus-circle"></span> Create New
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->harga }}</td>
                                    <td>
                                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-info btn-sm">
                                            Show
                                        </a>
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
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
            </div>
        </section>
    </div>
    <form action="" id="form-delete" method="POST">
        @csrf
        @method("DELETE")
    </form>
@endsection
