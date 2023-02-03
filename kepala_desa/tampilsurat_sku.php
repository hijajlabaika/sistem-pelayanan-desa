<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];
$sku_id = $_GET["sku_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = $id");
$row = mysqli_fetch_array($result);

$result_sku = mysqli_query($connection, "SELECT * FROM surat_sku WHERE sku_id=$sku_id");
$row_sku = mysqli_fetch_array($result_sku);

if (isset($_POST['acc'])) {


    $status_sku = $_POST['status_sku'];
    $tanggal_acc_sku = $_POST['tanggal_acc_sku'];


    $result2 = mysqli_query($connection, "UPDATE surat_sku SET status_sku='$status_sku', tanggal_acc_sku='$tanggal_acc_sku' WHERE sku_id='$sku_id'");

    if ($result2) {
?>
        <script>
            alert('Ubah Status berhasil');
            window.location.href = "request_sku.php";
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
    <title>Tampil Surat SKU | Kepala Desa</title>
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
                                            <input type="hidden" name="sku_id" value="<?= $row_sku["sku_id"]; ?>" required>
                                            <input type="hidden" name="status_sku" value="acc_desa" required>
                                            <input type="date" name="tanggal_acc_sku" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Tanggal ACC</label>
                                        </div>

                                        <div class="d-grid gap-2 mt-5">
                                            <button name="acc" class="btn btn-success" type="submit">ACC</button>
                                        </div>
                                    </form>
                                    <div class="d-grid gap-2 mt-2">
                                        <a href="request_sku.php" class="btn btn-danger">BATAL</a>
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
                                <b style="text-decoration: underline;">SURAT KETERANGAN USAHA</b><br>Nomor : <?= $row_sku['no_surat_sku']; ?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama tersebut di atas adalah benar penduduk Desa Jatitujuh
                        Kecamatan Jatitujuh Kabupaten Majalengka dan benar mempunyai usaha, dan berdiri sejak tahun <?= $row_sku['tahun_berdiri']; ?>
                    </p>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sampai saat sekarang :
                    </p>
                    <p style="text-align: center;">
                        <b>"<?= $row_sku['nama_usaha']; ?>"</b>
                    </p>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian keterangan ini dibuat sebenarnya harap yang berkepentingan
                        maklum serta untuk dapat dipergunakan sebagaimana mestinya.
                    </p>
                    <div class="row">
                        <div class="col-md-3 offset-md-8">
                            <p style="text-align: center;">
                                Jatitujuh, <?= $row_sku['tanggal_acc_sku']; ?><br>Kepala Desa Jatitujuh<br><br><br><b>ABDUL KOHAR MUZAKIR</b>
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