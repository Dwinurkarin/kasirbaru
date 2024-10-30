@extends('template')
@section('konten')
<h2 class="text-center mb-4">Edit Barang</h2>

<div class="container">
    <form method="POST" action="{{ route('barang.update', $barang->id) }}" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" required>
            <div class="invalid-feedback">
                Kode barang diperlukan.
            </div>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
            <div class="invalid-feedback">
                Nama barang diperlukan.
            </div>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $barang->harga) }}" required>
            <div class="invalid-feedback">
                Harga diperlukan.
            </div>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $barang->stok) }}" required>
            <div class="invalid-feedback">
                Stok diperlukan.
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Perbarui</button>
    </form>
</div>

<!-- Bootstrap JS dan Popper.js (opsional, hanya jika kamu menggunakan fitur yang memerlukan) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // JavaScript untuk menghindari pengiriman form jika validasi gagal
    (function () {
        'use strict'
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation')
            for (var i = 0; i < forms.length; i++) {
                forms[i].addEventListener('submit', function (event) {
                    if (this.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    this.classList.add('was-validated')
                }, false)
            }
        }, false)
    })()
</script>

@endsection