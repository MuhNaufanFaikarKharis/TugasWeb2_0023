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
        /* Lampu kelap-kelip di background */
/* Animasi untuk siluet orang joget */
@keyframes siluetJoget {
    0% {
        transform: translateX(-10px) rotate(-5deg);
    }
    50% {
        transform: translateX(10px) rotate(5deg);
    }
    100% {
        transform: translateX(-10px) rotate(-5deg);
    }
}

/* Efek lampu kelap-kelip di background */
@keyframes kelapKelip {
    0% {
        background-position: 0 0;
    }
    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0 0;
    }
}

@keyframes jedagJedug {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    50% {
        transform: scale(1.05); /* Memperbesar sedikit pada jedag */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Efek bayangan saat jedag */
    }
}

@keyframes pulsateButton {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    50% {
        transform: scale(1.1); /* Tombol membesar sedikit */
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }
}

body {
    background-color: #a80000; /* Warna latar belakang merah */
    font-family: 'Roboto', sans-serif;
    color: #000; /* Warna teks hitam */
    margin: 0;
    padding: 0;
}

.container {
    width: 60%;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.9); /* Warna card tetap putih dengan transparansi */
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    text-align: center;
    animation: jedagJedug 1s infinite; /* Animasi jedag-jedug pada card */
}

h2 {
    font-family: 'Playfair Display', serif;
    color: #000; /* Warna judul hitam */
    font-size: 36px;
    margin-bottom: 20px;
    animation: jedagJedug 1.5s infinite; /* Efek jedag-jedug pada teks judul */
}

.card {
    display: flex;
    flex-direction: row;
    align-items: center;
    background-color: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: jedagJedug 1s infinite ease-in-out; /* Card juga ikut berdenyut */
}

.card img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-right: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    object-fit: cover;
    animation: jedagJedug 1.2s infinite; /* Animasi jedag-jedug pada foto */
}

.card-info {
    flex: 1;
    text-align: left;
}

.card-info h3 {
    font-family: 'Playfair Display', serif;
    color: #000; /* Nama user dengan warna hitam */
    font-size: 28px;
    margin: 0;
}

.card-info p {
    color: #000; /* Teks deskripsi dengan warna hitam */
    font-size: 16px;
    margin: 5px 0;
}

.card-info small {
    font-size: 12px;
    color: #666;
}

.button-back {
    display: inline-block;
    margin-top: 30px;
    padding: 12px 25px;
    background-color: #4158d0; 
    color: #fff;
    text-decoration: none;
    border-radius: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    animation: pulsateButton 1.5s infinite; /* Tombol juga ikut berdenyut */
}

.button-back:hover {
    background-color: #c850c0; 
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
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
            Email: <?php echo $dataUser['email']; ?><br>
            Jenis Kelamin: <?php echo $dataUser['jenis_kelamin']; ?>
          </p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          <a href = "index.php" class = "btn btn-info btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
