<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION['nik'])) {
    header("Location: ../login_masyarakat.php");
} else {
    $data_nama = $_SESSION["nama"];
    $data_nik = $_SESSION["nik"];
}

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Biodata | Masyarakat</title>
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
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Biodata Anda
                            </h3>
                        </div>
                        <div class="card-body">
                            <a href="ubah_biodata.php?id=<?= $row["id"]; ?>" class="btn btn-success">Ubah Data</a>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">NIK :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["nik"] ?></div>

                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["nama"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tempat Lahir</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["tempat_lahir"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tanggal Lahir :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["tgl_lahir"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["status"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jenis Kelamin :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["jenis_kelamin"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Agama :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["agama"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["alamat"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telepon :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["telepon"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Kewarganegaraan :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["kewarganegaraan"] ?></div>
                            </div>
                            <hr style="width: 100%;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Pekerjaan :</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"><?= $row["pekerjaan"] ?></div>
                            </div>

                        </div>
                    </div>
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