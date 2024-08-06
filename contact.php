<?php
require_once "header.php";
require_once "navbar.php";
?>

<body>
    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container custom-container text-center text-lg-start">
            <div class="container">
                <div class="row gx-lg-5 align-items-center justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="assets/img/email.png" class="img-fluid rounded" style="max-width: 70%;">
                    </div>
                    <div class="col-lg-6">
                        <div class="about-card bg-light">
                            <div class="card-body py-5 px-md-5">
                                <div class="align-items-left">
                                    <h3 class="fw-bold ls-tight text-primary text-center">
                                        Contact Us!
                                    </h3>
                                </div>
                                <form action="action/action-contact.php" method="POST">
                                    <!-- Name input -->
                                    <div class="form-floating mt-4 mb-4">
                                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
                                        <label for="name">Name</label>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
                                        <label for="email">Email</label>
                                    </div>

                                    <!-- Message input -->
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="message" placeholder="Enter Your Message" name="message" required style="height: 150px;"></textarea>
                                        <label for="message">Message</label>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once "footer.php"; ?>
</body>

</html>