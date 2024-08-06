<?php
include("koneksi.php");

if (isset($_GET['pese_id'])) {
    $id = $_GET['pese_id'];
    $sql = "DELETE FROM peserta WHERE pese_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php?page=peserta");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else if (isset($_GET['calo_id'])) {
    $id = $_GET['calo_id'];

    // Dapatkan nama file gambar dari database
    $query = "SELECT calo_gambar FROM calon WHERE calo_id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $gambar = $row['calo_gambar'];
        $uploadDir = "../assets/img/";
        $filePath = $uploadDir . $gambar;

        // Hapus file gambar jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Setelah menghapus gambar, hapus data dari database
    $sql = "DELETE FROM calon WHERE calo_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php?page=calon");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
