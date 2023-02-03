<?php

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nik'])) {
    header("Location: index.php");
}

if (isset($_POST['register'])) {
    $nik = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['nik']));
    $nama = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['nama']));
    $alamat = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['alamat']));
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);

    if ($password == $password2) {
        $sql = "SELECT * FROM data_penduduk WHERE nik='$nik'";
        $result = mysqli_query($connection, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO data_penduduk (nik, nama, alamat, password)
                    VALUES ('$nik', '$nama', '$alamat', '$password')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $nama = "";
                $alamat = "";
                $_POST['password'] = "";
                $_POST['password2'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! NIK Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi | Masyarakat</title>
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
                        <b>Registrasi Masyarakat</b>
                    </h5>
                    <br>
                </center>


                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" minlength="16" maxlength="16" class="form-control" name="nik" placeholder="NIK" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
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
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block btn-flat" name="register" title="Masuk Sistem">
                                <b>REGISTER</b>
                            </button>
                            <a href="index.php" class="btn btn-danger btn-block btn-flat">BATAL</a>
                            <br>
                            <p>Sudah mempunyai akun ? Silahkan <a href="login_masyarakat.php">Login</a></p>
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