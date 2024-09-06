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
                    <a href="<?= base_url('admin/paket') ?>" class="nav_link">
                        <ion-icon name="briefcase-outline" class="nav_icon"></ion-icon><span class="nav_name">Paket</span>
                    </a>
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav_link">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Transaksi</span>
                    </a>
                    <a href="<?= base_url('admin/laporan') ?>" class="nav_link active">
                        <ion-icon name="reader-outline"></ion-icon> <span class="nav_name">Laporan</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="card px-3 shadow-sm">
            <table class="table table-striped table-hover">
                <div class="table_header">
                    <p>Laporan Transaksi</p>
                    <div class="">
                        <a href="<?= base_url('admin/laporan/exportExcel') ?>" class="btn btn-back">Export Excel</a>
                        <a href="<?= base_url('admin/laporan/export') ?>" class="btn btn-edit">Print</a>
                    </div>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pengiriman</th>
                        <th scope="col">Dibayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transaksi as $tr) { ?>
                        <tr>
                            <td class="align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><?= $tr['kode_invoice'] ?></td>
                            <td class="align-middle"><?= $tr['NAMA_MEMBER'] ?></td>
                            <td class="align-middle">
                                <?php
                                if ($tr['status'] == "baru") {
                                    echo "<span class='btn-baru'>Baru</span>";
                                } elseif ($tr['status'] == "proses") {
                                    echo "<span class='btn-proses'>Proses</span>";
                                } elseif ($tr['status'] == "selesai") {
                                    echo "<span class='btn-selesai'>Selesai</span>";
                                } else {
                                    echo "<span class='btn-diambil'>Diambil</span>";
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php
                                if ($tr['pengiriman'] == "Pengantaran") {
                                    echo "<span'>Ya</span>";
                                } else {
                                    echo "<span>Tidak</span>";
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php
                                if ($tr['dibayar'] == "belum_dibayar") {
                                    echo "<span class='btn-baru'>Belum Dibayar</span>";
                                } else {
                                    echo "<span class='btn-diambil'>Dibayar</span>";
                                }
                                ?>
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        
    </script>