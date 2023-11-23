<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}

$level = $_SESSION['level'];
?>
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
    <a href="index.php">MENU</a>
    <br>
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Nomor Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Barang</th>
            <th>Jumlah Transaksi</th>
            <th>User</th>
            <th>Member</th>
        <?php if ($level != 2) : ?>
            <th>OPSI</th>
        <?php endif; ?>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select barang.nama_barang, user.nama, member.nama_member, transaksi.* from transaksi JOIN barang ON transaksi.barang_id=barang.id_barang
                                        JOIN user ON transaksi.user_id=user.id_user JOIN member ON transaksi.id_member=member.id_member");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_transaksi']; ?></td>
                <td><?php echo $d['tgl_transaksi']; ?></td>
                <td><?php echo $d['no_transaksi']; ?></td>
                <td><?php echo $d['jenis_transaksi']; ?></td>
                <td><?php echo $d['nama_barang']; ?></td>
                <td><?php echo $d['jumlah_transaksi']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['nama_member']; ?></td>
                <?php if ($level != 2) : ?>
                    <td>
                        <a href="edit_transaksi.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                        <a href="hapus_transaksi.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>