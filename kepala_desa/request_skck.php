<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$result_skck = mysqli_query($connection, "SELECT * FROM surat_skck WHERE status_skck = 'acc_staff'");

if (isset($_POST['acc'])) {

    $skck_id = $_POST['skck_id'];
    $status_skck = $_POST['status_skck'];


    $result = mysqli_query($connection, "UPDATE surat_skck SET status_skck='$status_skck' WHERE skck_id='$skck_id'");

    if ($result) {
?>
        <script>
            alert('ACC berhasil');
            window.location.href = "request_skck.php";
        </script>
<?php
    } else {
        echo "<script>alert('ACC Gagal. Silahkan coba lagi!')</script>";
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
    <title>Request Surat SKCK | Kepala Desa</title>
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
        <a class="navbar-brand ps-3" href="halkepala_desa.php">Desa Jatitujuh</a>
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
                        <a class="nav-link" href="halkepala_desa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <div class="dropdown">
                            <a class="nav-link collapsed dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Laporan Bulanan
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="laporan_sip.php">Laporan SIP</a></li>
                                <li><a class="dropdown-item" href="laporan_sk.php">Laporan SK</a></li>
                                <li><a class="dropdown-item" href="laporan_skck.php">Laporan SKCK</a></li>
                                <li><a class="dropdown-item" href="laporan_skd.php">Laporan SKD</a></li>
                                <li><a class="dropdown-item" href="laporan_sku.php">Laporan SKU</a></li>
                                <li><a class="dropdown-item" href="laporan_sppktp.php">Laporan SPPKTP</a></li>
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
                            <h6 class="m-0 font-weight-bold text-primary">Surat Pengantar SKCK</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php
                                        while ($row_skck = mysqli_fetch_assoc($result_skck)) : ?>

                                            <tr>
                                                <td>
                                                    <?= $no; ?>
                                                </td>
                                                <td>
                                                    <?= $row_skck["nik_masyarakat_skck"] ?>
                                                </td>
                                                <td>
                                                    <?php if ($row_skck["status_skck"] == 'acc_staff') { ?>
                                                        <span style="color: green;">Sudah di ACC Staff</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="tampilsurat_skck.php?id=<?= $row_skck["nik_masyarakat_skck"]; ?> && skck_id=<?= $row_skck["skck_id"]; ?>" title="Detail" class="btn btn-info btn-sm">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endwhile; ?>
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

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js1/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js1/demo/datatables-demo.js"></script>
</body>

</html>