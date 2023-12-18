<?php
session_start();
$page = "None";
require '../function/koneksi.php';
require '../function/auth.php';

$judul = 'Daftarkan akun anda dan bergabung dengan komunitas';

if (isset($_POST['login'])) {
  masuk($_POST);
}
include('layout/header.php')
?>

<div class="site-wrap">
  < <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Welcome to ShoesWear</h5>
            
            <form action="" method="POST">
              <div class="form-floating mb-3">
                <label for="Email">Email address</label>
                <input type="email" class="form-control" id="Email" required name="email" placeholder="name@example.com">
              </div>
              <div class="form-floating mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" required name="sandi" placeholder="Password">
              </div>
              <div class="d-grid text-center pt-3">
                <button name="login" class="btn btn-primary btn-login text-uppercase fw-bold">login</button>
              </div>
              <hr class="my-3">
              <div id="emailHelp" class="form-text text-center text-dark">Not
                Registered? <a href="register.php" class="text-dark fw-bold"> Create an
                  Account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include('layout/footer.php')
?>