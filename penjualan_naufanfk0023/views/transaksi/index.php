<?php include 'views/layout/header.php'; ?>

<style>
    /* General page styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    h2 {
        color: #0062cc;
        font-size: 1.8rem;
        font-weight: bold;
    }

    /* Button styles */
    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 0.9rem;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
    }

    .btn-info {
        background-color: #17a2b8;
        transition: background-color 0.3s;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    /* Table styles */
    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: left;
    }

    .table thead th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    /* Header actions */
    .d-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }
</style>

<div class="container">
    <div class="d-flex mb-4">
        <h2>Daftar Transaksi</h2>
        <a href="index.php?page=transaksi&action=create" class="btn btn-primary">Tambah Transaksi</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($row['tanggal']))); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pelanggan']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($row['total'], 0, ',', '.')); ?></td>
                    <td>
                        <a href="index.php?page=transaksi&action=view&id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>

