<?php
require '../function/admin.php';

if (cekLoginAdmin() != true) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}

$judul = home()['judul'];
$jmlPd = home()['jmlPd'];

$transaksi = home()['trans'];

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
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Jumlah Produk -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Produk</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlPd ?> Produk</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Terjual -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Terjual</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= home()['jual']->jual ?> Produk</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Pengguna -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Pengguna</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= home()['akun'] ?> Akun</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Transaksi -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary text-center">Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="transaksi table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID PESAN</th>
                                        <th scope="col">JUMLAH</th>
                                        <th scope="col">TOTAL HARGA</th>
                                        <th scope="col" class="text-center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $key => $value) : ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $value->id_pesan ?></td>
                                            <td><?= $value->kuantiti_total ?></td>
                                            <td>Rp<?= number_format($value->total_akhir, 0) ?></td>
                                            <td class="text-center">
                                                <?php if ($value->id_status == 0 && $value->pembayaran == 0) : ?>
                                                    <span class=" badge badge-warning">Menunggu pembayaran</span>
                                                <?php elseif ($value->id_status == 0 && $value->pembayaran == 1) : ?>
                                                    <span class=" badge badge-warning">Verifikasi pembayaran</span>
                                                <?php elseif ($value->id_status == 2) : ?>
                                                    <span class=" badge badge-primary"><?= $value->keterangan ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="text-decoration-none" href="<?= url ?>admin/transaksi.php"> Lihat lainnya &raquo;</a>
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