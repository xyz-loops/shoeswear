<?php
require '../function/admin.php';

if (cekLoginAdmin() === false) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}
$profil = profil();
$judul = $profil['judul'];
$user = $profil['user'];

require 'layout/header.php';
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php require 'layout/sidebar.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require 'layout/topbar.php' ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-4 text-center">
                        
                    </div>
                    <div class="col-8">
                        <ul class="list-group list-group-flush w-50">
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Nama</h6><?= $user->nama ?>
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Email</h6><?= $user->email ?>
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Terakhir masuk</h6><?= date("h:i:s d-m-20y", strtotime($_SESSION['tglMasuk'])); ?>
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Daftar pada</h6><?= date("h:i:s d-m-20y", strtotime($user->createat)); ?>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require 'layout/footer.php'; ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->