@extends('template')
@section('konten')
<div class="container">
    <h1>Edit Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="kode">Kode Transaksi:</label>
            <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode', $transaksi->kode) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="total">Total:</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $transaksi->total) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $transaksi->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $transaksi->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Transaksi</button>
    </form>
</div>
    
@endsection