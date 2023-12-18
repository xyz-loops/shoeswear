<?php
require '../function/admin.php';
if (cekLoginAdmin() === false) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}

$judul = pengguna()['judul'];
$pengguna = pengguna()['pengguna'];

if (isset($_GET['detail'])) {
    detailPengguna($_GET['id']);
}

if (isset($_POST['hapus'])) {
    hapusPengguna($_POST['iduser']);
}

//pencarian
$dataUrl = "pengguna";

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
                    <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
                </div>

                <!-- Tabel User -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?= url ?>admin/cetakPengguna.php" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Cetak Data Pengguna</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="pengguna table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%">#</th>
                                        <th scope="col" style="width: 5%">ID</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengguna as $key => $value) : ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $value->id_user ?></td>
                                            <td><?= $value->nama ?></td>
                                            <td><?= $value->email ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $value->id_user ?>">Detail</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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