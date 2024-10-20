<?php
session_start(); // Start session for using session variables
include 'database.php'; // Include the database class

$db = new Database();
$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    // Get POST data from form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email']; // Add missing email variable

    // Handle file upload for 'foto'
    $foto = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    // If file is uploaded, move it to the folder
    if (move_uploaded_file($tmp_name, $folder . $foto)) {
        // Add the data to the database
        $db->tambahData($nama, $alamat, $nohp,  $jenis_kelamin, $foto, $email);
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        $_SESSION['message_type'] = "success";
    } else {
        // If the file fails to upload
        $_SESSION['message'] = "Data gagal ditambahkan karena masalah upload foto!";
        $_SESSION['message_type'] = "danger";
    }

    // Redirect to index.php after adding the data
    header("Location: index.php");
    exit();

} elseif ($aksi == 'edit') {
    // Get POST data from form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email']; // Ensure email is captured

    // Check if a new photo is uploaded
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $folder = "uploads/";

        // Move the new uploaded photo to the folder
        if (move_uploaded_file($tmp_name, $folder . $foto)) {
            // Call update function with the new photo
            $db->updateData($id, $nama, $alamat, $nohp, $jenis_kelamin, $foto, $email);
            $_SESSION['message'] = "Data berhasil diperbarui!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Foto gagal diupload!";
            $_SESSION['message_type'] = "danger";
        }
    } else {
        // If no new photo, call update without changing photo
        $db->updateData($id, $nama, $alamat, $nohp,  $jenis_kelamin, null, $email);
        $_SESSION['message'] = "Data berhasil diperbarui tanpa mengubah foto!";
        $_SESSION['message_type'] = "success";
    }

    // Redirect to index.php after updating
    header("Location: index.php");
    exit();

} elseif ($aksi == "hapus") {
    // Delete data based on the id
    $id = $_GET['id'];
    $db->delete($id);

    // Set a success message for deletion
    $_SESSION['message'] = "Data berhasil dihapus!";
    $_SESSION['message_type'] = "success";

    // Redirect to index.php after deletion
    header("Location: index.php");
    exit();
}
