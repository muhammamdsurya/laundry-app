<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
                </a>
                <div class="nav_list">
                    <a href="<?= base_url('member/dashboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('member/layanan') ?>" class="nav_link">
                        <ion-icon name="layers-outline"></ion-icon> <span class="nav_name active">Layanan</span>
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
        <div class="card px-3 pt-3 shadow-sm mb-3">
            <form action="<?= base_url('member/layanan/proses-pembayaran') ?>" method="post">
                <div class="table_header px-3 p-0 m-0">
                    <p>Detail Pesanan</p>
                </div>
                <div class="table_list">
                    <div class="list">
                        <div class="labelInfo">
                            <label for="invoice">Invoice</label>
                        </div>
                        <input type="text" value="<?= $kode_invoice ?>" name="invoice" id="invoice" readonly>
                    </div>
                    <div class="list">
                        <div class="labelInfo">
                            <label for="tgl">Tanggal</label>
                        </div>
                        <input type="text" value="<?= date('Y-m-d') ?>" name="tgl" id="tgl" readonly>
                    </div>
                    <div class="list">
                        <div class="labelInfo">
                            <label for="namapembeli">Nama Member</label>
                        </div>
                        <input type="text" value="<?= $this->session->userdata('nama') ?>" name="nama" id="nama" readonly>
                    </div>
                    <div class="list">
                        <div class="labelInfo">
                            <label for="alamat">Alamat</label>
                        </div>
                        <input type="text" value="<?= $this->session->userdata('alamat') ?>" name="alamat" id="alamat" readonly>
                    </div>
                    <div class="list">
                        <div class="labelInfo">
                            <label for="notelp">No Telp</label>
                        </div>
                        <input type="text" value="<?= $this->session->userdata('telp') ?>" name="notelp" id="notelp" readonly>
                    </div>
                    <div class="list">
                        <div class="labelInfo">
                            <label for="pengiriman">Pengiriman</label>
                        </div>
                        <select name="pengiriman" class="form-select" id="pengiriman" style='width: 65%; border: none;border: 2px solid #ddd;'>
                            <option value="bayar_ditempat">Bayar Ditempat</option>
                            <option value="Pengantaran">Pengantaran</option>
                        </select>

                    </div>
                    <div class="list">
                        <div class="labelInfoTextarea">
                            <label for="komen">Komentar</label>
                        </div>
                        <textarea name="komentar" id="komen" style='border: none;border: 2px solid #ddd;'></textarea>
                    </div>
                </div>
                <table class="table table-striped table-hover mt-5">
                    <div class="table_header p-0 px-3 m-0 mt-5">
                        <p>Rincian Pesanan</p>
                    </div>
                    <thead class="bg-pink">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Harga</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-end">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) { ?>
                            <tr>
                                <td class="align-middle"><?= $no++ ?></td>
                                <td class="align-middle"><?= $items['name'] ?></td>
                                <td class="align-middle"><?php echo "Rp. " . number_format($items['price'], 0, ',', '.'); ?></td>
                                <td class="align-middle text-center"><?= $items['qty'] ?></td>
                                <td class="align-middle text-end">
                                    <?php
                                    echo "Rp. " . number_format($items['subtotal'], 0, ',', '.');
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th scope="col" colspan="4" style="background: #F83292!important; color: #fff!important;">Total Harga</th>
                            <th scope="col" class="text-end"><?= "Rp. " . number_format($this->cart->total(), 0, ',', '.') ?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex mb-3 justify-content-between">
                    <a href="<?= base_url('member/layanan') ?>" class="btn btn-back">Kembali</a>
                    <button class="btn btn-edit">Bayar</button>
                </div>
            </form>
        </div>
    </div>
    <!--Container Main end-->