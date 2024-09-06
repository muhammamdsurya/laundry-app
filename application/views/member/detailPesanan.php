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
                    <a href="<?= base_url('member/pesanan') ?>" class="nav_link active">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Pesanan Saya</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('member/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="card px-3 shadow-sm">
            <table class="table table-striped table-hover">
                <div class="table_header p-0 px-3 m-0 mb-4 mt-3">
                    <p>Rincian Pesanan</p>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">gambar</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($detail as $dt) { ?>
                        <tr>
                            <td class="align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><?= $dt->nama_paket ?></td>
                            <td class="align-middle">
                                <a href="<?= base_url('assets/gambar/' . $dt->gambar) ?>" target="_blank">
                                    <img src="<?= base_url('assets/gambar/' . $dt->gambar) ?>" class="img-bukti" alt="Gambar Bukti">
                                </a>
                            </td>
                            <td class="align-middle">Rp.<?=number_format($dt->HARGA, 0, ',', '.')?></td>
                            <td class="align-middle"><?= $dt->qty ?></td>
                            <td class="align-middle">
                                <?php
                                echo "Rp. " . number_format($dt->subtotal, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="mb-3">
                <a href="<?= base_url('member/pesanan') ?>" class="btn btn-back">Kembali</a>
            </div>
        </div>
    </div>
    <!--Container Main end-->