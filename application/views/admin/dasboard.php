    <div class="l-navbar" id="nav-bar">
        <div class="berhasil" data-berhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
                </a>
                <div class="nav_list">
                    <a href="<?= base_url('admin/dasboard') ?>" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('admin/user') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
                    <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
                    <a href="<?= base_url('admin/paket') ?>" class="nav_link">
                        <ion-icon name="briefcase-outline" class="nav_icon"></ion-icon><span class="nav_name">Paket</span>
                    </a>
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav_link">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Transaksi</span>
                    </a>
                    <a href="<?= base_url('admin/laporan') ?>" class="nav_link">
                        <ion-icon name="reader-outline"></ion-icon> <span class="nav_name">Laporan</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $paket ?></div>
                            <div class="cardName text-secondary">Paket</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="file-tray-full-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $admin ?></div>
                            <div class="cardName text-secondary">Admin</div>
                        </div>
                        <div class="iconBox ">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $member ?></div>
                            <div class="cardName text-secondary">Member</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $order ?></div>
                            <div class="cardName text-secondary">Pesanan</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number">
                                <?php
                                if ($dayTotal->TOTAL == null) {
                                    $totalDay = 0;
                                } else {
                                    $totalDay = $dayTotal->TOTAL;
                                }
                                echo "Rp. " . number_format($totalDay, 0, ',', '.')
                                ?>
                            </div>
                            <div class="cardName text-secondary">Penghasilan Hari ini</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="card"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= "Rp. " . number_format($total->TOTAL, 0, ',', '.') ?></div>
                            <div class="cardName text-secondary">Total Penghasilan</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="card"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->