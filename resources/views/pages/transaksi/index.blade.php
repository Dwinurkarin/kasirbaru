@extends('template')

@section('konten')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Transaksi
            </h3>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <br>
                Kembalian: Rp{{ session('kembalian') }}
            </div>
        @endif

        <form id="formTransaksi" method="POST" action="{{ route('transaksi.simpan') }}">
            @csrf
            <div id="listBarang">
                <div class="barang mb-3">
                    <label for="barangSelect" class="form-label">Pilih Barang:</label>
                    <select id="barangSelect" class="form-select" onchange="tambahBarang()">
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}" data-nama="{{ $barang->nama_barang }}"
                                data-harga="{{ $barang->harga }}">
                                {{ $barang->nama_barang }} - Rp{{ number_format($barang->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="page-title mb-3">
                <h3>
                    <span class="bi bi-building"></span>
                    Daftar Barang
                </h3>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="daftarBarang"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <div id="formPembayaran" style="display:none;">
                <label>Total Harga: </label>
                <input type="number" id="total" name="total" readonly>

                <label>Uang Pembayaran:</label>
                <input type="number" name="pembayaran" required>

                <button type="submit" class="btn btn-primary mt-3">Bayar</button>
            </div>
            <input type="hidden" id="items" name="items">
        </form>

        <script>
            let daftarBarang = [];

            function tambahBarang() {
                let barangSelect = document.getElementById('barangSelect');
                let selectedOption = barangSelect.options[barangSelect.selectedIndex];

                if (selectedOption.value) {
                    let barangId = selectedOption.value;
                    let namaBarang = selectedOption.getAttribute('data-nama');
                    let harga = parseInt(selectedOption.getAttribute('data-harga'));

                    let item = daftarBarang.find(i => i.barang_id == barangId);
                    if (item) {
                        item.jumlah += 1;
                        item.subtotal += harga;
                    } else {
                        daftarBarang.push({
                            barang_id: barangId,
                            nama_barang: namaBarang,
                            harga: harga,
                            jumlah: 1,
                            subtotal: harga
                        });
                    }

                    tampilkanDaftarBarang();
                    barangSelect.selectedIndex = 0;
                }
            }

            function tampilkanDaftarBarang() {
                let daftarHTML = '';
                let total = 0;

                daftarBarang.forEach((item, index) => {
                    total += item.subtotal;
                    daftarHTML += `
                        <tr>
                            <td>${item.nama_barang}</td>
                            <td>Rp${item.harga}</td>
                            <td>${item.jumlah}</td>
                            <td>Rp${item.subtotal}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" onclick="tambahJumlahBarang(${item.barang_id})">+</button>
                            </td>
                        </tr>
                    `;
                });

                document.getElementById('daftarBarang').innerHTML = daftarHTML;
                document.getElementById('total').value = total;
                document.getElementById('items').value = JSON.stringify(daftarBarang);

                if (total > 0) {
                    document.getElementById('formPembayaran').style.display = 'block';
                }
            }

            function tambahJumlahBarang(barangId) {
                let item = daftarBarang.find(i => i.barang_id == barangId);
                if (item) {
                    item.jumlah += 1;
                    item.subtotal += item.harga;
                }
                tampilkanDaftarBarang();
            }
        </script>
    </div>
@endsection
