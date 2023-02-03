<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$result_sip = mysqli_query($connection, "SELECT * FROM surat_sip WHERE status_sip = 'acc_rt'");
$result_sk = mysqli_query($connection, "SELECT * FROM surat_sk WHERE status_sk = 'acc_rt'");
$result_skck = mysqli_query($connection, "SELECT * FROM surat_skck WHERE status_skck = 'acc_rt'");
$result_skd = mysqli_query($connection, "SELECT * FROM surat_skd WHERE status_skd = 'acc_rt'");
$result_sku = mysqli_query($connection, "SELECT * FROM surat_sku WHERE status_sku = 'acc_rt'");
$result_sppktp = mysqli_query($connection, "SELECT * FROM surat_sppktp WHERE status_sppktp = 'acc_rt'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Request Surat | Staff Desa</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css2/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($result_sip->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = 1;
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
                                                        <img src="../masyarakat/gambar/<?= $row_sip["scan_ktp_sip"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_sip["scan_kk_sip"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_sip["scan_akta_sip"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_sip["tgl_req_sip"] ?>
                                                    </td>
                                                    <td>
                                                        <a href="detailstaff_sip.php?id=<?= $row_sip["sip_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_sk->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = 1;

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
                                                        <img src="../masyarakat/gambar/<?= $row_sk["scan_suratrs_sk"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_sk["scan_kk_sk"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_sk["scan_ktp_sk"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_sk["tgl_req_sk"] ?>
                                                    </td>
                                                    <td>
                                                        <a href="detailstaff_sk.php?id=<?= $row_sk["sk_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_skck->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = 1;

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
                                                        <img src="../masyarakat/gambar/<?= $row_skck["scan_ktp_skck"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_skck["scan_kk_skck"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_skck["scan_akta_skck"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_skck["tgl_req_skck"] ?>
                                                    </td>

                                                    <td>
                                                        <a href="detailstaff_skck.php?id=<?= $row_skck["skck_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_skd->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = 1;

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
                                                        <img src="../masyarakat/gambar/<?= $row_skd["scan_ktp_skd"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_skd["scan_kk_skd"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_skd["tgl_req_skd"] ?>
                                                    </td>

                                                    <td>
                                                        <a href="detailstaff_skd.php?id=<?= $row_skd["skd_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_sku->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = 1;

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
                                                        <img src="../masyarakat/gambar/<?= $row_sku["scan_ktp_sku"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <img src="../masyarakat/gambar/<?= $row_sku["scan_kk_sku"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_sku["tgl_req_sku"] ?>
                                                    </td>

                                                    <td>
                                                        <a href="detailstaff_sku.php?id=<?= $row_sku["sku_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_sppktp->num_rows == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">No data avaible in table</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $no = 1;

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
                                                        <img src="../masyarakat/gambar/<?= $row_sppktp["scan_kk_sppktp"] ?>" alt="" width="50" height="50">
                                                    </td>
                                                    <td>
                                                        <?= $row_sppktp["tgl_req_sppktp"] ?>
                                                    </td>

                                                    <td>
                                                        <a href="detailstaff_sppktp.php?id=<?= $row_sppktp["sppktp_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endwhile; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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