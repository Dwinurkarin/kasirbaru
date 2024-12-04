@extends('template')

@section('konten')
    <h2 class="text-center mb-4">Edit Barang</h2>

    <div class="container">
        <form method="POST" action="{{ route('barang.update', $barang->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="kode_barang" class="form-label">Kode Barang <span class="text-danger">*</span></label>
                <input type="text" name="kode_barang" id="kode_barang" value="{{ $barang->kode_barang }}" class="form-control @error('kode_barang') is-invalid @enderror" />

                @error('kode_barang')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="nama_barang" class="form-label">Nama Produk<span class="text-danger">*</span></label>
                <input type="text" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}" class="form-control @error('nama_barang') is-invalid @enderror" />

                @error('nama_barang')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                <input type="number" name="harga" id="harga" value="{{ $barang->harga }}" class="form-control @error('harga') is-invalid @enderror" />

                @error('harga')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                 @enderror
            </div>

            <div>
                <label for="foto">Foto Barang</label>
                <input type="file" name="foto" id="foto" accept="image/*" onchange="previewImage(event)">
                <p>Preview Foto:</p>
                <img id="preview" src="{{ $barang->foto ? asset($barang->foto) : '#' }}" alt="Preview Gambar" width="100" 
                    style="{{ $barang->foto ? '' : 'display: none;' }}">
            </div>
            

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script>
        // JavaScript untuk menghindari pengiriman form jika validasi gagal
        (function() {
            'use strict'
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation')
                for (var i = 0; i < forms.length; i++) {
                    forms[i].addEventListener('submit', function(event) {
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
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Tampilkan gambar
                };
                reader.readAsDataURL(file); // Membaca file sebagai data URL
            } else {
                preview.src = '#';
                preview.style.display = 'none'; // Sembunyikan jika tidak ada file
            }
        }
    </script>
    
@endsection
