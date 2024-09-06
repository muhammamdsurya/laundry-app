    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
                </a>
                <div class="nav_list">
                    <a href="<?= base_url('admin/dasboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('admin/user') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
                    <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
                    <a href="<?= base_url('admin/paket') ?>" class="nav_link active">
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
    <div class="height-100 bg-light mb-4">
        <div class="card px-3 shadow-sm">
            <table class="table table-striped table-hover">
                <div class="table_header">
                    <p>Pengaturan Paket</p>
                    <div class="">
                        <button class="add_new" id="myBtn" data-bs-toggle="modal" data-bs-target="#ModalTambah">+ Tambah Data</button>
                    </div>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paket as $pt) { ?>
                        <tr>
                            <td class="align-middle"><?= ++$start ?></td>
                            <td class="align-middle"><?= $pt['nama_paket'] ?></td>
                            <td class="align-middle"><?= "Rp. " . number_format($pt['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="<?= base_url('assets/gambar/' . $pt['gambar']) ?>" target="_blank">
                                    <img src="<?= base_url('assets/gambar/' . $pt['gambar']) ?>" width="150px" alt="">
                                </a>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-sm btn-edit" href="<?= base_url('admin/paket/ubah/' . $pt['id_paket']) ?>" id="btnEdit">Edit</a>
                                <a class="btn btn-sm btn-danger tombol-hapus" href=" <?= base_url('admin/paket/hapusPaket/' . $pt['id_paket']) ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-pink1 text-capitalize mb-3">Menampilkan 1 dari <?= $total_rows ?> data</span>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
    <!--Container Main end-->

    <!-- Modal Tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style=" border:none!important;">
                <div class="modal-body">
                <h4 class="text-center">Tambah Paket</h4>
                <hr>
                    <form action="<?= base_url('admin/paket/tambah') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nmpaket" name="nmpaket" placeholder="Masukan Nama Paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="Harga" placeholder="Harga" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class=" btn btn-back" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                            <button class="add_new" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah End -->