<?php
require_once "header.php";
require_once "navbar.php";
?>

<body>
    <section id="landing-page" class="min-vh-100">
        <div class="main-hero">
            <div class="intro-text">
                <div class="container">
                    <div class="heading text-white" data-aos="fade-up">
                        <h1>E-Voting</h1>
                    </div>
                    <div class="excerpt text-center text-white" data-aos="fade-up" data-aos-delay="100">
                        <p>Selamat datang di E-Voting, platform pemilihan online yang cepat, aman, dan efisien!<br>Pilih kandidat pilihan Anda sekarang dan berkontribusi dalam membentuk masa depan. <br>Demokrasi lebih mudah dengan E-Voting – gunakan hak pilih Anda secara digital!</p>
                    </div>
                    <div class="align-items-center justify-content-center d-flex">
                        <button class="btn btn-outline-light btn-lg fw-bold mt-4" onclick="scrollToSection('pemilihan')" type="button">Vote Sekarang!</button>
                    </div>
                </div>
            </div>
            <div class="intro-image" data-aos="fade-up" data-aos-delay="50">
                <div class="section-counter count-numbers">
                    <div class="container">
                        <div class="py-5 mb-2 bg-light text-dark rounded-5">
                            <h2 class="text-center">Data Sementara</h2>
                            <div class="row">
                                <?php
                                //Hitung total suara
                                $sqlTotalSuara = "SELECT COUNT(*) as total_suara FROM peserta";
                                $resultTotalSuara = $conn->query($sqlTotalSuara);
                                $totalSuara = 0;
                                if ($resultTotalSuara) {
                                    $rowTotalSuara = $resultTotalSuara->fetch_assoc();
                                    $totalSuara = $rowTotalSuara['total_suara'];
                                }

                                //Hitung total pemilih
                                $sqlTotalPemilih = "SELECT COUNT(*) as total_pemilih FROM peserta_pilih";
                                $resultTotalPemilih = $conn->query($sqlTotalPemilih);
                                $totalPemilih = 0;
                                if ($resultTotalPemilih) {
                                    $rowTotalPemilih = $resultTotalPemilih->fetch_assoc();
                                    $totalPemilih = $rowTotalPemilih['total_pemilih'];
                                }

                                //Hitung persentase pemilih
                                $persentasePemilih = intval(($totalPemilih / $totalSuara) * 100);
                                ?>

                                <div class="col-lg-4 text-center">
                                    <span class="counter">
                                        <span class="counterpersen" data-target="<?php echo $persentasePemilih; ?>"><?php echo $persentasePemilih; ?></span>
                                    </span>
                                    <span class="d-block">Persentase Pemilih</span>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <span class="counter">
                                        <span class="counternormal" data-target="<?php echo $totalSuara; ?>"><?php echo $totalSuara; ?></span>
                                    </span>
                                    <span class="d-block">Total Pemilih</span>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <span class="counter">
                                        <span class="counternormal" data-target="<?php echo $totalPemilih; ?>"><?php echo $totalPemilih; ?></span>
                                    </span>
                                    <span class="d-block">Total Suara</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pemilihan" class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="justify-content-center text-center">
                <h2 class="mb-5">Pilih Calonmu!</h2>
            </div>
            <div class="row gutter-v1">
                <?php
                $sql = "SELECT * FROM calon;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-md-4 d-flex justify-content-center align-items-center my-4">
                            <div class="card h-100 d-flex flex-column justify-content-between">
                                <div class="image-container text-center">
                                    <img src="./assets/img/<?php echo $row['calo_gambar'] ?>" alt="Image" class="rounded-top img-fluid">
                                </div>
                                <div class="content text-container text-center mx-2">
                                    <h3><?php echo $row['calo_nama'] ?></h3>
                                    <p>Nomor Urut <?php echo $row['calo_id'] ?></p>
                                    <div class="more d-flex justify-content-center align-items-center">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['calo_id'] ?>">Visi & Misi</a>
                                        <a href="">|</a>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalpilih<?php echo $row['calo_id'] ?>">Pilih Calon</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Visi Misi -->
                        <div class="modal fade" id="staticBackdrop<?php echo $row['calo_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nomor Urut <?php echo $row['calo_id'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-4">
                                            <div class="text-start">
                                                <strong>Visi</strong>
                                            </div>
                                            <p class="text-justify">
                                                <?php echo $row['calo_visi'] ?>
                                            </p>
                                        </div>
                                        <div class="mt-4">
                                            <div class="text-start">
                                                <strong>Misi</strong>
                                            </div>
                                            <p class="text-justify">
                                                <?php echo $row['calo_misi'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Pilih -->
                        <div class="modal fade" id="modalpilih<?php echo $row['calo_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nomor Urut <?php echo $row['calo_id'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="./assets/img/<?php echo $row['calo_gambar'] ?>" class="img-fluid rounded-start" alt="...">
                                                </div>

                                                <div class="col-md-8 text-center d-flex justify-content-center align-items-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Apakah anda yakin dengan pilihan anda?</h5>
                                                        <form action="services/config.php" id="myForm" method="POST">
                                                            <input type="hidden" name="calon" value="<?php echo $row['calo_id'] ?>">
                                                            <div class="mt-3">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                                                                <button type="submit" class="btn btn-success" onclick="location.href='thankyou.php'">PILIH</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                <?php }
                } else {
                    echo "tidak ada calon!";
                } ?>
            </div>
        </div>
    </section>
    <?php require_once "footer.php"; ?>
</body>

</html>