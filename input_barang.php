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

    $Nama = $_POST["nama_barang"];
    $kodeBarang = $_POST["kode_barang"];
    $Qty = $_POST["qty"];
    $Harga = $_POST["harga"];
    $kategoriID = $_POST["kategori_id"];
    //input data ke database
    $a = mysqli_query($koneksi, "insert into barang values ('','$Nama', '$kodeBarang','$Qty','$Harga','$kategoriID')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location: tampil_barang.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemrprograman 3 2023</h2>
    <br>
    <a href="tampil_barang.php">KEMBALI</a>
    <br>
    <br>
    <h3>TAMBAH DATA BARANG</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang"></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td><input type="number" name="qty"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori_id" id="kategori_id">
                        <option value="">--Pilih--</option>
                        <?php
                        $data = mysqli_query($koneksi, 'select * from kategori');

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $d['id_kategri']; ?>"><?= $d['nama_kategori']; ?></option>
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