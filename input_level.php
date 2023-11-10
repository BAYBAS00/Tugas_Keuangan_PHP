<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemograman3.com</title>
</head>
<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['level'] == 2 && $_SESSION['status'] == 1) {
    // Login berhasil dengan level staff dan status aktif, arahkan ke halaman lain
    header("location: tampil_transaksi.php");
    exit(); // Berhenti eksekusi skrip setelah mengalihkan header
}
// koneksi ke database
include "koneksi.php";
// menangkap data yang dikirim ke database
if (!empty($_POST["save"])) {

    $Level = $_POST["jenis_level"];
    $Diskon = $_POST["jumlah_diskon_lvl"];
    //input data ke database
    $a = mysqli_query($koneksi, "insert into level values ('','$Level','$Diskon')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location: tampil_level.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tampil_level.php">KEMBALI</a>
    <br>
    <br>
    <h3>TAMBAH DATA LEVEL</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Level</td>
                <td><input type="text" name="jenis_level"></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td><input type="text" name="jumlah_diskon_lvl" value="0"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>