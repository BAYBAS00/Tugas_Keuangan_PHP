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

    $Nama = $_POST["nama"];
    $Password = $_POST["password"];
    $Level = $_POST["level"];
    $Status = $_POST["status"];
    //input data ke database
    $a= mysqli_query($koneksi, "insert into user values ('','$Nama','$Password','$Level','$Status')");
    if ($a) {
        //mengalihkan halaman kembali
        header ("location: tampil_user.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<body>
    <h2>Pemrprograman 3 2023</h2>
    <br>
    <a href="tampil_user.php">KEMBALI</a>
    <br>
    <br>
    <h3>TAMBAH DATA USER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><select name="level">
                    <option value="">---Pilih</option>
                    <option value="1">Admin</option>
                    <option value="2">Staff</option>
                    <option value="3">Spv</option>
                    <option value="4">Mgr</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td><select name="status">
                <option value="">---Pilih</option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
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