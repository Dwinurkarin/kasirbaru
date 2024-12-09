@extends('template')
@section('judul', 'Barang')
@section('konten')
<div class="form-group">
    <label for="categorySelect">Pilih Kategori</label>
    <select id="categorySelect" class="form-control">
        <option value="">-- Pilih Kategori --</option>
        <option value="coffe">Coffee</option>
        <option value="non-coffee">Non Coffee</option>
        <option value="dessert">Dessert</option>
    </select>
</div>    
<div id="barangContainer">
    <!-- Data barang akan ditampilkan di sini -->
</div>
<script>
    document.getElementById('categorySelect').addEventListener('change', function () {
        const selectedCategory = this.value;

        // Kosongkan container barang sebelumnya
        const barangContainer = document.getElementById('barangContainer');
        barangContainer.innerHTML = '<p>Memuat data...</p>';

        if (selectedCategory) {
            // Panggil API atau load data sesuai kategori
            fetch(`/get-barang-by-category?category=${selectedCategory}`)
                .then(response => response.json())
                .then(data => {
                    // Bersihkan container
                    barangContainer.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(barang => {
                            const barangElement = document.createElement('div');
                            barangElement.className = 'barang-item';
                            barangElement.innerHTML = `
                                <h4>${barang.nama}</h4>
                                <p>Harga: ${barang.harga}</p>
                                <p>Stok: ${barang.stok}</p>
                            `;
                            barangContainer.appendChild(barangElement);
                        });
                    } else {
                        barangContainer.innerHTML = '<p>Data barang tidak ditemukan.</p>';
                    }
                })
                .catch(err => {
                    barangContainer.innerHTML = '<p>Terjadi kesalahan saat memuat data.</p>';
                });
        } else {
            barangContainer.innerHTML = '<p>Pilih kategori untuk melihat data barang.</p>';
        }
    });
</script>

@endsection
