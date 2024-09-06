<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/style-login-member.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <title>Login | Laundry</title>
</head>

<body>
    <div class="container-view">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?= base_url('member/prosesLogin') ?>" method="POST" class="sign-in-form">
                    <h2 class="title">Log in</h2>
                    <?= $this->session->flashdata('pesan') ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="usernameLogin"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="passwordLogin"/>
                    </div>
                    <input type="submit" value="Login" class="btn-oke solid" />
                </form>
                <form action="<?= base_url('register') ?>" method="post" class="sign-up-form">
                    <h2 class="title">Daftar</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>"/>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>' ); ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>"/>
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>' ); ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>"/>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>' ); ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>"/>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>' ); ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" id="telp" name="notelp" placeholder="No Telp" value="<?= set_value('notelp'); ?>"/>
                        <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>' ); ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-map-marker"></i>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>"/>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>' ); ?>
                    </div>
                    <input type="submit" class="btn-oke" value="Daftar" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum Punya Akun ?</h3>
                    <p>
                        Daftar sekarang juga!
                    </p>
                    <button class="btn-oke transparent" id="sign-up-btn">
                        Daftar
                    </button>
                </div>
                <img src="<?= base_url('assets/') ?>img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah Punya Akun ?</h3>
                    <p>
                        Silahkan masuk untuk melakukan Pemesanan.
                    </p>
                    <button class="btn-oke transparent" id="sign-in-btn">
                        Masuk
                    </button>
                </div>
                <img src="<?= base_url('assets/') ?>img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container-view");

        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
    </script>
</body>

</html>