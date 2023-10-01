<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman3.com</title>
</head>
<?php
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
    //input data ke database
    $a= mysqli_query($koneksi, "insert into transaksi values ('','$tglTransaksi','$noTransaksi','$jenisTransaksi',
                        '$barangId','$jumlahTransaksi','$userId')");
    if ($a) {
        //mengalihkan halaman kembali
        header ("location: tampil_transaksi.php");
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
                <td>Barang ID</td>
                <td><input type="number" name="barang_id"></td>
            </tr>
            <tr>
                <td>Jumlah Transaksi</td>
                <td><input type="number" name="jumlah_transaksi"></td>
            </tr>
            <tr>
                <td>User ID</td>
                <td><input type="number" name="user_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form> 
</body>
</html>