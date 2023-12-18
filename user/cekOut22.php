<?php
require '../function/pengguna.php';
require '../function/cart.php';
require '../function/transaksi.php';

$judul = transaksi()['judul'];

$subtotal = ambilCart()['subtotal']->subtotal;
$kuantiti = ambilCart()['kuantiti']->kuantiti;
$carts = ambilCart()['carts'];

if (isset($_POST['submit'])) {
    tambahTransaksi($_POST);
}

require 'layout/header.php';
?>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/shoeswear/user/index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="/shoeswear/user/cart.php">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Your Order</h2>
            <div class="p-3 p-lg-5 border">
              <table class="table site-block-order-table mb-5">
                <thead>
                  <th>Product</th>
                  <th>Total</th>
                </thead>
                <tbody>
                  <?php foreach ($carts as $key => $value) : ?>
                    <tr>
                      <td><?= $value->nama ?><strong class="mx-2">x</strong><?= $kuantiti ?></td>
                      <td>Rp<?= number_format($value->harga, 0) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                  <td class="text-black font-weight-bold"><strong>Rp<?= number_format($subtotal, 0) ?></strong></td>
                </tfoot>
              </table>

              <div class="border p-3 mb-3">
                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                <div class="collapse" id="collapsebank">
                  <div class="py-2">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </div>

              <div class="border p-3 mb-3">
                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                <div class="collapse" id="collapsecheque">
                  <div class="py-2">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </div>

              <div class="border p-3 mb-5">
                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                <div class="collapse" id="collapsepaypal">
                  <div class="py-2">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black">Billing Details</h2>
        <div class="p-3 p-lg-5 border">
          <form action="" method="POST">
            <input type="hidden" name="kuantiti_total" value="<?= $kuantiti ?>">
            <input type="hidden" name="subtotal" value="<?= $subtotal ?>">
            <?php
            $i = 1;
            foreach ($carts as $value) : ?>
              <input type="hidden" name="kuantiti<?= $i++ ?>" value="<?= $value->kuantiti ?>">
            <?php endforeach; ?>
            <?php $i = 1;
            foreach ($carts as $value) : ?>
              <input type="hidden" name="id_produk<?= $i++ ?>" value="<?= $value->id_produk ?>">
            <?php endforeach; ?>

            <div class="row">
              <div class="col-md-6 form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" name="pengirim">
              </div>
              <div class="col-md-6 form-group">
                <label for="penerima">Penerima</label>
                <input type="text" class="form-control" id="penerima" name="penerima">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="telp">Telepon penerima</label>
                <input type="number" class="form-control" id="telp" name="telepon">
              </div>
              <div class="col-md-6 form-group">
                <label for="email">Email penerima</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('layout/footer.php')
?>