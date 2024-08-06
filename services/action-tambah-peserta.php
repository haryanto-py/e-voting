<?php
include("koneksi.php");

$n = 10;
function getToken($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pese_nim = $_POST['addNIM'];
    $pese_nama = $_POST['addNama'];
    $pese_nomor = $_POST['addNomor'];
    $pese_email = $_POST['addEmail'];
    $pese_token = getToken($n);

    $query_check_nim = "SELECT * FROM peserta WHERE pese_nim = '$pese_nim'";
    $result_check_nim = $conn->query($query_check_nim);

    if ($result_check_nim->num_rows > 0) {
        // Jika NIM sudah ada, berikan pesan error atau arahkan kembali ke halaman sebelumnya
        header("Location: ../admin/index.php?page=peserta&error=NIM sudah terdaftar");
        exit();
    } else {
        $query = "INSERT INTO peserta (pese_nim, pese_nama, pese_nomor, pese_email, pese_token) VALUES ('$pese_nim', '$pese_nama', '$pese_nomor', '$pese_email', '$pese_token')";
        $result = $conn->query($query);
    
        if ($result) {
            header("Location: ../admin/index.php?page=peserta&status=success");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
