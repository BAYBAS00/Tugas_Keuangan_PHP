<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman3.com</title>
</head>
<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}
// koneksi ke database
include "koneksi.php";
// menangkap data yang dikirim ke database
if (!empty($_POST["save"])) {

    $tglTransaksi = $_POST["tgl_transaksi"];
    $noTransaksi = $_POST["no_transaksi"];
    $jenisTransaksi = $_POST["jenis_transaksi"];
    $barangId = $_POST["barang_id"];
    $jumlahTransaksi = $_POST["jumlah_transaksi"];
    $userId = $_POST["user_id"];
    $memberID = $_POST["member_id"];
    //input data ke database
    $a = mysqli_query($koneksi, "insert into transaksi values ('','$tglTransaksi','$noTransaksi','$jenisTransaksi',
                        '$barangId','$jumlahTransaksi','$userId','$memberID')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location: tampil_transaksi.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemrprograman 3 2023</h2>
    <br>
    <a href="tampil_transaksi.php">KEMBALI</a>
    <br>
    <br>
    <h3>TAMBAH DATA TRANSAKSI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal Transaksi</td>
                <td><input type="date" name="tgl_transaksi"></td>
            </tr>
            <tr>
                <td>Nomor Transaksi</td>
                <td><input type="text" name="no_transaksi"></td>
            </tr>
            <tr>
                <td>Jenis Transaksi</td>
                <td><input type="text" name="jenis_transaksi"></td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>
                    <select name="barang_id" id="barang_id">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from barang');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Transaksi</td>
                <td><input type="number" name="jumlah_transaksi"></td>
            </tr>
            <tr>
                <td>User</td>
                <td>
                    <select name="user_id" id="user_id">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from user');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_user']; ?>"><?= $d['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Member</td>
                <td>
                    <select name="member_id" id="member_id">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from member');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_member']; ?>"><?= $d['nama_member']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>