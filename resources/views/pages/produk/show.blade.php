@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Produk
       </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                <tr>
                    <td>Kode</td>
                    <td>{{ $produk->kode }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $produk->nama }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{ $produk->harga }}</td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>{{ $produk->stok }}</td>
                </tr>
                <td>
                <a href="{{ route('produk.index') }}" class="btn btn-primary btn-sm me-1">
                    <span class="bi bi-arrow-left"></span>
                    Kembali
                </a>
            </td>
            </table>
            </div>
        </div>
    </section>
    
</div>
@endsection