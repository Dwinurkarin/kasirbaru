@extends('template')

@section('konten')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Create New - Barang
       </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group mb-3">
                    <label for="kode_barang" class="form-lable"> Kode Barang <span class="text-danger">*</span></label>
                    <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" class="form-control @error('kode_barang') is-invalid  @enderror" />
            
                    @error('kode_barang') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_barang" class="form-lable"> Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama_barang" id="name" value="{{ old('nama_barang') }}" class="form-control @error('nama_barang') is-invalid  @enderror" />
            
                    @error('nama_barang') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="form-group mb-3">
                    <label for="kategori_id" class="form-lable">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                
                    @error('kategori_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="harga" class="form-lable">Harga <span class="text-danger">*</span></label>
                    <input type="number" name="harga" id="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid  @enderror" />
                    
                    @error('harga') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="foto" class="form-lable"> Foto</label>
                    <input type="file" name="foto" id="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid  @enderror" />
            
                    @error('harga') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"> Simpan </button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
            </div>
        </div>
    </section>
</div>
@endsection