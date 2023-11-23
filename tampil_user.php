<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['level'] == 2 && $_SESSION['status'] == 1) {
    // Login berhasil dengan level staff dan status aktif, arahkan ke halaman lain
    header("location: index.php");
    exit(); // Berhenti eksekusi skrip setelah mengalihkan header
}

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
    <a href="input_user.php">+ TAMBAH USER</a>
    <br>
    <br>
    <a href="index.php">MENU</a>
    <br>
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>ID USER</th>
            <th>NAMA</th>
            <th>PASSWORD</th>
            <th>LEVEL</th>
            <th>STATUS</th>
            <th>OPSI</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from user");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_user']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><?php echo $d['level']; ?></td>
                <td><?php echo $d['status']; ?></td>
                    <td>
                            <a href="edit_user.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                            <a href="hapus_user.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                    </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>