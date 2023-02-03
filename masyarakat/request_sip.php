<?php

use LDAP\Result;

session_start();

include '../koneksi.php';

if (!isset($_SESSION['nik'])) {
    header("Location: ../login_masyarakat.php");
} else {
    $data_nama = $_SESSION["nama"];
    $data_nik = $_SESSION["nik"];
    $data_alamat = $_SESSION["alamat"];
}

if (isset($_POST['submit'])) {
    date_default_timezone_set("Asia/Jakarta");

    $nik_masyarakat_sip = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nik_masyarakat_sip"]));
    $nama_sip = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nama_sip"]));
    $alamat_sip = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["alamat_sip"]));
    $keperluan_sip = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["keperluan_sip"]));
    $tgl_request_sip = Date("Y-m-d H:i:sa");
    $nama_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nama_ayah"]));
    $nik_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nik_ayah"]));
    $tempat_lahir_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["tempat_lahir_ayah"]));
    $tgl_lahir_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["tgl_lahir_ayah"]));
    $kewarganegaraan_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["kewarganegaraan_ayah"]));
    $agama_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["agama_ayah"]));
    $pekerjaan_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["pekerjaan_ayah"]));
    $alamat_ayah = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["alamat_ayah"]));
    $nama_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nama_ibu"]));
    $nik_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["nik_ibu"]));
    $tempat_lahir_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["tempat_lahir_ibu"]));
    $tgl_lahir_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["tgl_lahir_ibu"]));
    $kewarganegaraan_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["kewarganegaraan_ibu"]));
    $agama_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["agama_ibu"]));
    $pekerjaan_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["pekerjaan_ibu"]));
    $alamat_ibu = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["alamat_ibu"]));

    //mulai proses simpan data
    $nama_file_ktp = $_FILES["scan_ktp_sip"]['name'];
    $nama_file_kk = $_FILES["scan_kk_sip"]['name'];
    $nama_file_akta = $_FILES["scan_akta_sip"]['name'];

    $direktori = "gambar/";

    move_uploaded_file($_FILES['scan_ktp_sip']['tmp_name'], $direktori . $nama_file_ktp);
    move_uploaded_file($_FILES['scan_kk_sip']['tmp_name'], $direktori . $nama_file_kk);
    move_uploaded_file($_FILES['scan_akta_sip']['tmp_name'], $direktori . $nama_file_akta);

    $result = mysqli_query($connection, "INSERT INTO surat_sip (nik_masyarakat_sip, nama_sip, alamat_sip, keperluan_sip, 
    scan_ktp_sip, scan_kk_sip, scan_akta_sip, tgl_req_sip, nama_ayah, nik_ayah, tempat_lahir_ayah, tgl_lahir_ayah,
    kewarganegaraan_ayah, agama_ayah, pekerjaan_ayah, alamat_ayah, nama_ibu, nik_ibu, tempat_lahir_ibu,
    tgl_lahir_ibu, kewarganegaraan_ibu, agama_ibu, pekerjaan_ibu, alamat_ibu)
                    VALUES ('$nik_masyarakat_sip', '$nama_sip', '$alamat_sip', '$keperluan_sip', '$nama_file_ktp', '$nama_file_kk', '$nama_file_akta', '$tgl_request_sip',
                    '$nama_ayah', '$nik_ayah', '$tempat_lahir_ayah', '$tgl_lahir_ayah', '$kewarganegaraan_ayah',
                    '$agama_ayah', '$pekerjaan_ayah', '$alamat_ayah', '$nama_ibu', '$nik_ibu', '$tempat_lahir_ibu',
                    '$tgl_lahir_ibu', '$kewarganegaraan_ibu', '$agama_ibu', '$pekerjaan_ibu', '$alamat_ibu')");

?>
    <script>
        alert('Request Surat Berhasil');
        window.location.href = "menu_masyarakat.php";
    </script>
<?php
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
    <title>Request SIP | Masyarakat</title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit"></i> Request SIP
                        </h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nik" readonly name="nik_masyarakat_sip" value="<?php echo $data_nik; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="nik" readonly name="alamat_sip" value="<?php echo $data_alamat; ?>" required>
                                    <input type="text" class="form-control" id="nik" readonly name="nama_sip" value="<?php echo $data_nama; ?>" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keperluan_sip" name="keperluan_sip" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KTP</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="scan_ktp_sip" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan KK</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="scan_kk_sip" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Scan Akta</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="scan_akta_sip" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK Ayah</label>
                                <div class="col-sm-6">
                                    <input type="number" minlength="16" maxlength="16" class="form-control" name="nik_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tempat Lahir Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tempat_lahir_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir Ayah</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="tgl_lahir_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kewarganegaraan Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="kewarganegaraan_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Agama Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="agama_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat Ayah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="alamat_ayah" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK Ibu</label>
                                <div class="col-sm-6">
                                    <input type="number" minlength="16" maxlength="16" class="form-control" name="nik_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tempat Lahir Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tempat_lahir_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir Ibu</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="tgl_lahir_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kewarganegaraan Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="kewarganegaraan_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Agama Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="agama_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat Ibu</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="alamat_ibu" id="inputGroupFile02" required>
                                </div>
                            </div>
                            <br>


                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" value="Request" class="btn btn-info">
                            <a href="menu_masyarakat.php" title="Kembali" class="btn btn-secondary">Batal</a>
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