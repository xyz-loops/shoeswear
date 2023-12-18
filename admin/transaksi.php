<?php
require '../function/admin.php';
if (cekLoginAdmin() === false) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}

$judul = ambilTransaksi()['judul'];
$transaksi = ambilTransaksi()['trans'];

if (isset($_POST['verifi'])) {
    verifiTransaksi($_POST);
}
if (isset($_POST['kirim'])) {
    kirimTransaksi($_POST);
}

//pencarian
$dataUrl = "transaksi";

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
                    <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                    <a href="<?= url ?>admin/cetakTransaksi.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Transaksi</a>
                </div>

                <!-- Tabel Transaksi -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <a href="<?= url ?>admin/transaksiselesai.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" id="btn-transaksi" style="cursor: pointer"><i class="fas fa-check-square text-white-50"></i> Transaksi Selesai</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="transaksi table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID PESAN</th>
                                        <th scope="col">PENERIMA</th>
                                        <th scope="col">PENGIRIM</th>
                                        <th scope="col">JUMLAH</th>
                                        <th scope="col">TOTAL HARGA</th>
                                        <th scope="col" class="text-center">STATUS</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $key => $value) : ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $value->id_pesan ?></td>
                                            <td><?= $value->penerima ?></td>
                                            <td><?= $value->pengirim ?></td>
                                            <td><?= $value->kuantiti_total ?></td>
                                            <td>Rp<?= number_format($value->total_akhir, 0) ?></td>
                                            <td class="text-center">
                                                <?php if ($value->id_status == 0 && $value->pembayaran == 0) : ?>
                                                    <span class=" badge badge-warning">Menungggu pembayaran</span>
                                                <?php elseif ($value->id_status == 0 && $value->pembayaran == 1) : ?>
                                                    <span class=" badge badge-warning">Verifikasi pembayaran</span>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#cek-bayar<?= $value->id_pesan ?>">
                                                        Cek
                                                    </button>
                                                <?php elseif ($value->id_status == 1 && $value->pembayaran == 1) : ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="idpesan" value="<?= $value->id_pesan ?>">
                                                        <button name="kirim" class="btn btn-sm btn-primary">
                                                            Kirim
                                                        </button>
                                                    </form>
                                                <?php elseif ($value->id_status == 2) : ?>
                                                    <span class=" badge badge-primary"><?= $value->keterangan ?></span>
                                                <?php elseif ($value->id_status == 3) : ?>
                                                    <span class="badge badge-success"><?= $value->keterangan ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $value->id_pesan ?>">Detail</button>
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