<?php
include 'database.php';
$db = new Database();
$id = $_GET['id'];
$detail = $db->editData($id);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Informasi User</title>
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
      <h1>Detail Informasi User</h1>
      <hr>

      <?php foreach ($detail as $dataUser) { ?>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="uploads/<?php echo $dataUser['foto']; ?>" class="img-fluid rounded-start" alt="Foto Profil">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $dataUser['nama']; ?></h5>
          <p class="card-text">
            Alamat: <?php echo $dataUser['alamat']; ?><br>
            No HP: <?php echo $dataUser['nohp']; ?><br>
            Kelas: <?php echo $dataUser['kelas']; ?><br>
            NIM: <?php echo $dataUser['nim']; ?><br>
            Email: <?php echo $dataUser['email']; ?><br>
            Jenis Kelamin: <?php echo $dataUser['jenis_kelamin']; ?>
          </p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
        <button class="btn btn-primary">Kembali</button>
    </div>
  </div>
<?php } ?>

      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
