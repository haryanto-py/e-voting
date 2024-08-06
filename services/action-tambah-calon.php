<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $calo_id = $_POST['addNoUrut'];
    $calo_nama = $_POST['addNama'];
    $calo_visi = $_POST['addVisi'];
    $calo_misi = $_POST['addMisi'];

    $uploadDir = "../assets/img/";

    $fileExtension = pathinfo($_FILES["addImage"]["name"], PATHINFO_EXTENSION);

    $fileName = $calo_id . "_" . time() . "." . $fileExtension;
    $uploadPath = $uploadDir . $fileName;

    $query_check_calo_id = "SELECT * FROM calon WHERE calo_id = '$calo_id'";
    $result_check_calo_id = $conn->query($query_check_calo_id);

    if ($result_check_calo_id->num_rows > 0) {
        header("Location: ../admin/index.php?page=calon&error=No. Urut sudah terdaftar");
        exit();
    }

    if(move_uploaded_file($_FILES["addImage"]["tmp_name"], $uploadPath)) {
        $query = "INSERT INTO calon (calo_id, calo_nama, calo_visi, calo_misi, calo_gambar) VALUES ('$calo_id', '$calo_nama', '$calo_visi', '$calo_misi', '$fileName')";
        
        $result = $conn->query($query);

        if ($result) {
            header("Location: ../admin/index.php?page=calon&status=success");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "File upload error.";
    }
}
$conn->close();
?>
