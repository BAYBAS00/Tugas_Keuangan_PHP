<?php
session_start();

    if (isset($_SESSION["nama"])) {
        header("Location: index.php");
        exit;
    }


include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = $_POST['nama'];
    $password = md5($_POST['password']);

    if ($username == '' || $password == '') {
        $err = "Username dan Password tidak boleh kosong";
    } else {
        $query = "SELECT * FROM user WHERE nama = '$username'";
        $result = mysqli_query($koneksi, $query);
 

        if (mysqli_num_rows($result) == 0) {
            $err = "Username dan Password tidak boleh kosong";
        } else {
            $d = mysqli_fetch_array($result);

            if ($d['password'] != $password) {
                $err = "Akun <b>'$username'</b> tidak ditemukan";
            } else {
                if ($d['status'] != 1) {
                    $err = "Status tidak aktif";
                } else {
                    // Set session
                    $_SESSION['nama'] = $username;
                    $_SESSION['level'] = $d['level'];
                    $_SESSION['status'] = $d['status'];
                    $_SESSION['id_user'] = $d['id_user'];

                    if ($_SESSION['status'] == 1) {
                        header("location: index.php");
                        exit;
                        }
                    }
                }
                
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