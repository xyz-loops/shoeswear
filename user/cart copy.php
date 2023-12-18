<?php
require '../function/pengguna.php';
require '../function/cart.php';
require '../function/transaksi.php';
$page = "None";

if (!isset($_SESSION["iduser"])) {
  header('location:masuk.php');
  exit;
}

$profil = profil();
$judul = $profil['judul'];
$user = $profil['pengguna'];

$cart = ambilCart()['carts'];
$subtotal = ambilCart()['subtotal']->subtotal;
if (isset($_POST['ubahCart'])) {
  ubahCart($_POST);
} else if (isset($_POST['hapusCart'])) {
  hapusCart($_POST);
} else if (isset($_POST['bersihkanCart'])) {
  bersihkanCart($_POST);
}

$transaksi = ambilTransaksi()['trans'];
if (isset($_POST['kirim'])) {
  bayar($_POST);
}

if (isset($_POST['terima'])) {
  terimaTransaksi($_POST);
}

require 'layout/header.php';

?>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="col-md-12">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="tab-keranjang" data-toggle="pill" href="#keranjang" role="tab" aria-selected="false">Keranjang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tab-transaksi" data-toggle="pill" href="#transaksi" role="tab" aria-selected="false">Transaksi</a>
        </li>
      </ul>
    </div>
    <div class="row mb-5">
      <div class="site-blocks-table tab-content" id="pills-tabContent">
        <div id="keranjang" class="tab-pane fade show active" id="keranjang" role="tabpanel" aria-labelledby="tab-keranjang">
          <table class="table table-bordered">
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
              <?php foreach ($cart as $key => $value) : ?>
                <tr>
                  <th scope="row"><?= $key + 1 ?></th>
                  <td><img style="width: 100%" src="<?= url ?>assets/images/produk/<?= $value->gambar ?>" alt=""></td>
                  <td><a href="<?= url ?>user/produk.php/?id=<?= $value->id_produk ?>"><?= $value->nama ?></a></td>
                  <td>Rp<?= number_format($value->harga, 0) ?></td>
                  <form action="" method="POST">
                    <td>
                      <input class="form-control w-100 text-center" type="number" name="kuantiti" value="<?= $value->kuantiti ?>" disabled>
                    </td>
                    <td>Rp<?= number_format($value->total, 0) ?></td>
                    <td>
                      <input type="hidden" name="idCart" value="<?= $value->id_cart ?>">
                      <input type="hidden" name="harga" value="<?= $value->harga ?>">
                      <button name="hapusCart" class="btn btn-sm btn-danger"><i class="icon icon-trash"></i></button>
                      <!-- <button name="ubahCart" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button> -->
                    </td>
                  </form>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="col-md-12 pl-3">
            <div class="row justify-content-end">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5 mt-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Rp<?= number_format($subtotal, 0) ?> </strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <!-- <form action="" method="POST">
                  <td><button name="bersihkanCart" class="btn btn-sm btn-success">Bersihkan isi keranjang</button></td>
                </form> -->
                    <a class="btn btn-sm btn-success" href="<?= url ?>user/cekOut.php">Checkout</a></td>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="transaksi" role="tabpanel" aria-labelledby="tab-transaksi">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID PESAN</th>
                <th scope="col">PENERIMA</th>
                <th scope="col">PENGIRIM</th>
                <th scope="col">JUMLAH</th>
                <th scope="col">TOTAL HARGA</th>
                <th scope="col" class="text-center">STATUS</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transaksi as $key => $trans) : ?>
                <tr>
                  <th scope="row"><?= $key + 1 ?></th>
                  <td><?= $trans->id_pesan ?></td>
                  <td><?= $trans->penerima ?></td>
                  <td><?= $trans->pengirim ?></td>
                  <td><?= $trans->kuantiti_total ?></td>
                  <td>Rp<?= number_format($trans->total_akhir, 0) ?></td>
                  <td class="text-center">
                    <?php if ($trans->id_status == 0 && $trans->pembayaran == 0) : ?>
                      <span class=" badge badge-warning">Anda belum melakukan pembayaran</span>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#bayar<?= $trans->id_pesan ?>">
                        Bayar
                      </button>
                    <?php elseif ($trans->id_status == 0 && $trans->pembayaran == 1) : ?>
                      <span class=" badge badge-warning">Menunggu verifikasi</span>
                    <?php elseif ($trans->id_status == 1) : ?>
                      <span class="badge badge-secondary"><?= $trans->keterangan ?></span>
                    <?php elseif ($trans->id_status == 2) : ?>
                      <span class="badge badge-primary"><?= $trans->keterangan ?></span>
                      <form action="" method="POST">
                        <input type="hidden" name="idpesan" value="<?= $trans->id_pesan ?>">
                        <button name="terima" class="mt-1 btn btn-sm btn-primary">Terima</button>
                      </form>
                    <?php elseif ($trans->id_status == 3) : ?>
                      <span class="badge badge-success"><?= $trans->keterangan ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $trans->id_pesan ?>">Detail</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('layout/footer.php')
?>