<?php
include 'database.php';
$db = new Database();
$id = $_GET['id'];
$detail = $db->editData($id);
$dataUser = $detail[0]; // Ambil data pertama dari array
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
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
      <h1>Edit Data</h1>
      <form method="POST" action="proses.php?aksi=edit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $dataUser['id']; ?>">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dataUser['nama']; ?>">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dataUser['alamat']; ?>">
        </div>
        <div class="mb-3">
          <label for="nohp" class="form-label">No HP</label>
          <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $dataUser['nohp']; ?>">
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            <option value="Laki-laki" <?php if ($dataUser['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($dataUser['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $dataUser['email']; ?>">
            </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Unggah Foto Baru (opsional)</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
