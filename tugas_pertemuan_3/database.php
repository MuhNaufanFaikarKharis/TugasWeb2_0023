<?php
    class Database {
        // Properti
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "db_php_0023";

        public $connect;

        function __construct() {
            $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);

            // Pengujian koneksi
            if (mysqli_connect_errno()) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
        }
        function tambahData($nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto) {
            mysqli_query($this->connect, "INSERT INTO users (nama, alamat, nohp, kelas, nim, jenis_kelamin, foto) 
                                          VALUES ('$nama', '$alamat', '$nohp', '$kelas', '$nim', '$jenis_kelamin', '$foto')");
        }

        // Menampilkan data
        function tampilData() {
            $data = mysqli_query($this->connect, "SELECT * FROM users");
            $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $rows;
        }

        

        // Mengedit data (menampilkan data user yang ingin diedit)
        function editData($id) {
            $stmt = $this->connect->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i",  $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $rows;
        }

        // Memperbarui data
function updateData($id, $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto = null) {
    if ($foto) {
        $stmt = $this->connect->prepare("UPDATE users SET nama = ?, alamat = ?, nohp = ?, kelas = ?, nim = ?, jenis_kelamin = ?, foto = ? WHERE id = ?");
        $stmt->bind_param("sssssssi", $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto, $id);
    } else {
        $stmt = $this->connect->prepare("UPDATE users SET nama = ?, alamat = ?, nohp = ?, kelas = ?, nim = ?, jenis_kelamin = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $id);
    }
    $stmt->execute();
    $stmt->close();
}


        // Menghapus data
        function delete($id) {
            $stmt = $this->connect->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }
?>
