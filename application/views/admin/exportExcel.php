<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | BERKAH LAUNDRY</title>
</head>

<body>
    <?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Transaksi.xls");
    
    $table = '<h3 class="text-center">LAPORAN TRANSAKSI</h3>
    <table border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Invoice</th>
                <th scope="col">Nama Member</th>
                <th scope="col">Status</th>
                <th scope="col">Pengiriman</th>
                <th scope="col">Dibayar</th>
            </tr>
        </thead>
        <tbody>';
            $no = 1;
            foreach ($transaksi as $tr) {
                $table .= '<tr>
                    <td>' .  $no++ . '</td>
                    <td>' . $tr['kode_invoice'] . '</td>
                    <td>' . $tr['NAMA_MEMBER'] . '</td>
                    <td>' . $tr['status'] . '</td>
                    <td>' . $tr['pengiriman'] . '</td>
                    <td>' . $tr['dibayar'] . '</td>
                </tr>';
            }
            $table .= '
        </tbody>
    </table>';
    echo $table;
    ?>
</body>

</html>