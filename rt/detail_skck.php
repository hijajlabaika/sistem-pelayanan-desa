<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];


$result = mysqli_query($connection, "SELECT * FROM surat_skck WHERE skck_id = $id");
$row = mysqli_fetch_array($result);

if (isset($_POST['ubah'])) {

    $nik_masyarakat_skck = $_POST['nik_masyarakat_skck'];
    $status_skck = $_POST['status_skck'];
    $keterangan_skck = $_POST['keterangan_skck'];


    $result = mysqli_query($connection, "UPDATE surat_skck SET status_skck='$status_skck', keterangan_skck='$keterangan_skck' WHERE skck_id='$id'");

    if ($result) {
?>
        <script>
            alert('Ubah Status berhasil');
            window.location.href = "request_pengajuan.php";
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
    <title>Detail SKCK | RT</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: green;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="halrt.php">Desa Jatitujuh</a>
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
                        <a class="nav-link collapsed" href="request_pengajuan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bullhorn"></i></div>
                            Request Pengajuan

                        </a>
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
                                    <input type="hidden" class="form-control" id="nik" readonly name="id" value="<?= $row["skck_id"]; ?>" required>
                                    <input type="text" class="form-control" id="nik" readonly name="nik_masyarakat_skck" value="<?= $row["nik_masyarakat_skck"]; ?>" required>
                                </div>

                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nama" readonly name="keperluan_skck" value="<?= $row["keperluan_skck"]; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KTP</label>
                                <div class="col-sm-3">
                                    <img src="../masyarakat/gambar/<?= $row["scan_ktp_skck"] ?>" alt="" width="250" height="250">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KK</label>
                                <div class="col-sm-3">
                                    <img src="../masyarakat/gambar/<?= $row["scan_kk_skck"] ?>" alt="" width="250" height="250">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan Akta</label>
                                <div class="col-sm-3">
                                    <img src="../masyarakat/gambar/<?= $row["scan_akta_skck"] ?>" alt="" width="250" height="250">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Request</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="agama" name="tgl_req_skck" readonly value="<?= $row["tgl_req_skck"]; ?>" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <h3>Ubah Status Request</h3>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Request</label>
                                <div class="col-sm-6">
                                    <select name="status_skck" id="jekel" class="form-control">
                                        <option value="">-- Status Request --</option>
                                        <option value="tolak">Tidak ACC</option>
                                        <option value="acc_rt">ACC</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-6">
                                    <select name="keterangan_skck" id="color" class="form-control" required>
                                        <option value="">Kirim Pesan ....</option>
                                        <option value="Data tidak lengkap! Silahkan ajukan kembali.">Data tidak lengkap! Silahkan ajukan kembali.</option>
                                        <option value="Data lengkap! Pengajuan sedang di proses oleh desa">Data lengkap! Pengajuan sedang di proses oleh desa</option>
                                    </select>
                                </div>
                            </div>
                            <br>


                        </div>
                        <div class="card-footer">
                            <input type="submit" name="ubah" value="Simpan" class="btn btn-info">
                            <a href="request_pengajuan.php" title="Kembali" class="btn btn-secondary">Batal</a>
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