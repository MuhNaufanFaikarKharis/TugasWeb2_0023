<?php include 'views/layout/header.php'; ?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .dashboard-container {
        padding: 40px 0;
    }
    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }
    .dashboard-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .dashboard-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }
    .card-body {
        padding: 30px;
    }
    .card-icon {
        font-size: 48px;
        margin-bottom: 20px;
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .animate-number {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .btn-custom {
        padding: 10px 20px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 30px;
    }
</style>

<div class="container dashboard-container">
    <h1 class="dashboard-title">Selamat Datang di Dashboard Penjualan Alat-alat Sport</h1>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-box card-icon text-primary"></i>
                    <h5 class="card-title">Total Produk</h5>
                    <p class="animate-number text-primary" data-target="<?php echo $totalProduk; ?>">0</p>
                    <a href="index.php?page=produk" class="btn btn-primary btn-custom">Lihat Produk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users card-icon text-success"></i>
                    <h5 class="card-title">Total Pelanggan</h5>
                    <p class="animate-number text-success" data-target="<?php echo $totalPelanggan; ?>">0</p>
                    <a href="index.php?page=pelanggan" class="btn btn-success btn-custom">Lihat Pelanggan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart card-icon text-warning"></i>
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="animate-number text-warning" data-target="<?php echo $totalTransaksi; ?>">0</p>
                    <a href="index.php?page=transaksi" class="btn btn-warning btn-custom">Lihat Transaksi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const animateNumbers = document.querySelectorAll('.animate-number');
        
        animateNumbers.forEach(number => {
            const target = parseInt(number.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateNumber = () => {
                current += step;
                if (current < target) {
                    number.textContent = Math.round(current);
                    requestAnimationFrame(updateNumber);
                } else {
                    number.textContent = target;
                }
            };

            updateNumber();
        });
    });
</script>

<?php include 'views/layout/footer.php'; ?>