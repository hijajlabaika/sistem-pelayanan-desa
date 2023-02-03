<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$hari = date("l, d F Y");
$id = $_GET["id"];
$sk_id = $_GET["sk_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = $id");
$row = mysqli_fetch_array($result);

$result_sk = mysqli_query($connection, "SELECT * FROM surat_sk WHERE sk_id=$sk_id");
$row_sk = mysqli_fetch_array($result_sk);

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SK - <?= $row_sk['nama_sk'] ?> - <?= $row_sk['no_surat_sk'] ?></title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 kop" style="font-size:larger;">
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
                    <b style="text-decoration: underline;">SURAT KETERANGAN KELAHIRAN</b><br>Nomor : <?= $row_sk['no_surat_sk']; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="text-align: justify;">
                    Yang bertanda tangan di bawah ini Kepala Desa Jatitujuh Kecamatan Jatitujuh Kabupaten Majalengka :
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>


                    <tr>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;Hari Tanggal <br>
                                &nbsp;&nbsp;&nbsp;Di</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;:</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;<?= $hari; ?> <br>
                                &nbsp;&nbsp;Jatitujuh</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;Telah Lahir Seorang Anak Bernama</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;<?= $row_sk['nama_anak']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;Dari seorang ibu <br>
                                &nbsp;&nbsp;&nbsp;Nama <br>
                                &nbsp;&nbsp;&nbsp;Tanggal Lahir <br>
                                &nbsp;&nbsp;&nbsp;Agama</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;:</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;<br>
                                &nbsp;&nbsp;&nbsp;<?= $row_sk['nama_istri']; ?> <br>
                                &nbsp;&nbsp;&nbsp;<?= $row_sk['tgl_lahir_istri']; ?> <br>
                                &nbsp;&nbsp;&nbsp;<?= $row_sk['agama_istri']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;Istri dari <br>
                                &nbsp;&nbsp;&nbsp;Nama <br>
                                &nbsp;&nbsp;&nbsp;Tanggal Lahir <br>
                                &nbsp;&nbsp;&nbsp;Agama <br>
                                &nbsp;&nbsp;&nbsp;Pekerjaan <br>
                                &nbsp;&nbsp;&nbsp;Alamat</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;: <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;:</p>
                        </td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp; <br>
                                &nbsp;&nbsp;&nbsp;<?= $row['nama']; ?> <br>
                                &nbsp;&nbsp;&nbsp;<?= $row['tgl_lahir']; ?> <br>
                                &nbsp;&nbsp;&nbsp;<?= $row['agama']; ?> <br>
                                &nbsp;&nbsp;&nbsp;<?= $row['pekerjaan']; ?> <br>
                                &nbsp;&nbsp;&nbsp;<?= $row['alamat']; ?></p>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <p style="text-align: justify;">
            Demikian surat keterangan ini dibuat atas dasar yang sebenarnya.
        </p>
        <div class="row">
            <div class="col-md-3 offset-md-8">
                <p style="text-align: center;">
                    Jatitujuh, <?= $row_sk['tanggal_acc_sk']; ?><br>Kepala Desa Jatitujuh<br><br><br><b>ABDUL KOHAR MUZAKIR</b>
                </p>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

</body>

</html>