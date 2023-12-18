<?php
require '../function/admin.php';
if (cekLoginAdmin() === false) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:' . url . 'user/masuk.php');
}

if (isset($_POST['simpan'])) {
    tambahProduk($_POST);
}

$judul = 'Tambah Produk | Admin';
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
                    <div id="pesan" class="<?= $_GET['pesan'] ?>"></div>
                <?php endif; ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
                </div>

                <div class="card w-100 text-dark ">
                    <form class="mt-3 ml-3" method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group mx-2 col-sm-5 ">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" name="nama" id="nama" value="<?= (isset($_SESSION['nama'])) ? $_SESSION['nama'] :  "" ?>">
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                            <div class="form-group mx-2 col-sm-5 ">
                                <label for="harga">Harga</label>
                                <input class="form-control" type="number" name="harga" id="harga" value="<?= (isset($_SESSION['harga'])) ? $_SESSION['harga'] :  "" ?>">
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mx-2 col-sm-5 ">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option>--Pilih--</option>
                                    <option value="Adidas">Adidas</option>
                                    <option value="Nike">Nike</option>
                                    <option value="Puma">Puma</option>
                                </select>
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mx-2 col-sm-5 ">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" type="text" name="deskripsi" id="deskripsi"><?= (isset($_SESSION['deskripsi'])) ? $_SESSION['deskripsi'] :  "" ?></textarea>
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group mx-2 col-sm-3 ">
                                <label for="gambar">Gambar</label>
                                <input class="form-control" type="file" name="gambar" id="gambar">
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                            <div class="ol-4">

                            </div>
                        </div>
                        <div class=" text-center my-3">
                            <button type="submit" name="simpan" class="btn btn-sm btn-primary w-25" href="#" class="card-link">Simpan</button>
                            <button class="btn btn-sm btn-danger w-25" class="card-link" onclick="history.back()">Kembali</button>
                        </div>
                    </form>
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