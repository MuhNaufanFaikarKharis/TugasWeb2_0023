<?php include 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2>Tambah Produk</h2>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php?page=produk" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>