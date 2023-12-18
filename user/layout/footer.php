   <!-- Footer Web -->
   <footer class="site-footer border-top">
     <div class="container">
       <div class="row pt-5 text-center">
         <div class="col-md-12">
           <p>
             Copyright &copy;<script data-cfasync="false"></script>
             <script>
               document.write(new Date().getFullYear());
             </script> All rights reserved</a>
           </p>
         </div>
       </div>
     </div>
   </footer>
   <!-- Modal Pembayaran -->

   <?php if (isset($transaksi)) : ?>
     <?php foreach ($transaksi as $key => $trans) : ?>
       <div class="modal fade" id="bayar<?= $trans->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5>ID Pesan : <?= $trans->id_pesan ?> | Penerima : <?= $trans->penerima ?> </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <form method="POST" action="" enctype="multipart/form-data">
               <div class="modal-body">
                 <input type="hidden" name="idpesan" value="<?= $trans->id_pesan ?>">
                 <div class="form-group">
                   <label for="nama">Nama</label>
                   <input class="form-control" type="text" name="nama" id="nama">
                 </div>
                 <div class="form-group">
                   <label for="nominal">Nominal</label>
                   <input class="form-control" type="number" name="nominal" id="nominal">
                 </div>
                 <div class="form-group">
                   <label for="gambar">Unggah bukti pembayaran</label>
                   <input class="form-control" type="file" name="gambar" id="gambar">
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                 <button type="submit" name="kirim" class="btn btn-sm btn-primary">Kirim</button>
               </div>
             </form>
           </div>
         </div>
       </div>



       <!-- Modal Detail -->
       <div class="modal fade" id="detail<?= $trans->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true exampleModalCenterTitle">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content ">
             <div class="modal-header">
               <h5>ID Pesan : <?= $trans->id_pesan ?> | Penerima : <?= $trans->penerima ?> </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <table class="table table-borderless">
                 <thead>
                   <tr>
                     <th scope="col">#</th>
                     <th scope="col" style="width: 10%">Gambar</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Kuantiti</th>
                     <th scope="col">Total</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $id = $trans->id_pesan;
                    $trDetail = transaksiDetail($id)['detail'];

                    foreach ($trDetail as $key => $detail) : ?>
                     <tr class="border-bottom">
                       <th scope="row"><?= $key + 1 ?></th>
                       <td><img src="<?= url ?>assets/images/produk/<?= $detail->gambar ?>" class="w-100" alt=""></td>
                       <td><?= $detail->nama ?></td>
                       <td><?= $detail->kuantiti ?></td>
                       <td>Rp<?= number_format($detail->total, 0) ?></td>
                     </tr>
                   <?php endforeach; ?>
                 </tbody>
                 <tfoot>
                   <tr>
                     <td class="text-uppercase">Status : <?= $trans->keterangan ?></td>
                   </tr>
                 </tfoot>
               </table>
             </div>
           </div>
         </div>
       </div>
     <?php endforeach; ?>
   <?php endif; ?>
   <script src="/shoeswear/assets/js/jquery-3.3.1.min.js"></script>
   <script src="/shoeswear/assets/js/jquery-ui.js"></script>
   <script src="/shoeswear/assets/js/popper.min.js"></script>
   <script src="/shoeswear/assets/js/bootstrap.min.js"></script>
   <script src="/shoeswear/assets/js/owl.carousel.min.js"></script>
   <script src="/shoeswear/assets/js/jquery.magnific-popup.min.js"></script>
   <script src="/shoeswear/assets/js/aos.js"></script>

   <script src="/shoeswear/assets/js/main.js"></script>

   </body>

   </html>