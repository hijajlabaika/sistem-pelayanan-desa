<?php
session_start();

include "../koneksi.php";

if (isset($_SESSION['level']) === false) { // cek session apakah kosong(belum login) maka alihkan ke login.php
    header('Location: ../login_pegawai.php');
}

$id = $_GET["id"];
$sip_id = $_GET["sip_id"];

$result = mysqli_query($connection, "SELECT * FROM data_penduduk WHERE nik = $id");
$row = mysqli_fetch_array($result);

$result_sip = mysqli_query($connection, "SELECT * FROM surat_sip WHERE sip_id=$sip_id");
$row_sip = mysqli_fetch_array($result_sip);

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIP - <?= $row_sip['nama_sip'] ?> - <?= $row_sip['no_surat_sip'] ?></title>
    <link rel="icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
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
                    Jatitujuh, <?= $row_sip['tanggal_acc']; ?><br>Kepala Desa Jatitujuh<br><br><b>ABDUL KOHAR MUZAKIR</b>
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