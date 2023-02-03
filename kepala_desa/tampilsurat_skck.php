<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];
$skck_id = $_GET["skck_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = $id");
$row = mysqli_fetch_array($result);

$result_skck = mysqli_query($connection, "SELECT * FROM surat_skck WHERE skck_id=$skck_id");
$row_skck = mysqli_fetch_array($result_skck);

if (isset($_POST['acc'])) {


    $status_skck = $_POST['status_skck'];
    $tanggal_acc_skck = $_POST['tanggal_acc_skck'];


    $result = mysqli_query($connection, "UPDATE surat_skck SET status_skck='$status_skck', tanggal_acc_skck='$tanggal_acc_skck' WHERE skck_id='$skck_id'");

    if ($result) {
?>
        <script>
            alert('Ubah Status berhasil');
            window.location.href = "request_skck.php";
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
    <title>Tampil Surat SKCK | Kepala Desa</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <!-- <link href="../css1/style.css" rel="stylesheet" /> -->
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="width: 20rem; background-color:#f5f5f0;">
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-floating mb-3 mt-5">
                                            <input type="hidden" name="skck_id" value="<?= $row_skck["skck_id"]; ?>" required>
                                            <input type="hidden" name="status_skck" value="acc_desa" required>
                                            <input type="date" name="tanggal_acc_skck" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Tanggal ACC</label>
                                        </div>

                                        <div class="d-grid gap-2 mt-5">
                                            <button name="acc" class="btn btn-success" type="submit">ACC</button>
                                        </div>
                                    </form>
                                    <div class="d-grid gap-2 mt-2">
                                        <a href="request_skck.php" class="btn btn-danger">BATAL</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 " style="font-size:larger;">
                            <table align="center" style="border-bottom: 5px solid #000; padding: 2px;">
                                <tr>
                                    <td><img src="../img/logo1.png" alt="" height="150" width="150"></td>
                                    <td>
                                        <p style="text-align: center;"><b>PEMERINTAHAN KABUPATEN MAJALENGKA</b><br><b>KECAMATAN JATITUJUH</b><br>
                                            <b>KANTOR KEPALA DESA JATITUJUH</b><br><br>
                                            Alamat : Jl. Raya Kibagus Rangin No.01 Kode Pos 45458
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: center;">
                                <b style="text-decoration: underline;">SURAT KETERANGAN BERKELAKUAN BAIK</b><br>Nomor : <?= $row_skck['no_surat_skck']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: justify;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Kepala Desa Jatitujuh Kecamatan Jatitujuh Kabupaten Majalengka dengan ini menerangkan bahwa :
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table align="center">
                                <tr>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;Nama <br>
                                            &nbsp;&nbsp;&nbsp;NIK <br>
                                            &nbsp;&nbsp;&nbsp;Tempat Tanggal Lahir <br>
                                            &nbsp;&nbsp;&nbsp;Jenis Kelamin <br>
                                            &nbsp;&nbsp;&nbsp;Status Perkawinan <br>
                                            &nbsp;&nbsp;&nbsp;Agama <br>
                                            &nbsp;&nbsp;&nbsp;Pekerjaan <br>
                                            &nbsp;&nbsp;&nbsp;Alamat </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: </p>
                                    </td>
                                    <td>
                                        <p>
                                            &nbsp;&nbsp;&nbsp;<?= $row['nama']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['nik']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['tempat_lahir']; ?>, <?= $row['tgl_lahir']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['jenis_kelamin']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['status']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['agama']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['pekerjaan']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['alamat']; ?> </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa berdasarkan data catatan yang ada serta sepanjang
                        pengetahuan kami sampai dengan dikeluarkannya surat keterangan ini orang tersebut:
                    </p>
                    <p style="text-align: justify;">
                        1. Berkelakuan baik dalam kehidupan bermasyarakat.<br>
                        2. Tidak dalam status tahanan yang berwajib.<br>
                        3. Tidak pernah terlibat perkara kriminalitas, dan<br>
                        4. Tidak pernah terlibat dengan penggunaan obat terlarang.
                    </p>
                    <p style="text-align: justify;">
                        Surat keterangan ini dipergunakan untuk persyaratan :
                    </p>
                    <p style="text-align: center;">
                        <b>PEMBUATAN SKCK DARI KEPOLISIAN</b>
                    </p>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini dibuat untuk permohonan surat SKCK
                        dari Kecamatan dan kepada yang berkepentingan harap maklum dan dapat dipergunakan sebagai mana mestinya.
                    </p>
                    <div class="row">
                        <div class="col-md-3 offset-md-8">
                            <p style="text-align: center;">
                                Jatitujuh, <?= $row_skck['tanggal_acc_skck']; ?><br>Kepala Desa Jatitujuh<br><br><br><b>ABDUL KOHAR MUZAKIR</b>
                            </p>
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