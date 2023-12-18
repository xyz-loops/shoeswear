<?php
session_start();
$page = "Adidas";
require '../function/produk.php';
$judul = produk()['judul'];


//keranjang
if (isset($_POST['cart'])) {
  if (cekLogin() === true) {
    tambahCart($_POST);
  } else {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
  }
}

if (isset($_GET['kategori'])) {
  $produk =  kategoriProduk($_GET['kategori']);
} elseif (isset($_GET['cari'])) {
  $produk = cariProduk($_GET['cari']);
} else {
  $produk = produk()['produk'];
}

include('layout/header.php')
?>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-12 order-2">
        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="float-md-left mb-4">
              <h2 class="text-black h5">Shop All</h2>
            </div>
            <div class="d-flex">
              <div class="dropdown mr-1 ml-md-auto">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Latest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                  <a class="dropdown-item" href="<?= url ?>user/produk.php/?cari=Adidas">Adidas</a>
                  <a class="dropdown-item" href="<?= url ?>user/produk.php/?cari=Nike">Nike</a>
                  <a class="dropdown-item" href="<?= url ?>user/produk.php/?cari=Puma">Puma</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <?php foreach ($produk as $value) : ?>

            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="<?= url ?>user/detail.php/?id=<?= $value->id_produk ?>"><img src="<?= url ?>assets/images/produk/<?= $value->gambar ?>" alt="Image placeholder" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="<?= url ?>user/detail.php/?id=<?= $value->id_produk ?>"><?= $value->nama ?></a></h3>
                  <p class="text-primary font-weight-bold">Rp<?= number_format($value->harga, 0) ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('layout/footer.php')
?>
</div>