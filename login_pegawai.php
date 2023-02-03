<?php
session_start();
if ($_SESSION) {
    if ($_SESSION['level'] == "rt") {
        header("Location: rt/halrt.php");
    }
    if ($_SESSION['level'] == "staff_desa") {
        header("Location: staff_desa/halstaff_desa.php");
    }
    if ($_SESSION['level'] == "kepala_desa") {
        header("Location: kepala_desa/halkepala_desa.php");
    }
}

include('proses_loginpegawai.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Pegawai</title>
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
                        <b>Login Pegawai</b>
                    </h5>
                    <br>
                </center>


                <form action="" method="post">
                    <div class="input-group mb-3">
                        <select name="level" class="form-control" aria-label="Default select example" required>
                            <option selected>Login Sebagai</option>
                            <option value="1">RT</option>
                            <option value="2">Staff Desa</option>
                            <option value="3">Kepala Desa</option>
                        </select>
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
                            <button type="submit" class="btn btn-success btn-block btn-flat" name="submit" title="Masuk Sistem">
                                <b>LOGIN</b>
                            </button>
                            <?php echo $error; ?>
                            <a href="index.php" class="btn btn-danger btn-block btn-flat">BATAL</a>
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