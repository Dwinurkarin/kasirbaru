@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Edit New - Produk
       </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('produk.update',  $produk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="form-group mb-2">
                    <label for="kode" class="form-label">Kode <span class="text-danger">*</span></label>
                    <input type="text" name="kode" id="kode" value="{{ $produk->harga }}" class="form-control @error('kode') is-invalid @enderror" />
    
                    @error('kode')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" value="{{ $produk->nama }}" class="form-control @error('nama') is-invalid @enderror" />
    
                    @error('nama')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                    <input type="text" name="harga" id="harga" value="{{ $produk->harga }}" class="form-control @error('harga') is-invalid @enderror" />
    
                    @error('harga')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="text" name="stok" id="stok" value="{{ $produk->stok }}" class="form-control @error('stok') is-invalid @enderror" />
    
                    @error('stok')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                     @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </section>
    
</div>
@endsection