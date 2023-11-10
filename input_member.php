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

    $Nama = $_POST["nama_member"];
    $IDLevel = $_POST["id_level"];
    //input data ke database
    $a = mysqli_query($koneksi, "insert into member values ('','$Nama','$IDLevel')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location: tampil_member.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tampil_member.php">KEMBALI</a>
    <br>
    <br>
    <h3>TAMBAH DATA MEMBER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama Member</td>
                <td><input type="text" name="nama_member"></td>
            </tr>
            <tr>
                <td>ID Level</td>
                <td>
                    <select name="id_level" id="id_level">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from level');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_level']; ?>"><?= $d['jenis_level']; ?></option>
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