<?php
include 'koneksi.php';
if (!empty($_POST['login'])) {
    $username = $_POST['nama'];
    $password = $_POST['password'] ? md5($_POST['password']) : '';

    if (empty($username) && empty($password)) {
        $err = 'Username dan Password tidak boleh kosong';
    } elseif (empty($username)) {
        $err = 'Username tidak boleh kosong';
    } elseif (empty($password)) {
        $err = 'Password tidak boleh kosong';
    } else {
        $getUser = mysqli_query($koneksi, "select * from user where user.nama='$username' and user.password='$password'");
        $user = mysqli_fetch_array($getUser);
        if (empty($user)) {
            $err = 'Akun tidak ditemukan';
        } else {

            header("location:index.php");
        }
    }
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
    <h2>PEMOGRAMAN 3</h2>
    <h3>LOGIN</h3>

    <?php
    if (isset($err)) :
    ?>
            <ul>
                <li>
                    <?= $err; ?>
                </li>
            </ul>
    <?php
    endif;
    ?>

    <form method="POST">
        <table>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="LOGIN"></td>
            </tr>
        </table>
    </form>


</body>

</html>