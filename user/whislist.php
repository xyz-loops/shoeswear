<?php
require '../function/pengguna.php';
require '../function/cart.php';
require '../function/transaksi.php';
$page = "None";
$cart = ambilCart()['carts'];
$profil = profil();
$judul = $profil['judul'];
$user = $profil['pengguna'];



require 'layout/header.php';
?>

<div class="site-wrap">

  <!-- Menampilkan Produk -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 mb-3 site-section-heading text-center pt-3">
        <h2>Wishlist Products</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Wishlist</strong></div>
    </div>
  </div>
  <div id="keranjang" aria-labelledby="tab-keranjang">
    <div id="keranjang" aria-labelledby="tab-keranjang">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="width: 10%">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col" style="width: 10%">Kuantiti</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Aksi </th>
          </tr>
        </thead>
        <tbody>

<?php
if (isset($_SESSION["wishlist"])) {


?>

          <?php foreach ($_SESSION["wishlist"] as $key => $value) : ?>
            <tr>
              <th scope="row"><?= $key + 1 ?></th>
              <td><img style="width: 100%" src="<?= url ?>assets/images/produk/<?= $value->gambar ?>" alt=""></td>
              <td><a href="<?= url ?>user/produk.php/?id=<?= $value->id_produk ?>"><?= $value->nama ?></a></td>
              <td>Rp<?= number_format($value->harga, 0) ?></td>
              <form action="" method="POST">
                <td>
                  <input class="form-control w-100" type="number" name="kuantiti" value="<?= $value->kuantiti ?>" disabled>
                </td>
                <td>Rp<?= number_format($value->total, 0) ?></td>
                <td>
                  <input type="hidden" name="idCart" value="<?= $value->id_cart ?>">
                  <input type="hidden" name="harga" value="<?= $value->harga ?>">
                  <button name="hapusCart" class="btn btn-sm btn-danger"><i class="icon icon-trash"></i></button>
                  <button name="ubahCart" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                </td>
              </form>
            </tr>
          <?php endforeach; ?>
          <?php   } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<?php
include('layout/footer.php')
?>