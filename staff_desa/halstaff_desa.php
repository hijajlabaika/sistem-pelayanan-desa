<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$result = mysqli_query($connection, "SELECT * FROM surat_sip 
WHERE status_sip = 'acc_rt'");
$row = mysqli_num_rows($result);

$result_sk = mysqli_query($connection, "SELECT * FROM surat_sk 
WHERE status_sk = 'acc_rt'");
$row_sk = mysqli_num_rows($result_sk);

$result_skck = mysqli_query($connection, "SELECT * FROM surat_skck 
WHERE status_skck = 'acc_rt'");
$row_skck = mysqli_num_rows($result_skck);

$result_skd = mysqli_query($connection, "SELECT * FROM surat_skd 
WHERE status_skd = 'acc_rt'");
$row_skd = mysqli_num_rows($result_skd);

$result_sku = mysqli_query($connection, "SELECT * FROM surat_sku 
WHERE status_sku = 'acc_rt'");
$row_sku = mysqli_num_rows($result_sku);

$result_sppktp = mysqli_query($connection, "SELECT * FROM surat_sppktp 
WHERE status_sppktp = 'acc_rt'");
$row_sppktp = mysqli_num_rows($result_sppktp);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Menu Staff Desa</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: green;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="halstaff_desa.php">Desa Jatitujuh</a>
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
                        <a class="nav-link" href="halstaff_desa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="data_user.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
                            Data User

                        </a>
                        <a class="nav-link collapsed" href="request_pengajuanstaff.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bullhorn"></i></div>
                            Request Pengajuan

                        </a>
                        <a class="nav-link collapsed" href="cetak_surat.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                            Cetak Surat

                        </a>
                        <div class="dropdown">
                            <a class="nav-link collapsed dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Surat Selesai
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="surat_selesai_sip.php">Surat SIP</a></li>
                                <li><a class="dropdown-item" href="surat_selesai_sk.php">Surat SK</a></li>
                                <li><a class="dropdown-item" href="surat_selesai_skck.php">Surat SKCK</a></li>
                                <li><a class="dropdown-item" href="surat_selesai_skd.php">Surat SKD</a></li>
                                <li><a class="dropdown-item" href="surat_selesai_sku.php">Surat SKU</a></li>
                                <li><a class="dropdown-item" href="surat_selesai_sppktp.php">Surat SPPKTP</a></li>
                            </ul>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="../logout.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-sm-flex align-items-center justify-content-between mb-4" style="height: 150px; background-color: #005d1a;">
                    <h1 class="h3 mb-0 text-white"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;Hallo, Staff Desa</h1>

                </div>
                <div class="container-fluid px-4">

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                        Pending Requests (SIP)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row; ?> <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-black mb-4">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Pending Requests (SK)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row_sk; ?> <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                        Pending Requests (SKCK)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row_skck; ?> <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                        Pending Requests (SKD)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row_skd; ?> <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-black mb-4">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Pending Requests (SKU)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row_sku; ?> <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                        Pending Requests (SPPKTP)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row_sppktp; ?> <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
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