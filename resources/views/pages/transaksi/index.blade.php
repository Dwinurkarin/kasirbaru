@extends('template')

@section('konten')
<h2 class="text-center mb-4">Transaksi</h2>

<!-- Tampilkan pesan sukses dan kembalian -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <br>
        Kembalian: Rp{{ session('kembalian') }}
    </div>
@endif

<form id="formTransaksi" method="POST" action="{{ route('transaksi.simpan') }}" class="container">
    @csrf
    <div class="mb-3">
        <div class="input-group">
            <input type="text" id="kode_barang" class="form-control" placeholder="Masukkan kode barang" required>
            <button type="button" class="btn btn-primary" onclick="tambahBarang()">Tambah Barang</button>
        </div>
    </div>
    
    <h3>Daftar Barang</h3>
    <div id="daftarBarang" class="mb-3"></div>

    <div id="formPembayaran" class="card mt-4" style="display:none;">
        <div class="card-body">
            <h5 class="card-title">Form Pembayaran</h5>
            <div class="mb-3">
                <label for="total">Total Harga:</label>
                <input type="number" id="total" name="total" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="pembayaran">Uang Pembayaran:</label>
                <input type="number" name="pembayaran" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Bayar</button>
        </div>
    </div>

    <input type="hidden" id="items" name="items">
</form>

<script>
    let daftarBarang = [];
    
    function tambahBarang() {
        let kodeBarang = document.getElementById('kode_barang').value;
        
        fetch("{{ route('transaksi.cariBarang') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ kode_barang: kodeBarang })
        })
        .then(response => response.json())
        .then(barang => {
            if (barang) {
                let item = daftarBarang.find(i => i.barang_id === barang.id);
                if (item) {
                    item.jumlah += 1;
                    item.subtotal += barang.harga;
                } else {
                    daftarBarang.push({
                        barang_id: barang.id,
                        nama_barang: barang.nama_barang,
                        harga: barang.harga,
                        jumlah: 1,
                        subtotal: barang.harga
                    });
                }
                tampilkanDaftarBarang();
            }
        });
    }

    function tampilkanDaftarBarang() {
        let daftarHTML = '';
        let total = 0;

        daftarBarang.forEach(item => {
            total += item.subtotal;
            daftarHTML += `
                <div class="alert alert-info">
                    <strong>${item.nama_barang}</strong><br>
                    Harga: Rp${item.harga}<br>
                    Jumlah: ${item.jumlah}<br>
                    Subtotal: Rp${item.subtotal}
                </div>
            `;
        });

        document.getElementById('daftarBarang').innerHTML = daftarHTML;
        document.getElementById('total').value = total;

        // Update hidden input dengan data barang dalam format JSON
        document.getElementById('items').value = JSON.stringify(daftarBarang);

        if (total > 0) {
            document.getElementById('formPembayaran').style.display = 'block';
        }
    }
</script>
@endsection
