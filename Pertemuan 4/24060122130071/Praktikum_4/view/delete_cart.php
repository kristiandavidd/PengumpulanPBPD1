<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
    session_start();
    unset($_SESSION['cart']);
    header('Location: view_books.php');
    exit;
?>