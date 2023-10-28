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
    <a href="input_barang.php">+ TAMBAH BARANG</a>
    <br>
    <br>
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Kategori ID</th>
            <th>OPSI</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from barang");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_barang']; ?></td>
                <td><?php echo $d['nama_barang']; ?></td>
                <td><?php echo $d['kode_barang']; ?></td>
                <td><?php echo $d['qty']; ?></td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['kategori_id']; ?></td>
                <td>
                    <a href="edit_barang.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                    <a href="hapus_barang.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>