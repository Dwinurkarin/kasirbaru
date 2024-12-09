@extends('template')
@section('judul', 'Barang')
@section('konten')
    <style>
        .modal {
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #f44336;
        }
    </style>
<select name="kategori_id" id="kategoriSelect" class="form-control">
    <option value="">-- Pilih Kategori --</option>
    @foreach ($kategoris as $kategori)
        <option value="{{ $kategori->id }}" {{ $selectedCategory == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->nama_kategori }}
        </option>
    @endforeach
</select>

<!-- Tampilan tabel barang -->
<div class="page-heading">
    @if (Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3 mt-3">
            <span class="bi bi-plus-circle"></span> Tambah Produk
        </a>
    @endif
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Foto Produk</th>
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kode_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori ? $barang->kategori->nama_kategori : 'Tidak ada kategori' }}</td>
                                <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                                <td>
                                    <img src="{{ asset($barang->foto) }}" alt="Barang Image" class="img-fluid" width="100px">
                                </td>
                                <td>
                                    @if (Auth::check() && Auth::user()->role == 'admin')
                                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('kategoriSelect').addEventListener('change', function() {
        const selectedCategory = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('kategori_id', selectedCategory); // Menambahkan parameter kategori_id
        window.location.href = url; // Mengarahkan ke URL dengan kategori yang dipilih
    });
</script>


@endsection
