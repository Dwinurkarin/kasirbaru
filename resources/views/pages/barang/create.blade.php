@extends('template')
@section('konten')
<h2 class="text mb-4">Tambah Barang</h2>

<div class="container">
    <form method="POST" action="{{ route('barang.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
            <div class="invalid-feedback">
                Kode barang diperlukan.
            </div>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            <div class="invalid-feedback">
                Nama barang diperlukan.
            </div>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
            <div class="invalid-feedback">
                Harga diperlukan.
            </div>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
            <div class="invalid-feedback">
                Stok diperlukan.
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
</div>

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
