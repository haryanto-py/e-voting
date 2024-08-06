<?php
include "../services/koneksi.php";
if (!isset($_GET['page'])) {
    // Jika pengguna belum login, redirect ke halaman login atau tampilkan pesan
    header("Location: ../login.php");
    exit();
}
?>
<?php
if (isset($_GET['error'])) {
    $errorMessage = htmlspecialchars($_GET['error']);
    echo "<script>alert('Error: $errorMessage');</script>";
}
?>

<div class="container-fluid mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10 p-3">
            <h1 class="text-left fw-bold">Daftar Peserta</h1>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body m-3">
                    <a type="button" href="../services/action-sendemail.php" class="btn btn-success"><i class="fa-solid fa-paper-plane me-2"></i>Send All Email</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#tambahModal"><i class="fa-solid fa-user-plus me-2"></i>Tambah</button>

                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addForm" method="POST" action="../services/action-tambah-peserta.php">
                                        <div class="mb-3">
                                            <label for="addNIM" class="form-label">NIM</label>
                                            <input type="number" class="form-control" id="addNIM" name="addNIM"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addNama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="addNama" name="addNama"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addNomor" class="form-label">Number</label>
                                            <input type="text" class="form-control" id="addNomor" name="addNomor"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addEmail" class="form-label">Email</label>
                                            <input type="mail" class="form-control" id="addEmail" name="addEmail"
                                                required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table mt-3">
                        <table class="table table-striped" id="datatablesSimple" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center" style="width: 450px;">Nama</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM peserta";
                                $result = mysqli_query($conn, $sql);

                                // Display data in table
                                if (mysqli_num_rows($result) > 0) {
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["pese_nama"]; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href='../services/action-sendemail.php?pese_id=<?php echo $row['pese_id']; ?>'
                                                    class='btn btn-success mx-1'><i class="fa-solid fa-paper-plane me-2"></i>Send</a>
                                                <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#editModal<?php echo $row['pese_id']; ?>"><i class="fa-solid fa-pencil me-2"></i>Edit</button>
                                                <a href='../services/action-delete.php?pese_id=<?php echo $row['pese_id']; ?>'
                                                    class='btn btn-danger mx-1'><i class="fa-solid fa-trash me-2"></i>Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No data found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
                                $sql1 = "SELECT * FROM peserta";
                                $result1 = mysqli_query($conn, $sql1);

                                // Display data in table
                                if (mysqli_num_rows($result1) > 0) {
                                    $no = 1;
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        ?>
                                        <div class="modal fade" id="editModal<?php echo $row1['pese_id']; ?>" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Peserta
                                                            <?php echo $row1['pese_nama']; ?>
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editForm" method="POST"
                                                            action="../services/action-edit.php?pese_id=<?php echo $row1['pese_id']; ?>">
                                                            <input type="hidden" id="pese_id" name="pese_id"
                                                                value="<?php echo $row1['pese_id']; ?>" required>
                                                            <div class="mb-3">
                                                                <label for="editNIM" class="form-label">NIM</label>
                                                                <input type="number" class="form-control" id="editNIM"
                                                                    name="editNIM" value="<?php echo $row1['pese_nim']; ?>"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editNama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="editNama"
                                                                    name="editNama" value="<?php echo $row1['pese_nama']; ?>"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editNomor" class="form-label">Number</label>
                                                                <input type="number" class="form-control" id="editNomor"
                                                                    name="editNomor" value="<?php echo $row1['pese_nomor']; ?>"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editEmail" class="form-label">Email</label>
                                                                <input type="mail" class="form-control" id="editEmail"
                                                                    name="editEmail" value="<?php echo $row1['pese_email']; ?>"
                                                                    required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                mysqli_close($conn);
                                ?>