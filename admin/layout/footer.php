<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= url ?>user/masuk.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal detail Pengguna -->
<?php if (isset($pengguna)) : ?>
    <?php foreach ($pengguna as $key => $value) : ?>
        <div class="modal fade" id="detail<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5>ID User : <?= $value->id_user ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                Detail Pengguna
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Nama</h5>
                                    <?= $value->nama ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Email</h5><?= $value->email ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Kata Sandi</h5><?= $value->sandi ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Bergabung pada</h5><?= $value->createat ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Di ubah</h5><?= $value->updateat ?>
                                </li>
                                <li class="list-group-item">
                                    <form action="" method="post">
                                        <input type="hidden" name="iduser" value="<?= $value->id_user ?>">
                                        <button type="submit" name="hapus" class="btn btn-sm btn-primary">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Cek Pembayaran -->
<?php if (isset($transaksi)) : ?>
    <?php foreach ($transaksi as $key => $value) : ?>
        <div class="modal fade" id="cek-bayar<?= $value->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>ID Pesan : <?= $value->id_pesan ?> | Penerima : <?= $value->penerima ?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                    $cek = cekBayar($value->id_pesan);
                    ?>

                    <form method="POST" action="">
                        <div class="modal-body">
                            <input type="hidden" name="idpesan" value="<?= $value->id_pesan ?>">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" name="nama" value="<?= $cek->nama ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input class="form-control" type="text" value="Rp<?= number_format($cek->nominal, 0) ?>" readonly>
                            </div>
                            <div class="form-group text-center">
                                <img src="<?= url ?>assets/images/bayar/<?= $cek->gambar ?>" class="  w-50" alt="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="verifi" class="btn btn-sm btn-primary">Verifikasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="detail<?= $value->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5>ID Pesan : <?= $value->id_pesan ?> | Penerima : <?= $value->penerima ?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="width: 10%">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kuantiti</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $value->id_pesan;
                                $trDetail = transaksiDetail($id)['detail'];

                                foreach ($trDetail as $key => $detail) : ?>
                                    <tr class="border-bottom">
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><img src="<?= url ?>assets/images/produk/<?= $detail->gambar ?>" class="w-100" alt=""></td>
                                        <td><?= $detail->nama ?></td>
                                        <td><?= $detail->kuantiti ?></td>
                                        <td>Rp<?= number_format($detail->total, 0) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-uppercase">Status : <?= $value->keterangan ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Modal detail Pengguna -->
<?php if (isset($pengguna)) : ?>
    <?php foreach ($pengguna as $key => $value) : ?>
        <div class="modal fade" id="detail<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5>ID User : <?= $value->id_user ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= url ?>assets/images/user/<?= $value->image ?>" alt="">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Nama</h5>
                                    <?= $value->nama ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Email</h5><?= $value->email ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Kata Sandi</h5><?= $value->sandi ?>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="font-weight-bold">Bergabung pada</h5><?= $value->createat ?>
                                </li>
                                <li class="list-group-item">
                                    <form action="" method="post">
                                        <input type="hidden" name="iduser" value="<?= $value->id_user ?>">
                                        <button type="submit" name="hapus" class="btn btn-sm btn-primary">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>]
    <?php endforeach; ?>
<?php endif; ?>

<!-- Bootstrap core JavaScript-->
<script src="/shoeswear/assets/vendor/jquery/jquery.min.js"></script>
<script src="/shoeswear/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/shoeswear/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="/shoeswear/assets/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="/shoeswear/assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="/shoeswear/assets/js/demo/chart-area-demo.js"></script>
<script src="/shoeswear/assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>