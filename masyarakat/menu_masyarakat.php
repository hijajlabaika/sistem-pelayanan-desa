<?php

session_start();

include '../koneksi.php';

if (!isset($_SESSION['nik'])) {
    header("Location: ../login_masyarakat.php");
} else {
    $data_nama = $_SESSION["nama"];
    $data_nik = $_SESSION["nik"];
}

if (isset($_POST['request_sip'])) {
    $result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
    $row = mysqli_fetch_assoc($result);
    if ($row["tempat_lahir"] == '') {
        echo "<script>alert('Harap Lengkapi Biodata Anda Terlebi Dahulu')</script>";
?>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "request_sip.php";
        </script>
    <?php
    }
}

if (isset($_POST['request_sk'])) {
    $result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
    $row = mysqli_fetch_assoc($result);
    if ($row["tempat_lahir"] == '') {
        echo "<script>alert('Harap Lengkapi Biodata Anda Terlebi Dahulu')</script>";
    ?>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "request_sk.php";
        </script>
    <?php
    }
}

if (isset($_POST['request_skck'])) {
    $result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
    $row = mysqli_fetch_assoc($result);
    if ($row["tempat_lahir"] == '') {
        echo "<script>alert('Harap Lengkapi Biodata Anda Terlebi Dahulu')</script>";
    ?>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "request_skck.php";
        </script>
    <?php
    }
}

if (isset($_POST['request_skd'])) {
    $result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
    $row = mysqli_fetch_assoc($result);
    if ($row["tempat_lahir"] == '') {
        echo "<script>alert('Harap Lengkapi Biodata Anda Terlebi Dahulu')</script>";
    ?>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "request_skd.php";
        </script>
    <?php
    }
}

if (isset($_POST['request_sku'])) {
    $result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
    $row = mysqli_fetch_assoc($result);
    if ($row["tempat_lahir"] == '') {
        echo "<script>alert('Harap Lengkapi Biodata Anda Terlebi Dahulu')</script>";
    ?>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "request_sku.php";
        </script>
    <?php
    }
}

if (isset($_POST['request_sppktp'])) {
    $result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = '$data_nik'");
    $row = mysqli_fetch_assoc($result);
    if ($row["tempat_lahir"] == '') {
        echo "<script>alert('Harap Lengkapi Biodata Anda Terlebi Dahulu')</script>";
    ?>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "request_sppktp.php";
        </script>
<?php
    }
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
    <title>Menu Masyarakat</title>
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
                <div class="align-items-center justify-content-between mb-4" style="height: 150px; background-color: #005d1a;">
                    <h1 class="h3 mb-0 text-white"><br><br>Hallo, <?php echo $data_nama; ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active text-white">Sebelum anda melakukan request surat, lengkapi biodata anda terlebih dahulu, <a href="biodata.php" class="btn btn-sm btn-success shadow-sm"><i class="fa-solid fa-user"></i> Klik biodata anda</a> </li>
                    </ol>

                </div>
                <div class="container-fluid px-4">
                    <div class="row" style="text-align: center;">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <p>SIP</p>
                                    <p>Surat Izin Pernikahan</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        <button type="submit" name="request_sip" class="btn btn-sm btn-primary" style="text-decoration: none;"><i class="fa-solid fa-envelope-open-text"></i> Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-black mb-4">
                                <div class="card-body">
                                    <p>SK</p>
                                    <p>Surat Kelahiran</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        <button type="submit" name="request_sk" class="btn btn-sm btn-warning" style="text-decoration: none;"><i class="fa-solid fa-envelope-open-text"></i> Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <p>SPKCK</p>
                                    <p>Surat Pengantar SKCK</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        <button type="submit" name="request_skck" class="btn btn-sm btn-success" style="text-decoration: none;"><i class="fa-solid fa-envelope-open-text"></i> Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <p>SKD</p>
                                    <p>Surat Keterangan Domisili</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        <button type="submit" name="request_skd" class="btn btn-sm btn-danger" style="text-decoration: none;"><i class="fa-solid fa-envelope-open-text"></i> Request</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-black mb-4">
                                <div class="card-body">
                                    <p>SKU</p>
                                    <p>Surat Keterangan Usaha</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        <button type="submit" name="request_sku" class="btn btn-sm btn-info" style="text-decoration: none;"><i class="fa-solid fa-envelope-open-text"></i> Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body">
                                    <p>SPPKTP</p>
                                    <p>Surat Pengantar KTP</p>
                                </div>
                                <div class="card-footer">
                                    <form action="" method="POST">
                                        <button type="submit" name="request_sppktp" class="btn btn-sm btn-secondary" style="text-decoration: none;"><i class="fa-solid fa-envelope-open-text"></i> Request</button>
                                    </form>
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