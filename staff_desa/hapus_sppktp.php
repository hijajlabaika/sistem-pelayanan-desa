<?php

include '../koneksi.php';
if (isset($_GET['id'])) {

    $sql_hapus = "DELETE FROM surat_sppktp WHERE sppktp_id='" . $_GET['id'] . "'";
    $query_hapus = mysqli_query($connection, $sql_hapus);

    if ($query_hapus) {
?>
        <script>
            alert('Hapus berhasil');
            window.location.href = "surat_Selesai.php";
        </script>
<?php
    } else {
        echo "<script>alert('Hapus Gagal. Silahkan coba lagi!')</script>";
    }
}
