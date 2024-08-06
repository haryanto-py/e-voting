<?php
session_start();

include "./koneksi.php";

// Tangkap data dari form login
$nim = addslashes($_POST['nim']);
$password = addslashes($_POST['password']);
if (is_numeric($nim)) {
    // Query untuk mencari data user berdasarkan nim
    $sql = "SELECT * FROM peserta_pilih WHERE pepi_pese_nim = '$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Query untuk mencari data user berdasarkan nim
        $sql = "SELECT * FROM peserta WHERE pese_nim = '$nim'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verifikasi password
            if ($password === $row['pese_token']) {
                // Jika password benar, simpan informasi user dalam sesi
                $_SESSION['pese_id'] = $row['pese_id'];
                $_SESSION['nim'] = $row['pese_nim'];

                // Redirect ke halaman setelah login berhasil
                header("Location: ../index.php");
            } else {
                // Jika password salah, kembalikan ke halaman login dengan pesan error
                header("Location: ../login.php?error=Token salah");
            }
        } else {
            // Jika nim tidak ditemukan, kembalikan ke halaman login dengan pesan error
            header("Location: ../login.php?error=NIM tidak ditemukan");
        }
    } else {
        // Jika nim tidak ditemukan, kembalikan ke halaman login dengan pesan error
        header("Location: ../login.php?error=NIM Sudah Memilih");
    }
    $conn->close();
} else {
    header("Location: ../index.php");
}
