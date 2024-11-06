<!DOCTYPE html>
<html>

<head>
<title>Sistem Penjualan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .nav-link {
            font-weight: 600;
            text-transform: uppercase;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Sistem Penjualan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="index.php?page=dashboard"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=transaksi">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">