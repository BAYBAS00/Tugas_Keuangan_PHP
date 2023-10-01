<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrogrman3.com</title>
</head>
<?php
// koneksi ke database
include "koneksi.php";
// menangkap data yang dikirim ke database
if (!empty($_POST["save"])) {

    $Nama = $_POST["nama_kategori"];
    //input data ke database
    $a= mysqli_query($koneksi, "insert into kategori values ('','$Nama')");
    if ($a) {
        //mengalihkan halaman kembali
        header ("location: tampil_kategori.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<body>
<h2>Pemrprograman 3 2023</h2>
    <br>
    <a href="tampil_kategori.php">KEMBALI</a>
    <br>
    <br>
    <h3>TAMBAH DATA KATEGORI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td><input type="text" name="nama_kategori"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>