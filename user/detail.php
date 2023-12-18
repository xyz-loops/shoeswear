<?php
session_start();
$page = "None";
require '../function/detail.php';
if (isset($_GET['id'])) {
  $produk = detail($_GET['id'])['produk'];
  $judul = detail($_GET['id'])['judul'];
}

if (isset($_POST['cart'])) {
  if (cekLogin() === true) {
    tambahCart($_POST);
  } else {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
  }
}

include('layout/header.php')
?>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?= url ?>assets/images/produk/<?= $produk->gambar ?>" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2 class="text-black"><?= $produk->nama ?></h2>
        <p><?= $produk->deskripsi ?></p>
        <p class="mb-4"><?= $produk->deskripsi ?></p>
        <p><strong class="text-primary h4">Rp<?= number_format($produk->harga) ?></strong></p>
        <!-- <form>
          <div class="form-row align-items-center">
            <div class="col-auto my-1">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Size</label>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </form> -->
        <form method="POST" action="">
          <input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
          <input type="hidden" name="nama" value="<?= $produk->nama ?>">
          <input type="hidden" name="harga" value="<?= $produk->harga ?>">
          <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" class="form-control text-center" name="kuantiti" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
              <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
          </div>
          <input type="hidden" name="gambar" value="<?= $produk->gambar ?>">
          <input type="hidden" name="kategori" value="<?= $produk->kategori ?>">
          <!-- <button name="cart" class="btn whishlist btn-sm btn-danger buy-now">Whishlist</button> -->
          <button name="cart" class="btn buy-now btn-sm btn-primary buy-now">Add To Cart</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
        <div class="icon mr-4 align-self-start">
          <span class="icon-truck"></span>
        </div>
        <div class="text">
          <h2 class="text-uppercase">Free Shipping</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
        <div class="icon mr-4 align-self-start">
          <span class="icon-refresh2"></span>
        </div>
        <div class="text">
          <h2 class="text-uppercase">Free Returns</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
        <div class="icon mr-4 align-self-start">
          <span class="icon-help"></span>
        </div>
        <div class="text">
          <h2 class="text-uppercase">Customer Support</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('layout/footer.php')
?>