<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>