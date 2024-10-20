<?php
session_start();
include 'database.php';
$db = new Database();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OOP PHP!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #8B0000;
            background-size: cover;
        }
        .container {
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      <h1>CRUD OOP PHP!</h1>
      <hr>

      <!-- Notifikasi berhasil/gagal -->
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['message']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
      }
      ?>

      <!-- Tombol tambah data -->
      <a href="input.php" class="btn btn-success btn-sm">Tambah Data</a>
      <hr>

      <!-- Tabel untuk menampilkan user -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $nomor = 1;
          foreach ($db->tampilData() as $dataUser) {
          ?>
            <tr>
              <th scope="row"><?php echo $nomor++; ?></th>
              <td><?php echo $dataUser['nama']; ?></td>
              <td><?php echo $dataUser['alamat']; ?></td>
              <td><?php echo $dataUser['nohp']; ?></td>
              <td>
    <a href="edit.php?id=<?php echo $dataUser['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="proses.php?id=<?php echo $dataUser['id']; ?>&aksi=hapus" 
       class="btn btn-danger btn-sm" 
       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
    <a href="informasi.php?id=<?php echo $dataUser['id']; ?>" class="btn btn-info btn-sm">Detail</a>
</td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
