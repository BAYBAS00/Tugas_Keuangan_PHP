<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemograman3.com</title>
</head>

<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="input_member.php">+ TAMBAH MEMBER</a>
    <br>
    <br>
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>ID Member</th>
            <th>Member</th>
            <th>ID Level</th>
            <th>OPSI</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select level.jenis_level, member.* from member JOIN level ON level.id_level=member.id_level");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_member']; ?></td>
                <td><?php echo $d['nama_member']; ?></td>
                <td><?php echo $d['jenis_level']; ?></td>
                <td>
                    <a href="edit_kategori.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                    <a href="hapus_kategori.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>