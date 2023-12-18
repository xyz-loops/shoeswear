<?php
$page = "None";
session_start();
require '../function/koneksi.php';
require '../function/auth.php';

$judul = 'Daftarkan akun anda dan bergabung dengan komunitas';

if (isset($_POST['daftar'])) {
    daftar($_POST);
}

require 'layout/header.php';
?>
<div class="site-wrap">
    < <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-4 fw-light fs-5">Looks like you’re new here.<p>We need some info.</p>
                        </h5>
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control" id="nama" required name="nama" placeholder="Ex: Mali M.">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control" id="Email" required name="email" placeholder="name@example.com">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" id="password1" required name="sandi1" placeholder="Password">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password" required name="sandi2" placeholder="Re-Password">
                            </div>
                            <div class="d-grid text-center pt-3">
                                <button name="daftar" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Register</button>
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include('layout/footer.php')
?>