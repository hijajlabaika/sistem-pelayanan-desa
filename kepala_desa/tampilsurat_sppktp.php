<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];
$sppktp_id = $_GET["sppktp_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = $id");
$row = mysqli_fetch_array($result);

$result_sppktp = mysqli_query($connection, "SELECT * FROM surat_sppktp WHERE sppktp_id=$sppktp_id");
$row_sppktp = mysqli_fetch_array($result_sppktp);

if (isset($_POST['acc'])) {


    $status_sppktp = $_POST['status_sppktp'];
    $tanggal_acc_sppktp = $_POST['tanggal_acc_sppktp'];


    $result = mysqli_query($connection, "UPDATE surat_sppktp SET status_sppktp='$status_sppktp', tanggal_acc_sppktp='$tanggal_acc_sppktp' WHERE sppktp_id='$sppktp_id'");

    if ($result) {
?>
        <script>
            alert('Ubah Status berhasil');
            window.location.href = "request_sppktp.php";
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
    <title>Tampil Surat SPPKTP | Kepala Desa</title>
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
                                            <input type="hidden" name="sppktp_id" value="<?= $row_sppktp["sppktp_id"]; ?>" required>
                                            <input type="hidden" name="status_sppktp" value="acc_desa" required>
                                            <input type="date" name="tanggal_acc_sppktp" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="floatingInput">Tanggal ACC</label>
                                        </div>

                                        <div class="d-grid gap-2 mt-5">
                                            <button name="acc" class="btn btn-success" type="submit">ACC</button>
                                        </div>
                                    </form>
                                    <div class="d-grid gap-2 mt-2">
                                        <a href="request_sppktp.php" class="btn btn-danger">BATAL</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
                            <table>
                                <tr>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;Nomor <br>
                                            &nbsp;&nbsp;&nbsp;Lampiran <br>
                                            &nbsp;&nbsp;&nbsp;Perihal </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: </p>
                                    </td>
                                    <td>
                                        <p>
                                            &nbsp;&nbsp;&nbsp; <?= $row_sppktp['no_surat_sppktp'] ?><br>
                                            &nbsp;&nbsp;&nbsp; -<br>
                                            &nbsp;&nbsp;&nbsp; Permohonan Pembuatan KTP</p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Jatitujuh, <?= $row_sppktp['tanggal_acc_sppktp']; ?></p>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Yth. Kepada <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Kepala Dinas Kependudukan <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Dan Pencatatan Sipil <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Kabupaten Majalengka <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Di <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan Hormat, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubung dengan adanya edaran dari Kepala Dinas Kependudukan Dan Pencatatan Sipil
                        Kabupaten Majalengka, tentang tertibnya permohonan pembuatan Dokumen kependudukan
                    </p>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bersama ini kami sampaikan surat Permohonan Pembuatan
                        Karta Tanda Penduduk (KTP) dari Desa/wilayah Jatitujuh Kecamatan Jatitujuh
                        Kabupaten Majalengka adapun nama pemohon serta identitas kependudukan terlampir.
                    </p>
                    <p style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat permohonan ini kami buat atas
                        kerja samanya kami haturkan terima kasih.
                    </p>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-8">
                            <p style="text-align: center;">
                                Mengetahui,<br>Kepala Desa Jatitujuh<br><br><br><b>ABDUL KOHAR MUZAKIR</b>
                            </p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
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
                            <table>
                                <tr>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;Nomor <br>
                                            &nbsp;&nbsp;&nbsp;Lampiran <br>
                                            &nbsp;&nbsp;&nbsp;Perihal </p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;: </p>
                                    </td>
                                    <td>
                                        <p>
                                            &nbsp;&nbsp;&nbsp; <?= $row_sppktp['no_surat_sppktp'] ?><br>
                                            &nbsp;&nbsp;&nbsp; -<br>
                                            &nbsp;&nbsp;&nbsp; Permohonan Pembuatan KTP</p>
                                    </td>
                                    <td>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Jatitujuh, <?= $row_sppktp['tanggal_acc_sppktp']; ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: center; text-decoration:underline;"><b>
                                    DAFTAR NAMA USULAN PENCETAKAN KARTU TANDA PENDUDUK
                                </b></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table align="center" class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Pemohon</th>
                                    <th>Rt/Rw</th>
                                    <th>Alamat</th>
                                    <th>Jenis Perubahan</th>
                                    <th>Ket</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><?= $row['nik']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row_sppktp['rt_rw']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row_sppktp['keperluan_sppktp']; ?></td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-8">
                            <p style="text-align: center;">
                                Mengetahui,<br>Kepala Desa Jatitujuh<br><br><br><b>ABDUL KOHAR MUZAKIR</b>
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