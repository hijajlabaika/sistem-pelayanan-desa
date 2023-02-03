<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION['nik'])) {
    header("Location: ../login_masyarakat.php");
} else {
    $data_nama = $_SESSION["nama"];
    $data_nik = $_SESSION["nik"];
}

$id = $_GET["id"];


$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE id = $id");
$row = mysqli_fetch_array($result);

if (isset($_POST['ubah'])) {
    $sql_ubah = "UPDATE data_penduduk SET 
		nama='" . $_POST['nama'] . "',
        tempat_lahir='" . $_POST['tempat_lahir'] . "',
		tgl_lahir='" . $_POST['tgl_lahir'] . "',
        status='" . $_POST['status'] . "',
		jenis_kelamin='" . $_POST['jenis_kelamin'] . "',
		agama='" . $_POST['agama'] . "',
		alamat='" . $_POST['alamat'] . "',
        telepon='" . $_POST['telepon'] . "',
        kewarganegaraan='" . $_POST['kewarganegaraan'] . "',
		pekerjaan='" . $_POST['pekerjaan'] . "'
		WHERE nik='" . $_POST['nik'] . "'";
    $query_ubah = mysqli_query($connection, $sql_ubah);
    mysqli_close($connection);

    if ($query_ubah) {

?>
        <script>
            alert('Ubah Data berhasil');
            window.location.href = "biodata.php";
        </script>
<?php
    } else {
        echo "<script>alert('Ubah Data Gagal. Silahkan coba lagi!')</script>";
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
    <title>Ubah Biodata | Masyarakat</title>
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
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-edit"></i> Ubah Data
                            </h3>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nik" readonly name="nik" value="<?= $row["nik"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row["nama"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" name="tempat_lahir" value="<?= $row["tempat_lahir"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="tgl_lh" name="tgl_lahir" value="<?= $row["tgl_lahir"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <select name="status" id="jekel" class="form-control" required>
                                            <option value="<?= $row["status"]; ?>"><?= $row["status"]; ?></option>
                                            <option value="Lajang">Lajang</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-6">
                                        <select name="jenis_kelamin" id="jekel" class="form-control" required>
                                            <option value="<?= $row["jenis_kelamin"]; ?>"><?= $row["jenis_kelamin"]; ?></option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="agama" name="agama" value="<?= $row["agama"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row["alamat"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Telepon</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $row["telepon"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kewarganegaraan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" name="kewarganegaraan" value="<?= $row["kewarganegaraan"]; ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $row["pekerjaan"]; ?>" required>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" name="ubah" value="Simpan" class="btn btn-info">
                                <a href="biodata.php" title="Kembali" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
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