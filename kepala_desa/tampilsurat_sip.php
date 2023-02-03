<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];
$sip_id = $_GET["sip_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik=$id");
$row = mysqli_fetch_array($result);

$result_sip = mysqli_query($connection, "SELECT * FROM surat_sip WHERE sip_id=$sip_id");
$row_sip = mysqli_fetch_array($result_sip);

if (isset($_POST['acc'])) {


    $status_sip = $_POST['status_sip'];
    $tanggal_acc = $_POST['tanggal_acc'];


    $result1 = mysqli_query($connection, "UPDATE surat_sip SET status_sip='$status_sip', tanggal_acc='$tanggal_acc' WHERE sip_id='$sip_id'");

    if ($result1) {
?>
        <script>
            alert('Ubah Status berhasil');
            window.location.href = "request_sip.php";
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
    <title>Tampil Surat SIP | Kepala Desa</title>
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
                                            <input type="hidden" name="sip_id" value="<?= $row_sip["sip_id"]; ?>" required>
                                            <input type="hidden" name="status_sip" value="acc_desa" required>
                                            <input type="date" name="tanggal_acc" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Tanggal ACC</label>
                                        </div>

                                        <div class="d-grid gap-2 mt-5">
                                            <button name="acc" class="btn btn-success" type="submit">ACC</button>
                                        </div>
                                    </form>
                                    <div class="d-grid gap-2 mt-2">
                                        <a href="request_sip.php" class="btn btn-danger">BATAL</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table>

                                <tr>
                                    <td>
                                        <P><b>KANTOR DESA/KELURAHAN</b><br>
                                            <b>KECAMATAN</b><br>
                                            <b>KABUPATEN</b>
                                        </P>
                                    </td>
                                    <td>
                                        <p>:<br>:<br>:</p>
                                    </td>
                                    <td>
                                        <P><b>JATITUJUH</b><br>
                                            <b>JATITUJUH</b><br>
                                            <b>MAJALENGKA</b>
                                        </P>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: center;">
                                <b style="text-decoration: underline;">SURAT KETERANGAN UNTUK NIKAH</b><br>Nomor : <?= $row_sip['no_surat_sip']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: justify;">
                                Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa:
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 offset-md-1">
                            <table>
                                <tr>
                                    <td>
                                        <p>1. &nbsp;&nbsp;&nbsp;Nama Lengkap dan Alias <br>
                                            2. &nbsp;&nbsp;&nbsp;Nomor Induk Kependudukan (NIK) <br>
                                            3. &nbsp;&nbsp;&nbsp;Jenis Kelamin <br>
                                            4. &nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir <br>
                                            5. &nbsp;&nbsp;&nbsp;Kewarganegaraan <br>
                                            6. &nbsp;&nbsp;&nbsp;Agama <br>
                                            7. &nbsp;&nbsp;&nbsp;Pekerjaan <br>
                                            8. &nbsp;&nbsp;&nbsp;Alamat <br>
                                            9. &nbsp;&nbsp;&nbsp;Status Perkawinan</p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;:</p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;<?= $row['nama']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['nik']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['jenis_kelamin']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['tempat_lahir']; ?>, <?= $row['tgl_lahir']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['kewarganegaraan']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['agama']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['pekerjaan']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['alamat']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row['status']; ?></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: justify;">
                                Adalah benar anak dari perkawinan seorang pria :
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 offset-md-1">

                            <table>
                                <tr>
                                    <td>
                                        <p>1. &nbsp;&nbsp;&nbsp;Nama Lengkap dan Alias <br>
                                            2. &nbsp;&nbsp;&nbsp;Nomor Induk Kependudukan (NIK) <br>
                                            3. &nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir <br>
                                            4. &nbsp;&nbsp;&nbsp;Kewarganegaraan <br>
                                            5. &nbsp;&nbsp;&nbsp;Agama <br>
                                            6. &nbsp;&nbsp;&nbsp;Pekerjaan <br>
                                            7. &nbsp;&nbsp;&nbsp;Alamat </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;<?= $row_sip['nama_ayah']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['nik_ayah']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['tempat_lahir_ayah']; ?>, <?= $row_sip['tgl_lahir_ayah']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['kewarganegaraan_ayah']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['agama_ayah']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['pekerjaan_ayah']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['alamat_ayah']; ?> </p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: justify;">
                                Dengan Seorang Wanita :
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 offset-md-1">

                            <table>
                                <tr>
                                    <td>
                                        <p>1. &nbsp;&nbsp;&nbsp;Nama Lengkap dan Alias <br>
                                            2. &nbsp;&nbsp;&nbsp;Nomor Induk Kependudukan (NIK) <br>
                                            3. &nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir <br>
                                            4. &nbsp;&nbsp;&nbsp;Kewarganegaraan <br>
                                            5. &nbsp;&nbsp;&nbsp;Agama <br>
                                            6. &nbsp;&nbsp;&nbsp;Pekerjaan <br>
                                            7. &nbsp;&nbsp;&nbsp;Alamat </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;<?= $row_sip['nama_ibu']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['nik_ibu']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['tempat_lahir_ibu']; ?>, <?= $row_sip['tgl_lahir_ibu']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['kewarganegaraan_ibu']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['agama_ibu']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['pekerjaan_ibu']; ?> <br>
                                            &nbsp;&nbsp;&nbsp;<?= $row_sip['alamat_ibu']; ?> </p>
                                    </td>
                                </tr>


                            </table>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: justify;">
                                Demikian surat pengantar ini dibuat mengingat sumpah jabatan dan dapat digunakan sebagaimana mestinya.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 offset-md-8">
                            <p style="text-align: center;">
                                Jatitujuh, <?= $row_sip['tanggal_acc']; ?><br>Kepala Desa Jatitujuh<br><br><br><b>ABDUL KOHAR MUZAKIR</b>
                            </p>
                        </div>
                    </div>
                </div>


            </main>

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