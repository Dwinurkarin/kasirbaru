@extends('template')

@section('konten')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Transaksi
       </h3>
    </div>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" readonly>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" readonly>
        </div>
        <div class="form-group">
            <label for="total_bayar">Jumlah Uang</label>
            <input type="number" class="form-control" name="total_bayar" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kode_barang').on('input', function() {
            let kodeBarang = $(this).val();

            if (kodeBarang.length > 0) {
                $.ajax({
                    url: "{{ route('transaksi.getBarang') }}",
                    method: 'GET',
                    data: { kode_barang: kodeBarang },
                    success: function(data) {
                        $('#nama_barang').val(data.nama_barang);
                        $('#harga').val(data.harga);
                    },
                    error: function() {
                        $('#nama_barang').val('');
                        $('#harga').val('');
                    }
                });
            } else {
                $('#nama_barang').val('');
                $('#harga').val('');
            }
        });
    });
</script>
@endsection
