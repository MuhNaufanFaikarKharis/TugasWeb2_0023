<?php
class Produk
{
    private $conn;
    private $table = "produk";

    public $id;
    public $nama;
    public $harga;
    public $stok;

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
        $query = "INSERT INTO " . $this->table . " (nama, harga, stok) VALUES (:nama, :harga, :stok)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":stok", $this->stok);

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
                SET nama = :nama, harga = :harga, stok = :stok 
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":stok", $this->stok);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        // Hapus data terkait di tabel `detail_transaksi` terlebih dahulu
        $queryDetail = "DELETE FROM detail_transaksi WHERE produk_id = :id";
        $stmtDetail = $this->conn->prepare($queryDetail);
        $stmtDetail->bindParam(":id", $this->id, PDO::PARAM_INT);
    
        try {
            $stmtDetail->execute();
    
            // Setelah data terkait dihapus, hapus data di tabel utama
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