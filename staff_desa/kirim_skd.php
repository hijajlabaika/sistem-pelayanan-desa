<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];

$result = mysqli_query($connection, "SELECT * FROM surat_skd WHERE skd_id = $id");
$row = mysqli_fetch_array($result);

if (isset($_POST['kirim'])) {


    $status_skd = $_POST['status_skd'];
    $keterangan_skd = $_POST['keterangan_skd'];
    $nama_file_skd = $_FILES["kirim_skd"]['name'];

    $direktori = "../download/";

    move_uploaded_file($_FILES['kirim_skd']['tmp_name'], $direktori . $nama_file_skd);

    $result = mysqli_query($connection, "UPDATE surat_skd SET status_skd='$status_skd', keterangan_skd='$keterangan_skd', nama_file_skd='$nama_file_skd' WHERE skd_id='$id'");

    if ($result) {
?>
        <script>
            alert('Kirim berhasil');
            window.location.href = "cetak_surat.php";
        </script>
<?php
    } else {
        echo "<script>alert('Ubah Status Request Gagal. Silahkan coba lagi!')</script>";
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
    <title>Kirim SKD | Staff Desa</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css1/style.css" rel="stylesheet" />
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
                        <a class="nav-link" href="halkepala_desa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="data_user.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
                            Data User

                        </a>
                        <a class="nav-link collapsed" href="request_pengajuanstaff.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
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
                <div class="card mb-3 position-absolute top-50 start-50 translate-middle" style="max-width: 540px;">
                    <div class="row g-0 text-center">

                        <div class="col-md-12">
                            <div class="card-body">
                                <h2 class="card-title">Kirim Surat</h2>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 mt-5">
                                        <input type="hidden" name="skd_id" value="<?= $row["skd_id"]; ?>" required>
                                        <input type="hidden" name="status_skd" value="selesai" required>
                                        <input type="hidden" name="keterangan_skd" value="Selamat pengajuan surat sudah selesai. Silahkan klik download untuk mendapatkan suratnya." required>
                                        <input type="file" name="kirim_skd" class="form-control" id="floatingInput" placeholder="name@example.com" required>

                                    </div>

                                    <div class="d-grid gap-2 mt-5">
                                        <button name="kirim" class="btn btn-success" type="submit">KIRIM</button>
                                    </div>
                                </form>
                                <div class="d-grid gap-2 mt-2">
                                    <a href="cetak_surat.php" class="btn btn-danger">BATAL</a>
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