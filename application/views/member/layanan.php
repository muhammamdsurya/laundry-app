<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
                </a>
                <div class="nav_list">
                    <a href="<?= base_url('member/dashboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('member/layanan') ?>" class="nav_link active">
                        <ion-icon name="layers-outline"></ion-icon> <span class="nav_name">Layanan</span>
                    </a>
                    <a href="<?= base_url('member/pesanan') ?>" class="nav_link">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Pesanan Saya</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('member/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <?php foreach ($layanan as $ly) { ?>
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body p-0 d-flex justify-content-center flex-column align-items-center">
                                    <img src="<?= base_url('assets/gambar/' . $ly->gambar) ?>" height="150px" class="format-img">
                                    <p class="format-nama"><?= $ly->nama_paket ?></p>
                                    <p class=" harga">Rp. <span class="format-harga"><?= number_format($ly->harga, 0, ',', '.') ?></span></p>
                                    <?= anchor('member/layanan/tambahKeranjang/' . $ly->id_paket, '<div class="btn btn-edit mb-3">Masukkan Keranjang</div>') ?>
                                    <!-- <button type="button" class="tambah btn-keranjang" style="border: none!important;" data-action="add-to-cart">Masukkan Keranjang</button> -->
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card px-3">
                    <h4 class="badge-pill badge-light mt-3 mb-3 p-2 text-center">Keranjang</h4>
                    <div class="cart">
                        <?php foreach ($this->cart->contents() as $items) { ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="<?= base_url('assets/gambar/' . $items['image']) ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                            </div>
                                            <div class="ms-3 d-flex align-items-center">
                                                <h5 class="mb-0"><?= $items['name'] ?></h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div style="width: 150px;">
                                                <h5 class="fw-normal mb-0"><?= $items['qty'] ?> <?= ($items['name'] == 'Cuci Satuan') ? 'pcs' : 'Kg'; ?>
												</h5>
                                            </div>
                                            <div style="width: 120px;">
                                                <h5 class="mb-0">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></h5>
                                            </div>
                                            <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between px-5 bg-pink">
                                <h5 class="pb-0">Total </h5>
                                <h5 class="pb-0">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!$this->cart->total_items() == 0) {
                        echo "<div class='p-2 mb-3'>
                                <a class='btn btn-back' href='layanan/hapusKeranjang'>Hapus Keranjang</a>
                                <a class='btn btn-edit' href='layanan/checkout'>Checkout</a>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
