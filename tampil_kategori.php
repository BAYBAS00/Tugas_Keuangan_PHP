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
    <a href="input_kategori.php">+ TAMBAH KATEGORI</a>
    <br>
    <br>
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>ID Kategori</th>
            <th>NAMA</th>
            <th>OPSI</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from kategori");
        while ($d = mysqli_fetch_array($data)){
        ?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_kategri']; ?></td>
            <td><?php echo $d['nama_kategori']; ?></td>
            <td>
                <a href="edit_kategori.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                <a href="hapus_kategori.php?id=<?php echo $d['id']; ?>">HAPUS</a>
            </td>
        </tr> 
        <?php   
        }
        ?>
    </table>
</body>
</html>