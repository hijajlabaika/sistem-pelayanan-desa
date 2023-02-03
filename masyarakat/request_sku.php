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

    $nik_masyarakat_sku = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nik_masyarakat_sku"]));
    $nama_sku = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nama_sku"]));
    $alamat_sku = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["alamat_sku"]));
    $keperluan_sku = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["keperluan_sku"]));
    $tahun_berdiri = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["tahun_berdiri"]));
    $nama_usaha = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nama_usaha"]));
    $tgl_request_sku = Date("Y-m-d H:i:sa");
    //mulai proses simpan data
    $nama_file_ktp = $_FILES["scan_ktp_sku"]['name'];
    $nama_file_kk = $_FILES["scan_kk_sku"]['name'];


    $direktori = "gambar/";

    move_uploaded_file($_FILES['scan_ktp_sku']['tmp_name'], $direktori . $nama_file_ktp);
    move_uploaded_file($_FILES['scan_kk_sku']['tmp_name'], $direktori . $nama_file_kk);

    $sql = "INSERT INTO surat_sku (nik_masyarakat_sku, nama_sku, alamat_sku, keperluan_sku, scan_ktp_sku, scan_kk_sku, tgl_req_sku, tahun_berdiri, nama_usaha)
                    VALUES ('$nik_masyarakat_sku', '$nama_sku', '$alamat_sku', '$keperluan_sku', '$nama_file_ktp', '$nama_file_kk', '$tgl_request_sku', '$tahun_berdiri', '$nama_usaha')";
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
    <title>Request SKU | Masyarakat</title>
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
                            <i class="fa fa-edit"></i> Request SKU
                        </h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nik" readonly name="nik_masyarakat_sku" value="<?php echo $data_nik; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="nik" readonly name="alamat_sku" value="<?php echo $data_alamat; ?>" required>
                                    <input type="text" class="form-control" id="nik" readonly name="nama_sku" value="<?php echo $data_nama; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keperluan_sip" name="keperluan_sku" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Usaha</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keperluan_sip" name="nama_usaha" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="keperluan_sip" name="tahun_berdiri" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KTP</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="scan_ktp_sku" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KK</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="scan_kk_sku" id="inputGroupFile02" required>
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