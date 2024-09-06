<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | BERKAH LAUNDRY</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="px-4 m-0">
    <h3 class="text-center">LAPORAN TRANSAKSI</h3>
    <table class="table table-striped table-hover">
        <thead class="bg-primary text-white">
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
    <!-- Javascript -->
    <script type="text/javascript">
        window.print()
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <!-- Javascript End -->
</body>

</html>