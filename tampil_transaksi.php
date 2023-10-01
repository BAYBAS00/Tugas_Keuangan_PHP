<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman3.com</title>
</head>
<body>
<h2>Pemrograman 3 2023</h2>
    <br>
    <a href="input_transaksi.php">+ TAMBAH TRANSAKSI</a>
    <br>
    <br>
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Nomor Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Barang ID</th>
            <th>Jumlah Transaksi</th>
            <th>User ID</th>
            <th>OPSI</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from transaksi");
        while ($d = mysqli_fetch_array($data)){
        ?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_transaksi']; ?></td>
            <td><?php echo $d['tgl_transaksi']; ?></td>
            <td><?php echo $d['no_transaksi']; ?></td>
            <td><?php echo $d['jenis_transaksi']; ?></td>
            <td><?php echo $d['barang_id']; ?></td>
            <td><?php echo $d['jumlah_transaksi']; ?></td>
            <td><?php echo $d['user_id']; ?></td>
            <td>
                <a href="edit_transaksi.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                <a href="hapus_transaksi.php?id=<?php echo $d['id']; ?>">HAPUS</a>
            </td>
        </tr> 
        <?php   
        }
        ?>
    </table>
</body>
</html>