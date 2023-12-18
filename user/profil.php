<?php
require '../function/pengguna.php';
require '../function/transaksi.php';
$page = "None";

$profil = profil();
$judul = $profil['judul'];
$user = $profil['pengguna'];

require 'layout/header.php';
?>

<div class="site-wrap">
    < <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-12 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <ul class="list-group list-group-flush w-100 mx-auto">
                            <li class="list-group-item">
                                <h2 class="font-weight-bold text-center">Profil</h2>
                            </li>
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
                            <div class="d-grid text-center pt-3">
                                <a href="logout.php" class="btn btn-primary text-uppercase fw-bold">Logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php require 'layout/footer.php' ?>