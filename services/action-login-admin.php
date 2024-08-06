<?php
session_start();

include "koneksi.php";

// Tangkap data dari form login
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

// Query untuk mencari data user berdasarkan nim
$sql = "SELECT * FROM admin WHERE admin_user = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Verifikasi password
    if ($password === $row['admin_pass']) {
        // Jika password benar, simpan informasi user dalam sesi
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_user'] = $row['admin_user'];

        // Redirect ke halaman setelah login berhasil
        header("Location: ../admin/index.php");
    } else {
        // Jika password salah, kembalikan ke halaman login dengan pesan error
        header("Location: ../admin/login.php?error=Salah Password");
    }
} else {
    // Jika nim tidak ditemukan, kembalikan ke halaman login dengan pesan error
    header("Location: ../admin/login.php?error=Username tidak ditemukan");
}
$conn->close();
