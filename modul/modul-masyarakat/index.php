<!DOCTYPE html>
<html lang="en">
<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
}
// CRUD
if (isset($_POST['edit'])) {
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $q = mysqli_query($con, "UPDATE `masyarakat` SET verifikasi = '$status' WHERE nik = '$nik'");
}

if (isset($_POST['hapus'])) {
    $nik = $_POST['nik'];
    $q = mysqli_query($con, "DELETE FROM `masyarakat` WHERE nik = '$nik'");
}
if (isset($_POST['update'])) {
    $nikLama = $_POST['nikLama'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $password = md5($_POST['password']);
    if ($password == '') {
        $q = mysqli_query($con, "UPDATE `masyarakat` SET nik = '$nik', nama = '$nama', username = '$username', telp = '$telp' WHERE nik = '$nikLama'");
    } else {
        $q = mysqli_query($con, "UPDATE `masyarakat` SET `password` = '$password', nik = '$nik', nama = '$nama', username = '$username', telp = '$telp' WHERE nik = '$nikLama'");
    }
}

?>
<?php include('../../assets/header.php') ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include('../../assets/sidebar.php') ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
              
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                    </div>
                    <div class="nav-item dropdown">
                      
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                           
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!--content-->
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Verifikasi Masyarakat</h6>
                    <div class="table-responsive">
                        <table class="table" id="dataTablesNya">
                            <thead>
                                <tr>
                                    <th scope="col" sttyle="text-align-center">No.</th>
                                    <th scope="col">Nik.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q = mysqli_query($con, "SELECT * FROM `masyarakat`");
                                $no = 1;
                                while ($d = mysqli_fetch_object($q)) { ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $d->nik ?>
                                        </td>
                                        <td>
                                            <?= $d->nama ?>
                                        </td>
                                        <td>
                                            <?= $d->username ?>
                                        </td>
                                        <td>
                                            <?= $d->telp ?>
                                        </td>
                                        <td>
                                            <?php if ($d->verifikasi == 0) {
                                                echo '<form action="" method="post"><input name="nik" type="hidden" value="' . $d->nik . '"><input name="status" type="hidden" value="1"><button name="edit" type="submit" class="btn btn-danger"><i class="fa fa-ban"></i></button></form>';
                                            } else {
                                                echo '<form action="" method="post"><input name="nik" type="hidden" value="' . $d->nik . '"><input name="status" type="hidden" value="0"><button name="edit" type="submit" class="btn btn-info"><i class="fa fa-check"></i></button></form>';
                                            } ?></td>
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modal-xl<?= $d->nik ?>" class="btn btn-link btn-success" data-original-title="Remove">
                                                <i class="fa fa-pen" style="color: white"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="" method="post"><input type="hidden" name="nik" value="<?= $d->nik ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                        </td>
                                    </tr>

                                    <!-- modal start -->
                                    <div class="modal fade" id="modal-xl<?= $d->nik ?>">
                                        <div class="modal-dialog modal-xl<?= $d->nik ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="post">
                                                    <input type="hidden" name="nikLama" value="<?= $d->nik ?>">
                                                    <div class="modal-body">
                                                        <div class="form-group"><label for="nik">Nik</label>
                                                            <input class="form-control" type="text" name="nik" value="<?= $d->nik ?>">
                                                        </div>
                                                        <div class="form-group"><label for="nama">Nama</label>
                                                            <input class="form-control" type="text" name="nama" value="<?= $d->nama ?>">
                                                        </div>
                                                        <div class="form-group"><label for="username">Username</label>
                                                            <input class="form-control" type="text" name="username" value="<?= $d->username ?>">
                                                        </div>
                                                        <div class="form-group"><label for="username">New Password</label>
                                                            <input class="form-control" type="password" name="password" value="">
                                                        </div>
                                                        <div class="form-group"><label for="username">Telepon</label>
                                                            <input class="form-control" type="number" name="telp" value="<?= $d->nik ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                    </div>
                                            </div>
                                            </form>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    <?php $no++;
                                }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <?php include('../../assets/footer.php') ?>

</body>

</html>