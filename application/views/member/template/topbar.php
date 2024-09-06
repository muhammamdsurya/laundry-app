<body id="body-pd" class="bg-light">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <header class="header position-relative bg-white shadow-sm" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="d-flex align-items-center">
            <div class="profile" onclick="menu()" style="cursor: pointer;">
                <span class="me-3"><?= $this->session->userdata('nama') ?></span>
                <img src="<?= base_url('assets/img/avatar.png') ?>" width="40px" height="40px">
            </div>
            <div class="menu shadow">
                <h3><?= $this->session->userdata('nama') ?><br><span><?= $this->session->userdata('username') ?></span></h3>
                <ul>
                    <li>
                        <ion-icon name="person-circle-outline"></ion-icon></i><a href="<?= base_url('member/ubahProfile') ?>">Ubah Profil</a>
                    </li>
                    <li><i class='bx bx-log-out nav_icon'></i><a href="<?= base_url('member/logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>