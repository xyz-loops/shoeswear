<?php
require '../function/admin.php';
if (cekLoginAdmin() === false) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}

if (isset($_POST['hapus'])) {
    $id = $_GET['id'];
    hapusProduk($id);
}

//---- Variabel Hasil Kueri ----//
$judul = produk()['judul'];
$produk = produk()['produk'];

//---- Inisiasi data-url untuk pencarian ----//
$dataUrl = "produk";

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
                <?php if (isset($_GET['pesan'])) : ?>
                    <div id="sukses" class="<?= $_GET['pesan'] ?>"></div>
                <?php endif; ?>

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Produk</h1>
                </div>

                <!-- Tabel Produk -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?= url ?>admin/tambahProduk.php" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="produk table table-bordered" width="100%" cellspacing="0">
                                <?php if (isset($_GET['message'])) : ?>
                                    <div class="pesan" data-pesan="<?= $_GET['message'] ?>"></div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col" class="text-center px-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produk as $key => $value) : ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td>
                                                <img src="<?= url . 'assets/images/produk/' . $value->gambar ?>" style="width: 80px" alt="">
                                            </td>
                                            <td><?= $value->nama ?></td>
                                            <td>Rp<?= number_format($value->harga, 0) ?></td>
                                            <td><?= $value->kategori ?></td>
                                            <td class="text-center px-0 ">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="<?= url ?>admin/detailProduk.php/?id=<?= $value->id_produk ?>" class="btn btn-sm btn-info">Detail</a>
                                                    <form action="<?= url ?>admin/produk.php/?id=<?= $value->id_produk ?>" method="POST">
                                                        <button class="hapus btn btn-sm btn-danger ml-2" name="hapus">Hapus</button>
                                                    </form>
                                                </div>
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