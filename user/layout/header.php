<?php

if (isset($_POST['masuk'])) {
  masuk($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="/shoeswear/assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/aos.css">
  <link rel="stylesheet" href="/shoeswear/assets/css/style.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/shoeswear/assets/css/custom.css">
  <title><?= $judul ?></title>

</head>
<header class="site-navbar" role="banner">
  <div class="site-navbar-top">

    <?php if (isset($_SESSION['nama'])) :       require_once '../function/cart.php';
      $cartt = ambilCart()['carts'];?>
      
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="<?= url ?>user/produk.php/?cari=" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input name="cari" type="search" data-url="<?= $dataUrl ?>" class="form-control border-0" placeholder="Search">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="/shoeswear/user/index.php" class="js-logo-clone">ShoesWear</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                <li><a href="/shoeswear/user/profil.php"><span class="icon icon-person"></span></a></li>
                <!-- <li><a href="/shoeswear/user/whislist.php"><span class="icon icon-heart-o"></span></a></li> -->
                <li>
                  <a href="/shoeswear/user/cart.php" class="site-cart">
                    <span class="icon icon-shopping_cart"></span>
                    <span class="count" style="background-color: #dc3545;"><?=count($cartt)?></span>
                  </a>
                </li>
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    <?php else : ?>
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="<?= url ?>user/produk.php/?cari=" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input name="cari" type="search" data-url="<?= $dataUrl ?>" class="form-control border-0" placeholder="Search" name="cari">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="/shoeswear/user/index.php" class="js-logo-clone">ShoesWear</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                <li><a href="/shoeswear/user/masuk.php"><span class="icon icon-person"></span></a></li>
                <!-- <li><a href="/shoeswear/user/whislist.php"><span class="icon icon-heart-o"></span></a></li> -->
                <li>
                  <a href="/shoeswear/user/cart.php" class="site-cart">
                    <span class="icon icon-shopping_cart"></span>
                    <span class="count" style="background-color: #dc3545;">0</span>
                  </a>
                </li>
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['pesan'])) : ?>
      <div id="pesan" data-pesan="<?= $_SESSION['pesan'] ?>"></div>
      <?php unset($_SESSION['pesan']) ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['sukses'])) : ?>
      <div id="cart-sukses" data-sukses="<?= $_SESSION['sukses'] ?>"></div>
      <?php unset($_SESSION['sukses']) ?>
    <?php endif; ?>
  </div>
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
      <ul class="site-menu js-clone-nav d-none d-md-block">
        <li>
          <a href="/shoeswear/user/index.php"><i class></i>Home</a>
        </li>
        <li><a href="<?= url ?>user/produk.php/?cari=Adidas"><i class></i>Adidas</a></li>
        <li><a href="<?= url ?>user/produk.php/?cari=Nike"><i class></i>Nike</a></li>
        <li><a href="<?= url ?>user/produk.php/?cari=Puma"><i class></i>Puma</a></li>
      </ul>
    </div>
  </nav>
</header>

<body>