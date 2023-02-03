<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];
$skck_id = $_GET["skck_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = $id");
$row = mysqli_fetch_array($result);

$result_skck = mysqli_query($connection, "SELECT * FROM surat_skck WHERE skck_id=$skck_id");
$row_skck = mysqli_fetch_array($result_skck);

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SKCK - <?= $row_skck['nama_skck'] ?> - <?= $row_skck['no_surat_skck'] ?></title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
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