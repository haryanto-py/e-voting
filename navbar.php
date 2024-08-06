<style>
    .navbar {
        position: fixed;
        width: 100%;
        z-index: 1000;
        /* Untuk memastikan navbar tetap di atas elemen lain */
    }

    .container-fluid {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        margin-right: auto;
        /* Menggeser elemen ke kiri */
    }

    .navbar-nav {
        margin-left: auto;
        /* Menggeser elemen ke kanan */
    }
</style>

<nav class="navbar bg-primary sticky-top navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse position-absolute top-50 start-50 translate-middle" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <?php
        $nim = $_SESSION['nim'];
        $sql = "SELECT pese_nama FROM peserta WHERE pese_nim = '$nim'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row['pese_nama'];
        }
        ?>
        <a class="navbar-brand font mx-2" href="#">
            Halo, <?php echo $nama; ?>
        </a>
        <a class="text-white mx-2" href="services/action-logout.php" role="button">Logout </a>

    </div>
</nav>