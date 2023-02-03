<?php

use LDAP\Result;

session_start();

include '../koneksi.php';

if (!isset($_SESSION['nik'])) {
    header("Location: ../login_masyarakat.php");
} else {
    $data_nama = $_SESSION["nama"];
    $data_nik = $_SESSION["nik"];
    $data_alamat = $_SESSION["alamat"];
}

if (isset($_POST['submit'])) {
    date_default_timezone_set("Asia/Jakarta");

    $nik_masyarakat_sppktp = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nik_masyarakat_sppktp"]));
    $nama_sppktp = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nama_sppktp"]));
    $alamat_sppktp = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["alamat_sppktp"]));
    $keperluan_sppktp = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["keperluan_sppktp"]));
    $rt_rw = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["rt_rw"]));
    $tgl_request_sppktp = Date("Y-m-d H:i:sa");
    //mulai proses simpan data
    $nama_file_kk = $_FILES["scan_kk_sppktp"]['name'];


    $direktori = "gambar/";


    move_uploaded_file($_FILES['scan_kk_sppktp']['tmp_name'], $direktori . $nama_file_kk);

    $sql = "INSERT INTO surat_sppktp (nik_masyarakat_sppktp, nama_sppktp, alamat_sppktp, keperluan_sppktp, scan_kk_sppktp, tgl_req_sppktp, rt_rw)
                    VALUES ('$nik_masyarakat_sppktp', '$nama_sppktp', '$alamat_sppktp', '$keperluan_sppktp', '$nama_file_kk', '$tgl_request_sppktp', '$rt_rw')";
    $result = mysqli_query($connection, $sql);

?>
    <script>
        alert('Request Surat Berhasil');
        window.location.href = "menu_masyarakat.php";
    </script>
<?php
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Request SPPKTP | Masyarakat</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: green;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="menu_masyarakat.php">Desa Jatitujuh</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #004d1a;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="menu_masyarakat.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="biodata.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                            Biodata Anda

                        </a>
                        <a class="nav-link collapsed" href="statusrequest.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bullhorn"></i></div>
                            Status Request

                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="../logout_masyarakat.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit"></i> Request SPPKTP
                        </h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nik" readonly name="nik_masyarakat_sppktp" value="<?php echo $data_nik; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="nik" readonly name="alamat_sppktp" value="<?php echo $data_alamat; ?>" required>
                                    <input type="text" class="form-control" id="nik" readonly name="nama_sppktp" value="<?php echo $data_nama; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rt / Rw</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keperluan_sip" name="rt_rw" placeholder="00/00" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keperluan_sip" placeholder="Keperluan Anda ..." name="keperluan_sppktp" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KK</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="scan_kk_sppktp" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>


                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" value="Request" class="btn btn-info">
                            <a href="menu_masyarakat.php" title="Kembali" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>