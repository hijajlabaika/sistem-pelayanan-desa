<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}


$id = $_GET["id"];
$no = 0;
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun = date('Y');
$no_sip = "427.21/";
$nomor = "/DS/" . $romawi . "/" . $tahun;

$result = mysqli_query($connection, "SELECT * FROM surat_sip WHERE sip_id = $id");
$row = mysqli_fetch_array($result);

$no_surat_sip = $no_sip . sprintf("%03s", $id) . $nomor;

if (isset($_POST['ubah'])) {

    $nik_masyarakat_sip = $_POST['nik_masyarakat_sip'];
    $status_sip = $_POST['status_sip'];
    $keterangan_sip = $_POST['keterangan_sip'];
    $no_surat_sip = $_POST['no_surat_sip'];


    $result = mysqli_query($connection, "UPDATE surat_sip SET status_sip='$status_sip', keterangan_sip='$keterangan_sip', no_surat_sip='$no_surat_sip' WHERE sip_id='$id'");

    if ($result) {
?>
        <script>
            alert('Ubah Status berhasil');
            window.location.href = "request_pengajuanstaff.php";
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
    <title>Detail SIP | Staff Desa</title>
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
                        <a class="nav-link" href="halrt.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="data_user.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
                            Data User

                        </a>
                        <a class="nav-link collapsed" href="request_pengajuan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit"></i> Detail Data
                        </h3>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-4">
                                    <input type="hidden" class="form-control" id="nik" readonly name="id" value="<?= $row["sip_id"]; ?>" required>
                                    <input type="text" class="form-control" id="nik" readonly name="nik_masyarakat_sip" value="<?= $row["nik_masyarakat_sip"]; ?>" required>
                                </div>

                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nama" readonly name="keperluan_sip" value="<?= $row["keperluan_sip"]; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KTP</label>
                                <div class="col-sm-3">
                                    <img src="../masyarakat/gambar/<?= $row["scan_ktp_sip"] ?>" alt="" width="250" height="250">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KK</label>
                                <div class="col-sm-3">
                                    <img src="../masyarakat/gambar/<?= $row["scan_kk_sip"] ?>" alt="" width="250" height="250">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan Akta</label>
                                <div class="col-sm-3">
                                    <img src="../masyarakat/gambar/<?= $row["scan_akta_sip"] ?>" alt="" width="250" height="250">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Request</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agama" name="tgl_req_sip" readonly value="<?= $row["tgl_req_sip"]; ?>" required>
                                </div>
                            </div>
                            <br>

                            <input type="hidden" name="status_sip" value="acc_staff" required>
                            <input type="hidden" name="keterangan_sip" value="Data lengkap! Surat sedang di proses oleh kepala desa" required>
                            <input type="hidden" name="no_surat_sip" value="<?= $no_surat_sip; ?>" required>


                        </div>
                        <div class="card-footer">
                            <input type="submit" name="ubah" value="ACC" class="btn btn-success">
                            <a href="request_pengajuanstaff.php" title="Kembali" class="btn btn-secondary">Batal</a>
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