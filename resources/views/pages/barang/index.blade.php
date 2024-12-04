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

    <div class="page-heading">
        @if (Auth::check() && Auth::user()->role == 'admin')
            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">
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
                                <th>Harga</th>
                                <th>Foto Produk</th>
                                @if (Auth::check() && Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $index => $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                                    <th>
                                        <img src="{{ asset($barang->foto) }}" alt="Coffee Image" class="img-fluid" width="100px">
                                    </th>
                                    <td>
                                        @if (Auth::check() && Auth::user()->role == 'admin')
                                            <a href="{{ route('barang.edit', $barang->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- Modal -->
                        <div id="imageModal" class="modal" style="display: none;">
                            <span class="close" id="closeModal">&times;</span>
                            <img class="modal-content" id="modalImage">
                        </div>

                    </table>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("imageModal");
            const modalImage = document.getElementById("modalImage");
            const closeModal = document.getElementById("closeModal");
    
            // Tambahkan event listener ke gambar
            document.querySelectorAll(".img-fluid").forEach(image => {
                image.addEventListener("click", function () {
                    modal.style.display = "flex";
                    modalImage.src = this.src;
                });
            });
    
            // Tutup modal saat tombol close diklik
            closeModal.addEventListener("click", function () {
                modal.style.display = "none";
            });
    
            // Tutup modal saat klik di luar gambar
            modal.addEventListener("click", function (e) {
                if (e.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
    
@endsection
