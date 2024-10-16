@extends('template')
@section('konten')
<div class="container">
    <h1>Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="kode">Kode Transaksi:</label>
            <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="total">Total:</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ old('total') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>
@endsection