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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMOGRAMAN 3.com</title>
</head>

<body>
    <h3>PEMOGRAMAN 3</h3>
    <a href="logout.php">LOGOUT</a>
    <table>
        <tr>
            <td><a href="tampil_barang.php">BARANG</a></td>
        </tr>
        <tr>
            <td><a href="tampil_kategori.php">KATEGORI</a></td>
        </tr>
        <tr>
            <td><a href="tampil_level.php">LEVEL</a></td>
        </tr>
        <tr>
            <td><a href="tampil_member.php">MEMBER</a></td>
        </tr>
        <tr>
            <td><a href="tampil_transaksi.php">TRANSAKSI</a></td>
        </tr>
        <tr>
            <td><a href="tampil_user.php">USER</a></td>
        </tr>
        <tr>
            <td><a href="view_report.php">LAPORAN</a></td>
        </tr>
    </table>
</body>

</html>