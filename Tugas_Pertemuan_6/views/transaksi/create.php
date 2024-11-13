<?php include 'views/layout/header.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?page=transaksi">Transaksi</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Transaksi</h3>
                </div>

                <!-- form start -->
                <form method="POST" id="transaksiForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pelanggan_id">Pelanggan</label>
                                    <select class="form-control select2" name="pelanggan_id" required>
                                        <option value="">Pilih Pelanggan</option>
                                        <?php while ($pelanggan = $pelanggan_data->fetch(PDO::FETCH_ASSOC)): ?>
                                            <option value="<?php echo $pelanggan['id']; ?>">
                                                <?php echo $pelanggan['nama']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" required value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>

                        <h4>Detail Produk</h4>
                        <div id="produkContainer">
                            <div class="row mb-3 produk-row">
                                <div class="col-md-4">
                                    <select class="form-control select2 produk-select" name="produk_id[]" required>
                                        <option value="">Pilih Produk</option>
                                        <?php
                                        $produk_array = [];
                                        while ($produk = $produk_data->fetch(PDO::FETCH_ASSOC)) {
                                            $produk_array[] = $produk;
                                            echo '<option value="' . $produk['id'] . '" data-harga="' . $produk['harga'] . '" data-stok="' . $produk['stok'] . '">' . $produk['nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control jumlah" name="jumlah[]" min="1" placeholder="Jumlah" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control harga" name="harga[]" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control subtotal" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-remove">X</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" id="addProduk">Tambah Produk</button>

                        <div class="form-group mt-3">
                            <h4>Total: <span id="totalTransaksi">0</span></h4>
                            <input type="hidden" name="total" id="totalInput">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=transaksi" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('produkContainer');
        const addButton = document.getElementById('addProduk');
        const totalSpan = document.getElementById('totalTransaksi');
        const totalInput = document.getElementById('totalInput');
        const produkTemplate = container.querySelector('.produk-row').cloneNode(true);

        // Initialize Select2 for dropdowns
        $('.select2').select2();

        // Add new product row
        addButton.addEventListener('click', function() {
            const newRow = produkTemplate.cloneNode(true);
            setupRow(newRow);
            container.appendChild(newRow);
            $('.select2').select2(); // Reinitialize Select2 for new rows
        });

        // Setup initial row
        setupRow(container.querySelector('.produk-row'));

        function setupRow(row) {
            const select = row.querySelector('.produk-select');
            const jumlah = row.querySelector('.jumlah');
            const harga = row.querySelector('.harga');
            const subtotal = row.querySelector('.subtotal');
            const removeBtn = row.querySelector('.btn-remove');

            select.addEventListener('change', function() {
                const option = this.options[this.selectedIndex];
                harga.value = option.dataset.harga || '';
                calculateSubtotal();
            });

            jumlah.addEventListener('input', calculateSubtotal);

            removeBtn.addEventListener('click', function() {
                if (container.children.length > 1) {
                    row.remove();
                    calculateTotal();
                }
            });

            function calculateSubtotal() {
                const qty = parseFloat(jumlah.value) || 0;
                const price = parseFloat(harga.value) || 0;
                subtotal.value = qty * price;
                calculateTotal();
            }
        }

        function calculateTotal() {
            let total = 0;
            container.querySelectorAll('.subtotal').forEach(function(el) {
                total += parseFloat(el.value) || 0;
            });
            totalSpan.textContent = total.toLocaleString('id-ID');
            totalInput.value = total;
        }
    });
</script>

<?php include 'views/layout/footer.php'; ?>
