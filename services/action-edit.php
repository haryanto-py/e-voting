<?php

include "koneksi.php";

if (isset($_GET['pese_id'])) {
    $pese_id = $_GET['pese_id'];
    $pese_nim = $_POST['editNIM'];
    $pese_nama = $_POST['editNama'];
    $pese_nomor = $_POST['editNomor'];
    $pese_email = $_POST['editEmail'];
    $sql = "UPDATE peserta SET pese_nim='$pese_nim', pese_nama='$pese_nama', pese_nomor='$pese_nomor', pese_email='$pese_email' WHERE pese_id=$pese_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin/index.php?page=peserta");
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $conn->error;
    }
} else if (isset($_GET['calo_id'])) {
    $calo_id = $_GET['calo_id'];
    $calo_nama = $_POST['editNama'];
    $calo_visi = $_POST['editVisi'];
    $calo_misi = $_POST['editMisi'];

    // Direktori tempat file akan disimpan
    $uploadDir = "../assets/img/";

    // Cek apakah file gambar diupload
    if ($_FILES['editImage']['error'] == 0) {
        // Mendapatkan ekstensi file
        $fileExtension = pathinfo($_FILES["editImage"]["name"], PATHINFO_EXTENSION);

        // Membuat nama file unik
        $fileName = $calo_id . "_" . time() . "." . $fileExtension;
        $uploadPath = $uploadDir . $fileName;

        // Pertama, dapatkan nama file gambar yang lama
        $query = "SELECT calo_gambar FROM calon WHERE calo_id=$calo_id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $oldFileName = $row['calo_gambar'];
            $oldFilePath = $uploadDir . $oldFileName;

            // Hapus file gambar yang lama jika ada
            if (file_exists($oldFilePath) && !is_dir($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Pindahkan file ke direktori yang dituju
        if(move_uploaded_file($_FILES["editImage"]["tmp_name"], $uploadPath)) {
            // File berhasil diupload, perbarui database dengan nama file baru
            $sql = "UPDATE calon SET calo_nama='$calo_nama', calo_visi='$calo_visi', calo_misi='$calo_misi', calo_gambar='$fileName' WHERE calo_id=$calo_id";
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
            exit;
        }
    } else {
        // File gambar tidak diupload, tidak perlu memperbarui kolom gambar
        $sql = "UPDATE calon SET calo_nama='$calo_nama', calo_visi='$calo_visi', calo_misi='$calo_misi' WHERE calo_id=$calo_id";
    }

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin/index.php?page=calon");
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $conn->error;
    }
}
$conn->close();
?>