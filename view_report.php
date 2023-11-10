<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemograman3.com</title>
</head>

<body>
    <h2>Pemograman 3</h2>
    <a href="index.php">KEMBALI</a>
    <h5>Laporan Transaksi</h5>
    <table border="1">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Member</th>
            <th>Level</th>
            <th>Diskon Member</th>
            <th>Diskon Barang</th>
            <th>Diskon Belanja</th>
            <th>Total Pembelian</th>
            <th>Total Diskon</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $no = 1;
        $data = mysqli_query($koneksi, "select member.*, level.*, kategori.*, barang.*, user.*, transaksi.* FROM transaksi JOIN user ON user.id_user=transaksi.user_id
                                    JOIN member ON member.id_member=transaksi.id_member JOIN barang ON barang.id_barang=transaksi.barang_id JOIN level ON member.id_level=level.id_level
                                    JOIN kategori ON kategori.id_kategri=barang.kategori_id");
        while ($d = mysqli_fetch_array($data)) {
            $level = $d['jenis_level'];
            $totalPembelian = $d['harga'] * $d['jumlah_transaksi'];

            if ($totalPembelian > 100000 && ($d['jumlah_diskon_lvl'] != 0)) {
                $diskonbelanja = 10;
            } else {
                $diskonbelanja = 0;
            }
            $totaldiskon = $totalPembelian * (($diskonbelanja + $d['diskon_kategori'] + $d['jumlah_diskon_lvl']) / 100);
            $totalTransaksi = $totalPembelian - $totaldiskon;
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['nama_member']; ?></td>
                <td><?php echo $d['jenis_level']; ?></td>
                <td><?php echo $d['jumlah_diskon_lvl'] . '%'; ?></td>
                <td><?php echo $d['diskon_kategori'] . '%'; ?></td>
                <td><?php echo $diskonbelanja . '%'; ?></td>
                <td><?php echo $totalPembelian; ?></td>
                <td><?php echo $totaldiskon; ?></td>
                <td><?php echo $totalTransaksi; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>