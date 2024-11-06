<?php
class DashboardController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        // Hitung jumlah produk
        $queryProduk = "SELECT COUNT(*) as total FROM produk";
        $stmtProduk = $this->db->prepare($queryProduk);
        $stmtProduk->execute();
        $totalProduk = $stmtProduk->fetch(PDO::FETCH_ASSOC)['total'];

        // Hitung jumlah pelanggan
        $queryPelanggan = "SELECT COUNT(*) as total FROM pelanggan";
        $stmtPelanggan = $this->db->prepare($queryPelanggan);
        $stmtPelanggan->execute();
        $totalPelanggan = $stmtPelanggan->fetch(PDO::FETCH_ASSOC)['total'];

        // Hitung jumlah transaksi
        $queryTransaksi = "SELECT COUNT(*) as total FROM transaksi";
        $stmtTransaksi = $this->db->prepare($queryTransaksi);
        $stmtTransaksi->execute();
        $totalTransaksi = $stmtTransaksi->fetch(PDO::FETCH_ASSOC)['total'];

        // Load view
        include 'views/dashboard/index.php';
    }
}