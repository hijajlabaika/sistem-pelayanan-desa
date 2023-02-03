<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION['nik'])) {
    header("Location: ../login_masyarakat.php");
} else {
    $data_nama = $_SESSION["nama"];
    $data_nik = $_SESSION["nik"];
}

// $result_sip = mysqli_query($connection, "SELECT * FROM surat_sip WHERE nik_masyarakat_sip = '$data_nik'");
// $result_sk = mysqli_query($connection, "SELECT * FROM surat_sk WHERE nik_masyarakat_sk = '$data_nik'");
// $result_skck = mysqli_query($connection, "SELECT * FROM surat_skck WHERE nik_masyarakat_skck = '$data_nik'");
// $result_skd = mysqli_query($connection, "SELECT * FROM surat_skd WHERE nik_masyarakat_skd = '$data_nik'");
// $result_sku = mysqli_query($connection, "SELECT * FROM surat_sku WHERE nik_masyarakat_sku = '$data_nik'");
// $result_sppktp = mysqli_query($connection, "SELECT * FROM surat_sppktp WHERE nik_masyarakat_sppktp = '$data_nik'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Status Request | Masyarakat</title>
    <link rel="icon" href="../img/logo1.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css2/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <!-- Surat Izin Pernikahan -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Izin Pernikahan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Keperluan</th>
                                            <th>Scan KTP</th>
                                            <th>Scan KK</th>
                                            <th>Scan Akta</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Download Surat</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($connection, "SELECT * FROM surat_sip WHERE nik_masyarakat_sip = '$data_nik'");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        $result_sip = mysqli_query($connection, "SELECT * FROM surat_sip WHERE nik_masyarakat_sip = '$data_nik' limit $halaman_awal, $batas");
                                        ?>
                                        <?php
                                        if ($result_sip->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = $halaman_awal + 1;
                                            while ($row_sip = mysqli_fetch_assoc($result_sip)) :
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sip["nik_masyarakat_sip"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sip["keperluan_sip"] ?>
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sip["scan_ktp_sip"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sip["scan_kk_sip"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sip["scan_akta_sip"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_sip["tgl_req_sip"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sip["status_sip"] == 'acc_rt') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sip["status_sip"] == 'acc_staff') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sip["status_sip"] == 'belum_acc') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>MENUNGGU</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sip["status_sip"] == 'acc_desa') { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI KIRIM</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sip["status_sip"] == 'tolak') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>PENGAJUAN</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI TOLAK</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>
                                                                    SELESAI
                                                                </h5>
                                                                </p>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sip["keterangan_sip"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sip["status_sip"] == 'selesai') { ?>
                                                            <a href="download_sip.php?filename=<?= $row_sip['nama_file_sip']; ?>" class="btn btn-info btn-sm">Download</a>
                                                        <?php } else { ?>
                                                            <h1 style="text-align: center;"> - </h1>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>

                    <!-- Tutup Surat Izin Pernikahan -->

                    <!-- Surat Kelahiran -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Kelahiran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Keperluan</th>
                                            <th>Scan Surat RS</th>
                                            <th>Scan KK</th>
                                            <th>Scan Akta</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Download Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($connection, "SELECT * FROM surat_sk WHERE nik_masyarakat_sk = '$data_nik'");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        $result_sk = mysqli_query($connection, "SELECT * FROM surat_sk WHERE nik_masyarakat_sk = '$data_nik' limit $halaman_awal, $batas");
                                        ?>
                                        <?php
                                        if ($result_sk->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = $halaman_awal + 1;

                                            while ($row_sk = mysqli_fetch_assoc($result_sk)) :
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sk["nik_masyarakat_sk"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sk["keperluan_sk"] ?>
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sk["scan_suratrs_sk"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sk["scan_kk_sk"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sk["scan_ktp_sk"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_sk["tgl_req_sk"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sk["status_sk"] == 'acc_rt') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sk["status_sk"] == 'acc_staff') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sk["status_sk"] == 'belum_acc') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>MENUNGGU</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sk["status_sk"] == 'acc_desa') { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI KIRIM</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sk["status_sk"] == 'tolak') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>PENGAJUAN</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI TOLAK</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>
                                                                    SELESAI
                                                                </h5>
                                                                </p>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sk["keterangan_sk"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sk["status_sk"] == 'selesai') { ?>
                                                            <a href="download_sk.php?filename=<?= $row_sk['nama_file_sk']; ?>" class="btn btn-info btn-sm">Download</a>
                                                        <?php } else { ?>
                                                            <h1 style="text-align: center;"> - </h1>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Tutup Surat Kelahiran -->

                    <!-- Surat Pengantar SKCK -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Pengantar SKCK</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Keperluan</th>
                                            <th>Scan KTP</th>
                                            <th>Scan KK</th>
                                            <th>Scan Akta</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Download Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($connection, "SELECT * FROM surat_skck WHERE nik_masyarakat_skck = '$data_nik'");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        $result_skck = mysqli_query($connection, "SELECT * FROM surat_skck WHERE nik_masyarakat_skck = '$data_nik' limit $halaman_awal, $batas");
                                        ?>
                                        <?php
                                        if ($result_skck->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = $halaman_awal + 1;

                                            while ($row_skck = mysqli_fetch_assoc($result_skck)) :
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_skck["nik_masyarakat_skck"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_skck["keperluan_skck"] ?>
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_skck["scan_ktp_skck"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_skck["scan_kk_skck"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_skck["scan_akta_skck"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_skck["tgl_req_skck"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_skck["status_skck"] == 'acc_rt') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skck["status_skck"] == 'acc_staff') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skck["status_skck"] == 'belum_acc') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>MENUNGGU</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skck["status_skck"] == 'acc_desa') { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI KIRIM</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skck["status_skck"] == 'tolak') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>PENGAJUAN</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI TOLAK</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>
                                                                    SELESAI
                                                                </h5>
                                                                </p>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_skck["keterangan_skck"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_skck["status_skck"] == 'selesai') { ?>
                                                            <a href="download_skck.php?filename=<?= $row_skck['nama_file_skck']; ?>" class="btn btn-info btn-sm">Download</a>
                                                        <?php } else { ?>
                                                            <h1 style="text-align: center;"> - </h1>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Tutup Surat Pengantar SKCK -->

                    <!-- Surat Keterangan Domisili -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Keterangan Domisili</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Keperluan</th>
                                            <th>Scan KTP</th>
                                            <th>Scan KK</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Download Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($connection, "SELECT * FROM surat_skd WHERE nik_masyarakat_skd = '$data_nik'");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        $result_skd = mysqli_query($connection, "SELECT * FROM surat_skd WHERE nik_masyarakat_skd = '$data_nik' limit $halaman_awal, $batas");
                                        ?>
                                        <?php
                                        if ($result_skd->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = $halaman_awal + 1;

                                            while ($row_skd = mysqli_fetch_assoc($result_skd)) :
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_skd["nik_masyarakat_skd"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_skd["keperluan_skd"] ?>
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_skd["scan_ktp_skd"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_skd["scan_kk_skd"] ?>" alt="" width="50" height="50">
                                                    </td>

                                                    <td>
                                                        <?= $row_skd["tgl_req_skd"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_skd["status_skd"] == 'acc_rt') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skd["status_skd"] == 'acc_staff') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skd["status_skd"] == 'belum_acc') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>MENUNGGU</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skd["status_skd"] == 'acc_desa') { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI KIRIM</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_skd["status_skd"] == 'tolak') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>PENGAJUAN</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI TOLAK</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>
                                                                    SELESAI
                                                                </h5>
                                                                </p>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_skd["keterangan_skd"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_skd["status_skd"] == 'selesai') { ?>
                                                            <a href="download_skd.php?filename=<?= $row_skd['nama_file_skd']; ?>" class="btn btn-info btn-sm">Download</a>
                                                        <?php } else { ?>
                                                            <h1 style="text-align: center;"> - </h1>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Tutup Surat Keterangan Domisili -->

                    <!-- Surat Keterangan Usaha -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Keterangan Usaha</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Keperluan</th>
                                            <th>Scan KTP</th>
                                            <th>Scan KK</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Download Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($connection, "SELECT * FROM surat_sku WHERE nik_masyarakat_sku = '$data_nik'");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        $result_sku = mysqli_query($connection, "SELECT * FROM surat_sku WHERE nik_masyarakat_sku = '$data_nik' limit $halaman_awal, $batas");
                                        ?>
                                        <?php
                                        if ($result_sku->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = $halaman_awal + 1;

                                            while ($row_sku = mysqli_fetch_assoc($result_sku)) :
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sku["nik_masyarakat_sku"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sku["keperluan_sku"] ?>
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sku["scan_ktp_sku"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sku["scan_kk_sku"] ?>" alt="" width="50" height="50">
                                                    </td>

                                                    <td>
                                                        <?= $row_sku["tgl_req_sku"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sku["status_sku"] == 'acc_rt') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sku["status_sku"] == 'acc_staff') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sku["status_sku"] == 'belum_acc') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>MENUNGGU</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sku["status_sku"] == 'acc_desa') { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI KIRIM</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sku["status_sku"] == 'tolak') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>PENGAJUAN</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI TOLAK</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>
                                                                    SELESAI
                                                                </h5>
                                                                </p>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sku["keterangan_sku"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sku["status_sku"] == 'selesai') { ?>
                                                            <a href="download_sku.php?filename=<?= $row_sku['nama_file_sku']; ?>" class="btn btn-info btn-sm">Download</a>
                                                        <?php } else { ?>
                                                            <h1 style="text-align: center;"> - </h1>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Tutup Surat Keterangan Usaha -->

                    <!-- Surat Pembuatan KTP -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Pengantar Pembuatan KTP</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Keperluan</th>
                                            <th>Scan KK</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Download Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 5;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data = mysqli_query($connection, "SELECT * FROM surat_sppktp WHERE nik_masyarakat_sppktp = '$data_nik'");
                                        $jumlah_data = mysqli_num_rows($data);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        $result_sppktp = mysqli_query($connection, "SELECT * FROM surat_sppktp WHERE nik_masyarakat_sppktp = '$data_nik' limit $halaman_awal, $batas");
                                        ?>
                                        <?php
                                        if ($result_sppktp->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = $halaman_awal + 1;

                                            while ($row_sppktp = mysqli_fetch_assoc($result_sppktp)) :
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sppktp["nik_masyarakat_sppktp"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sppktp["keperluan_sppktp"] ?>
                                                    </td>
                                                    <td>
                                                        <img src="gambar/<?= $row_sppktp["scan_kk_sppktp"] ?>" alt="" width="50" height="50">
                                                    </td>

                                                    <td>
                                                        <?= $row_sppktp["tgl_req_sppktp"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sppktp["status_sppktp"] == 'acc_rt') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sppktp["status_sppktp"] == 'acc_staff') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sppktp["status_sppktp"] == 'belum_acc') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>MENUNGGU</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI PROSES</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sppktp["status_sppktp"] == 'acc_desa') { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>SEDANG</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI KIRIM</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else if ($row_sppktp["status_sppktp"] == 'tolak') { ?>
                                                            <span style="color: orange; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>PENGAJUAN</h5>
                                                                </p>
                                                                <p>
                                                                <h5>DI TOLAK</h5>
                                                                </p>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="color: green; font-weight: bold; font-style:italic;">
                                                                <p>
                                                                <h5>
                                                                    SELESAI
                                                                </h5>
                                                                </p>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $row_sppktp["keterangan_sppktp"] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row_sppktp["status_sppktp"] == 'selesai') { ?>
                                                            <a href="download_sppktp.php?filename=<?= $row_sppktp['nama_file_sppktp']; ?>" class="btn btn-info btn-sm">Download</a>
                                                        <?php } else { ?>
                                                            <h1 style="text-align: center;"> - </h1>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <!-- <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

   
    <script src="../js1/sb-admin-2.min.js"></script>


    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

 
    <script src="../js1/demo/datatables-demo.js"></script> -->

</body>

</html>