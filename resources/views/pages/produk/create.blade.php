@extends('template')

@section('konten')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Create New - Produk
       </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('produk.store') }}" method="POST">
                    @csrf
                <div class="form-group mb-3">
                    <label for="kode" class="form-lable"> Kode <span class="text-danger">*</span></label>
                    <input type="text" name="kode" id="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid  @enderror" />
            
                    @error('kode') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class="form-lable"> Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="name" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid  @enderror" />
            
                    @error('nama') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="harga" class="form-lable"> Harga <span class="text-danger">*</span></label>
                    <input type="text" name="harga" id="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid  @enderror" />
            
                    @error('harga') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="stok" class="form-lable"> Stok <span class="text-danger">*</span></label>
                    <input type="text" name="stok" id="harga" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid  @enderror" />
            
                    @error('stok') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"> Simpan </button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
            </form>
            </div>
        </div>
    </section>
</div>
@endsection