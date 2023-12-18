<?php
session_start();
require '../function/bantuan.php';
require '../function/koneksi.php';

if (cekLoginAdmin() === false) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}

global $konek;

$result = mysqli_query($konek, "SELECT * FROM transaksi JOIN status ON status.id_status = transaksi.id_status WHERE transaksi.id_status = '3' ");
$trans = [];
while ($tran = mysqli_fetch_object($result)) {
    $trans[] = $tran;
}
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
                    <h1 class="h3 mb-0 text-gray-800 text-center">Transaksi Selesai</h1>
                </div>

                <!-- Tabel Transaksi -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th scope="col" style="width: 5%">#</th>
                                        <th scope="col">ID Pesan</th>
                                        <th scope="col">Pembeli</th>
                                        <th scope="col">Penerima</th>
                                        <th scope="col">Telp.</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kuantitas</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Kirim</th>
                                        <th scope="col">Terima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($trans as $key => $value) : ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $value->id_pesan ?></td>
                                            <td><?= $value->id_user ?></td>
                                            <td><?= $value->penerima ?></td>
                                            <td><?= $value->telepon ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td><?= $value->kuantiti_total ?></td>
                                            <td><?= $value->total_akhir ?></td>
                                            <td><?= $value->keterangan ?></td>
                                            <td><?= $value->pesan_at ?></td>
                                            <td><?= $value->kirim_at ?></td>
                                            <td><?= $value->terima_at ?></td>
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