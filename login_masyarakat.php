<?php

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nik'])) {
    header("Location: masyarakat/menu_masyarakat.php");
}

if (isset($_POST['login'])) {
    $nik = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['nik']));
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM data_penduduk WHERE nik='$nik' AND password='$password'";
    $result = mysqli_query($connection, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['nik'] = $row['nik'];
        $_SESSION['alamat'] = $row['alamat'];
?>
        <script>
            alert('Login berhasil');
            window.location.href = "masyarakat/menu_masyarakat.php";
        </script>
<?php
    } else {
        echo "<script>alert('NIK atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Masyarakat</title>
    <link rel="icon" href="img/logo1.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="background-image: url('img/bg3.jpeg');">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <center>
                    <img src="img/logo1.png" width=170px />
                    <br>
                    <br>
                    <h5>
                        <b>Login Masyarakat</b>
                    </h5>
                    <br>
                </center>


                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" minlength="16" maxlength="16" name="nik" placeholder="NIK" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block btn-flat" name="login" title="Masuk Sistem">
                                <b>LOGIN</b>
                            </button>
                            <a href="index.php" class="btn btn-danger btn-block btn-flat">BATAL</a>
                            <br>
                            <p>Belum mempunyai akun ? Silahkan <a href="register.php">Register</a></p>
                        </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Alert -->
    <script src="plugins/alert.js"></script>

</body>

</html>