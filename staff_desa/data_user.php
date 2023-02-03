<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$result = mysqli_query($connection, "SELECT * FROM data_penduduk");

if (isset($_POST['edit'])) {
    $nama = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['nama']));
    $jenis_kelamin = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['jenis_kelamin']));
    $alamat = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['alamat']));
    $telepon = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['telepon']));
    $nik = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['nik']));

    $sql_ubah = "UPDATE data_penduduk SET 
		nama='$nama',
		jenis_kelamin='$jenis_kelamin',
		alamat='$alamat',
        telepon='$telepon'
		WHERE nik='$nik'";
    $query_ubah = mysqli_query($connection, $sql_ubah);
    mysqli_close($connection);

    if ($query_ubah) {

?>
        <script>
            alert('Ubah Data berhasil');
            window.location.href = "data_user.php";
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
    <title>Data User | Staff Desa</title>
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
                        <a class="nav-link" href="halstaff_desa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="data_user.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
                            Data User

                        </a>
                        <a class="nav-link collapsed" href="request_pengajuanstaff.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bullhorn"></i></div>
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
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pemohon</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) : ?>

                                            <tr>
                                                <td>
                                                    <?= $no; ?>
                                                </td>
                                                <td>
                                                    <?= $row["nik"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["nama"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["jenis_kelamin"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["alamat"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["telepon"] ?>
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?= $row['id']; ?>">Edit</a>
                                                    <div class="modal fade" id="modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="" method="POST">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlInput1">NIK</label>
                                                                            <input type="text" class="form-control" name="nik" value="<?= $row["nik"] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlInput1">Nama</label>
                                                                            <input type="text" class="form-control" name="nama" value="<?= $row["nama"] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                                                            <select name="jenis_kelamin" class="form-control" required>
                                                                                <option value="<?= $row["jenis_kelamin"]; ?>"><?= $row["jenis_kelamin"]; ?></option>
                                                                                <option value="Laki - Laki">Laki - Laki</option>
                                                                                <option value="Perempuan">Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlInput1">Alamat</label>
                                                                            <input type="text" class="form-control" name="alamat" value="<?= $row["alamat"] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlInput1">Telepon</label>
                                                                            <input type="text" class="form-control" name="telepon" value="<?= $row["telepon"] ?>">
                                                                        </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="hapus_user.php?id=<?= $row["id"]; ?>" title="Detail" onclick="return confirm('Apakah yakin akan dihapus');" class="btn btn-danger btn-sm">
                                                        Hapus
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



                <!-- /.card-body-SIP -->
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