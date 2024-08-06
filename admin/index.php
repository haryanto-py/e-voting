<?php
// index.php
session_start();
// Fungsi untuk memeriksa apakah pengguna sudah login
function isUserLoggedIn() {
    // Sesuaikan dengan logika otentikasi Anda
    return isset($_SESSION['admin_id']);
}

// Memeriksa apakah pengguna sudah login sebelum menentukan halaman
if (!isUserLoggedIn()) {
    // Jika pengguna belum login, redirect ke halaman login atau tampilkan pesan
    header("Location: login.php");
    exit();
}

// Mendapatkan nilai dari query parameter 'page'
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Memuat file konten sesuai dengan nilai 'page'
switch ($page) {
    case 'dashboard':
        $content = './content/dashboard.php';
        break;
    case 'peserta':
        $content = './content/peserta.php';
        break;
    case 'calon':
        $content = './content/calon.php';
        break;
    case 'hasil':
        $content = './content/hasil.php';
        break;
    case 'logout':
        $content = '../services/action-logout.php';
        break;
    default:
        $content = './content/404.php'; // Halaman tidak ditemukan
        break;
}

// Memuat header
include('./sidePages/header.php');

// Memuat Navbar
include('./sidePages/navbar.php');

// Memuat konten
include($content);

// Memuat footer
include('./sidePages/footer.php');
?>