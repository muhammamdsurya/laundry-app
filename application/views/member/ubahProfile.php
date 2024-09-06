<div class="l-navbar" id="nav-bar">
    <div class="gagal" data-gagal="<?= $this->session->flashdata('message') ?>"></div>
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
                    <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Pesanan Saya</span>
                </a>
            </div>
        </div>
        <a href="<?= base_url('member/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
    </nav>
</div>
<!--Container Main start-->
<div class="height-100 bg-light">
    <div class="row px-2">
        <div class="col-md-6">
            <h4>Ubah Profile</h4>
            <p class="text-secondary">Perbarui informasi & alamat anda</p>
        </div>
        <div class="col-md-6 card shadow-sm p-3">
            <form action="<?= base_url('admin/ubahProfile/ubah') ?>" method="post">
                <div class="form-group mb-2">
                    <label for="nama" class="mb-1">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $profile->nama ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="mb-1">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $profile->username ?>" disabled readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" class="form-control" name="email" id="emai" value="<?= $profile->username ?>" disabled readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="telp" class="mb-1">No Telepon</label>
                    <input type="number" class="form-control" name="telp" id="telp" value="<?= $profile->telp ?>">
                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="alamat" class="mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"><?= $profile->alamat ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group mt-3 float-end">
                    <button type="submit" class="btn btn-sm btn-edit">Ubah Profile</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row px-2 mb-3">
        <div class="col-md-6">
            <h4>Ubah Password</h4>
            <p class="text-secondary">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.</p>
        </div>
        <div class="col-md-6 card shadow-sm p-3">
            <form action="<?= base_url('admin/rofile/ubahPassword') ?>" method="post">
                <div class="form-group mb-2">
                    <label for="passwordlama" class="mb-1">Password lama</label>
                    <input type="password" class="form-control" name="passwordlama" id="passwordlama" placeholder="Masukkan Password Lama">
                    <?= form_error('passwordlama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="password" class="mb-1">Password Baru</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="password2" class="mb-1">Ulangi Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi Password">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group mt-3 float-end">
                    <button type="submit" class="btn btn-sm btn-edit">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Container Main end-->