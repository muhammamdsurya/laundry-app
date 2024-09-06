<div class="l-navbar" id="nav-bar">
<div class="berhasil" data-berhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
            </a>
            <div class="nav_list">
                <a href="<?= base_url('member/dashboard') ?>" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                <a href="<?= base_url('member/layanan') ?>" class="nav_link">
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
    <div class="card px-3 shadow-sm justify-content-center align-items-center text-pink1" style="height: 83vh!important; cursor: default;">
        <h2 class="fw-bold">Selamat Datang Di Berkah Laundry</h2>
    </div>
</div>
<!--Container Main end-->