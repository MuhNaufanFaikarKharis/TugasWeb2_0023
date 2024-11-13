<?php
class Pelanggan
{
    private $conn;
    private $table = "pelanggan";

    public $id;
    public $nama;
    public $alamat;
    public $telepon;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nama, alamat, telepon) VALUES (:nama, :alamat, :telepon)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":telepon", $this->telepon);

        return $stmt->execute();
    }

    public function read_single()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                SET nama = :nama, alamat = :alamat, telepon = :telepon 
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":telepon", $this->telepon);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        // Hapus data terkait di tabel `transaksi` terlebih dahulu
        $queryTransaksi = "DELETE FROM transaksi WHERE pelanggan_id = :id";
        $stmtTransaksi = $this->conn->prepare($queryTransaksi);
        $stmtTransaksi->bindParam(":id", $this->id, PDO::PARAM_INT);
    
        try {
            // Eksekusi penghapusan di `transaksi`
            $stmtTransaksi->execute();
    
            // Setelah data terkait dihapus, hapus data di tabel utama `pelanggan`
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}
