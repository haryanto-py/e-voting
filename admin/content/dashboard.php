<?php

include("../services/koneksi.php");
// Fungsi untuk mendapatkan data pemilih baru
function getPemilihBaru($conn, $limit = 3)
{
    $query = "SELECT peserta.pese_nim
              FROM peserta
              INNER JOIN peserta_pilih ON peserta.pese_nim = peserta_pilih.pepi_pese_nim
              ORDER BY peserta_pilih.pepi_id DESC
              LIMIT $limit";
    $result = $conn->query($query);
    $pemilihBaru = array();

    while ($row = $result->fetch_assoc()) {
        $pemilihBaru[] = $row;
    }

    return $pemilihBaru;
}
function getJumlahPeserta($conn)
{
    $query = "SELECT COUNT(*) as jumlah_peserta FROM peserta";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah_peserta'];
}

// Fungsi untuk mendapatkan jumlah calon
function getJumlahCalon($conn)
{
    $query = "SELECT COUNT(*) as jumlah_calon FROM calon";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah_calon'];
}

// Fungsi untuk mendapatkan jumlah suara masuk
function getJumlahSuaraMasuk($conn)
{
    $query = "SELECT COUNT(*) as jumlah_suara_masuk FROM peserta_pilih";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah_suara_masuk'];
}

// Fungsi untuk mendapatkan jumlah yang belum memilih
function getJumlahBelumMemilih($conn)
{
    $query = "SELECT COUNT(*) as jumlah_belum_memilih FROM peserta WHERE pese_nim NOT IN (SELECT pepi_pese_nim FROM peserta_pilih)";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah_belum_memilih'];
}

$pemilihBaru = getPemilihBaru($conn);
$jumlahPeserta = getJumlahPeserta($conn);
$jumlahCalon = getJumlahCalon($conn);
$jumlahSuaraMasuk = getJumlahSuaraMasuk($conn);
$jumlahBelumMemilih = getJumlahBelumMemilih($conn);

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Peserta - <big>
                            <?php echo $jumlahPeserta; ?>
                        </big></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?page=peserta">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Calon - <big>
                            <?php echo $jumlahCalon; ?>
                        </big></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?page=calon">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Suara Masuk - <big>
                            <?php echo $jumlahSuaraMasuk; ?>
                        </big></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?page=hasil">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Belum Memilih - <big>
                            <?php echo $jumlahBelumMemilih; ?>
                        </big></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?page=hasil">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Suara
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Suara Masuk
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Peserta</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemilihBaru as $pemilih): ?>
                                    <tr>
                                        <td>
                                            <?php echo $pemilih['pese_nim']; ?>
                                        </td>
                                        <td><button class="btn btn-success disabled">Telah Memilih</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
// Menutup koneksi database
$conn->close();
?>