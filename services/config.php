<?php
session_start();

include 'koneksi.php';

// Tangkap data dari form tambah.php
$calon = addslashes($_POST['calon']);
$nim = addslashes($_SESSION['nim']);

// Tangkap juga data-data lainnya
if (is_numeric($calon) && is_numeric($nim)) {
    // Query untuk mencari data user berdasarkan nim
    $sql = "SELECT * FROM peserta_pilih WHERE pepi_pese_nim = '$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {

        // Verifikasi nim sudah masuk atau belum
        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO `peserta_pilih`(`pepi_pese_nim`, `pepi_calo_id`)
                VALUES ('$nim', '$calon')";

        if ($conn->query($sql) === TRUE) {
            // Hapus semua data sesi
            session_unset();

            // Hancurkan sesi
            session_destroy();
            header("Location: ../thankyou.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Jika nim tidak ditemukan, kembalikan ke halaman login dengan pesan error
        header("Location: action-logout.php");
    }
    $conn->close();
} else {
    header("Location: ../index.php");
}
