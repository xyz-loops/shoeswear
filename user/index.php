<?php
require '../function/home.php';
$page = "Home";
$judul = home()['judul'];
$judul = home()['judul'];
$produk = home()['produk'];

//keranjang
if (isset($_POST['cart'])) {
  if (cekLogin() === true) {
    tambahCart($_POST);
  } else {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
  }
}
include('layout/header.php');
?>
<div class="site-wrap">
  <div class="site-blocks-cover" style="background-image: url(../assets/images/bg-index.png);" data-aos="fade">
    <div class="container">
      <!-- Membuat banner -->
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2 text-white">Finding Your Perfect Shoes</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4 text-white">Find your shoes, style it and go wear it,
              Wear your shoes shiny and trending,
              Don’t take a fake shoes as your perfect shoes</p>
            <p>
              <a href="/shoeswear/user/produk.php" class="btn btn-sm btn-danger mb-3">Shop Now</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm site-blocks-1">
    <div class="container">
      <div class="row">
        <!-- Keunggulan website -->
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

  <!-- Menampilkan Produk -->
  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 mb-3 site-section-heading text-center pt-3">
          <h2>Featured Products</h2>
        </div>
        <div class="row">
          <?php foreach ($produk as $value) : ?>
            <div class="col-lg-4 col-md-6 item-entry mb-4">
              <div class="block-4 text-center">
                <a href="<?= url ?>user/detail.php/?id=<?= $value->id_produk ?>" class="product-item md-height bg-gray d-block">
                  <img src="<?= url ?>assets/images/produk/<?= $value->gambar ?>" alt="Image" class="img-fluid" style="max-height: 200px;">                
                </a>
                <div class="block-4-text p-4">
                  <h3 class="item-title">
                    <a href="<?= url ?>user/detail.php/?id=<?= $value->id_produk ?>"><?= $value->nama ?></a>
                  </h3>
                  <p class="text-primary font-weight-bold">Rp<?= number_format($value->harga, 0) ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  include('layout/footer.php')
  ?>
</div>