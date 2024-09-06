<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
            </a>
            <div class="nav_list">
                <a href="<?= base_url('member/dashboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                <a href="<?= base_url('member/layanan') ?>" class="nav_link">
                    <ion-icon name="layers-outline"></ion-icon> <span class="nav_name">Layanan</span>
                </a>
                <a href="<?= base_url('member/pesanan') ?>" class="nav_link">
                    <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name active">Pesanan Saya</span>
                </a>
            </div>
        </div>
        <a href="<?= base_url('member/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
    </nav>
</div>
<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="row justify-content-center my-4">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-danger text-center">Silahkan Lakukan Pembayaran Sesuai Detail Berikut.</h5>
                    <br>
                    <h4 class="text-center">A00219301920139</h4>
                    <p class="text-center font-weight-bold mb-0">a/n Berkah Laundry</p>
                    <p class="text-center">BNI Syariah Kode Bank : 002</p>
                    <hr>
                    <?php if ($pembayaran->TOTAL === "Pengantaran") {
                        $total = $pembayaran->TOTAL + 10000 ?>
                        <h5 class="text-center">Total Yang Harus Dibayar</h5>
                        <h2 class="text-center">Rp. <?= number_format($total, 0, ',', '.') ?></h2>
                        <h6 class="text-danger text-center">*Harga termasuk biaya pengiriman</h6>
                    <?php } else { ?>
                        <h5 class="text-center">Total Yang Harus Dibayar</h5>
                        <h2 class="text-center">Rp. <?= number_format($pembayaran->TOTAL, 0, ',', '.') ?></h2>
                    <?php } ?>
                    <br>
                    <h5 class="text-center">Kode Pembayaran Anda</h5>
                    <h2 class="text-center"><?= $pembayaran->kode_invoice ?></h2>
                    <hr>
                    <form action="<?= base_url('member/pesanan/prosesPembayaran') ?>" method="post" enctype="multipart/form-data">
                        <label for="gambar">Bukti Transaksi</label>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="hidden" name="id" value="<?= $pembayaran->kode_invoice ?>">
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                            </div>
                            <div class="col-md-2 p-0">
                                <button class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <h4 class="text-center text-success">TERIMA KASIH</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Container Main end-->