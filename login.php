
<?php
session_start();
if (isset($_SESSION['nim'])) {
    header("Location: index.php");
    exit;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <section class="d-flex justify-content-center align-items-center min-vh-100">
    <?php
    if (isset($_GET['error'])) {
        $errorMessage = htmlspecialchars($_GET['error']);
        echo "<script>alert('Error: $errorMessage');</script>";
    }
    ?>
        <div class="container custom-container text-center text-lg-start">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="assets/img/asset-login.png" alt="Your Image Alt Text" class="img-fluid rounded" style="width: auto; height: auto;">
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-light">
                            <div class="card-body py-5 px-md-5">
                                <div class="align-items-left">
                                    <h3 class="fw-bold ls-tight">
                                        Halo, <br />
                                        <span class="text-primary">Selamat Datang!</span>
                                    </h3>
                                </div>
                                <form action="services/action-login.php" method="POST">
                                    <!-- NIM input -->
                                    <div class="form-floating mt-4 mb-4">
                                        <input type="number" class="form-control" id="nim" placeholder="Enter NIM" name="nim" required>
                                        <label for="nim"> NIM</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                                        <label for="password"> Token </label>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-lg" type="submit" name="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofGJhYJRbM6Lc6U5BdQl5qN7U6P5tr5Y" crossorigin="anonymous"></script>
</body>

</html>