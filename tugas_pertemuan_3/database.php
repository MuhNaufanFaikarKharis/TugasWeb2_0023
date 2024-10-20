<?php
class Database {
    // Properties for DB connection
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "db_php_0023";
    public $connect;

    // Constructor untuk inisialisasi koneksi database
    function __construct() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Menambah data baru ke database
    function tambahData($nama, $alamat, $nohp, $jenis_kelamin, $foto, $email) {
        $stmt = $this->connect->prepare("INSERT INTO users (nama, alamat, nohp, jenis_kelamin, foto, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nama, $alamat, $nohp, $jenis_kelamin, $foto, $email);
        if ($stmt->execute()) {
            echo "Data berhasil ditambahkan.";
        } else {
            echo "Error: " . $this->connect->error;
        }
        $stmt->close();
    }

    // Menampilkan data dari database
    function tampilData() {
        $data = mysqli_query($this->connect, "SELECT * FROM users");
        if ($data) {
            return mysqli_fetch_all($data, MYSQLI_ASSOC);
        } else {
            echo "Error: " . $this->connect->error;
            return [];
        }
    }

    // Mengambil data user spesifik untuk diedit
    function editData($id) {
        $stmt = $this->connect->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $rows;
    }

    // Mengupdate data dengan atau tanpa foto
    function updateData($id, $nama, $alamat, $nohp, $jenis_kelamin, $email, $foto = null) {
        if ($foto) {
            $stmt = $this->connect->prepare("UPDATE users SET nama = ?, alamat = ?, nohp = ?, jenis_kelamin = ?, foto = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssssssi", $nama, $alamat, $nohp, $jenis_kelamin, $foto, $email, $id);
        } else {
            $stmt = $this->connect->prepare("UPDATE users SET nama = ?, alamat = ?, nohp = ?, jenis_kelamin = ?, email = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $nama, $alamat, $nohp, $jenis_kelamin, $email, $id);
        }
        if ($stmt->execute()) {
            echo "Data berhasil diupdate.";
        } else {
            echo "Error: " . $this->connect->error;
        }
        $stmt->close();
    }

    // Menghapus data user
    function delete($id) {
        $stmt = $this->connect->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Error: " . $this->connect->error;
        }
        $stmt->close();
    }
}
?>
