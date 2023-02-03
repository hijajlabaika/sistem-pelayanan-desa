<?php

$error = '';

include "koneksi.php";
if (isset($_POST['submit'])) {
    $password   = $_POST['password'];
    $level      = $_POST['level'];

    $query = mysqli_query($connection, "SELECT * FROM data_pegawai WHERE password='$password'");
    if (mysqli_num_rows($query) == 0) {
        $error = "<script>alert('Password Anda Salah');history.go(-1);</script>";
    } else {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == "rt" && $level == "1") {
?>
            <script>
                alert('Login berhasil');
                window.location.href = "rt/halrt.php";
            </script>
        <?php
            // header("Location: rt/halrt.php");
        } else if ($row['level'] == "staff_desa" && $level == "2") {
        ?>
            <script>
                alert('Login berhasil');
                window.location.href = "staff_desa/halstaff_desa.php";
            </script>
        <?php
            // header("Location: staff_desa/halstaff_desa.php");
        } else if ($row['level'] == "kepala_desa" && $level == "3") {
        ?>
            <script>
                alert('Login berhasil');
                window.location.href = "kepala_desa/halkepala_desa.php";
            </script>
<?php
            // header("Location: kepala_desa/halkepala_desa.php");
        } else {
            $error = "Failed Login";
        }
    }
}
