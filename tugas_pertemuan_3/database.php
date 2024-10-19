<?php
class Database {
    // Properties for DB connection
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "db_php_0023";
    public $connect;

    function __construct() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Add new data to the database
    function tambahData($nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto, $email) {
        $stmt = $this->connect->prepare("INSERT INTO users (nama, alamat, nohp, kelas, nim, jenis_kelamin, foto, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto, $email);
        $stmt->execute();
        $stmt->close();
    }

    // Retrieve data from the database
    function tampilData() {
        $data = mysqli_query($this->connect, "SELECT * FROM users");
        return mysqli_fetch_all($data, MYSQLI_ASSOC);
    }

    // Get specific user data for editing
    function editData($id) {
        $stmt = $this->connect->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $rows;
    }

    // Update data with or without photo
    function updateData($id, $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto = null, $email = null) {
        if ($foto) {
            $stmt = $this->connect->prepare("UPDATE users SET nama = ?, alamat = ?, nohp = ?, kelas = ?, nim = ?, jenis_kelamin = ?, foto = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssssssssi", $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $foto, $email, $id);
        } else {
            $stmt = $this->connect->prepare("UPDATE users SET nama = ?, alamat = ?, nohp = ?, kelas = ?, nim = ?, jenis_kelamin = ?, email = ? WHERE id = ?");
            $stmt->bind_param("sssssssi", $nama, $alamat, $nohp, $kelas, $nim, $jenis_kelamin, $email, $id);
        }
        $stmt->execute();
        $stmt->close();
    }

    // Delete user data
    function delete($id) {
        $stmt = $this->connect->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
