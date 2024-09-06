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
            <div class="table_header">
                <p>Pemesanan Saya</p>
            </div>
            <thead class="bg-pink">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Invoice</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Verifikasi</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesanan as $ps) { ?>
                    <tr>
                        <td class="align-middle"><?= ++$start ?></td>
                        <td class="align-middle"><?= $ps['kode_invoice'] ?></td>
                        <td class="align-middle"><?= $ps['tgl'] ?></td>
                        <td class="align-middle">
                            <?php
                            if ($ps['status'] == "baru") {
                                echo "<span class='btn-baru'>Baru</span>";
                            } elseif ($ps['status'] == "proses") {
                                echo "<span class='btn-proses'>Proses</span>";
                            } elseif ($ps['status'] == "selesai") {
                                echo "<span class='btn-selesai'>Selesai</span>";
                            } else {
                                echo "<span class='btn-diambil'>Diambil</span>";
                            }
                            ?>
                        </td>
                        <td class="align-middle text-center">
                            <?php if ($ps['pengiriman'] === "bayar_ditempat") { ?>
                                    <?php
                                    if ($ps['verifikasi_pembayaran'] == "setuju") {
                                        echo "<span class='btn-diambil'>Disetujui</span>";
                                    } elseif ($ps['verifikasi_pembayaran'] == "tolak") {
                                        echo "<span class='btn-selesai'>Ditolak</span>";
                                    } else {
                                        echo "<span class='btn-baru'>Sedang Proses Pemeriksaan</span>";
                                    }
                                    ?>
                            <?php } else { ?>
                                <?php if ($ps['bukti'] === null) { ?>
                                    <span class='btn-proses'>Belum Melakukan Pembayaran</span>
                                <?php } else { ?>
                                    <?php
                                    if ($ps['verifikasi_pembayaran'] == "setuju") {
                                        echo "<span class='btn-diambil'>Disetujui</span>";
                                    } elseif ($ps['verifikasi_pembayaran'] == "tolak") {
                                        echo "<span class='btn-selesai'>Ditolak</span>";
                                    } else {
                                        echo "<span class='btn-baru'>Sedang Proses Pemeriksaan</span>";
                                    }
                                    ?>
                                <?php } ?>
                            <?php } ?>
                        </td>
                        <td class="align-middle text-end">
                            <?php if ($ps['pengiriman'] === "bayar_ditempat") { ?>
                                <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/detail/' . $ps['kode_invoice']) ?>" i d="btnEdit">Lihat Detail</a>
                            <?php } else { ?>
                                <?php if ($ps['bukti'] === null) { ?>
                                    <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/pembayaran/' . $ps['kode_invoice']) ?>" id="btnEdit">Kirim Bukti Pembayaran</a>
                                <?php } else { ?>
                                    <?php if ($ps['verifikasi_pembayaran'] === 'setuju') { ?>
                                        <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/detail/' . $ps['kode_invoice']) ?>" id="btnEdit">Lihat Detail</a>
                                    <?php } elseif ($ps['verifikasi_pembayaran'] === 'tolak') { ?>
                                        <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/pembayaran/' . $ps['kode_invoice']) ?>" id="btnEdit">Kirim Ulang Bukti Pembayaran</a>
                                    <?php } else { ?>
                                        <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/detail/' . $ps['kode_invoice']) ?>" id="btnEdit">Lihat Detail</a>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
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