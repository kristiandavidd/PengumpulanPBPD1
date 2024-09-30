<!-- Nama : Muhammad Naufal Rifqi Setiawan -->
<!-- NIM : 24060122130045 -->
<!-- Tanggal : 24-09-2024 -->

<?php
session_start();
if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
    session_destroy();
}

header('Location: login.php');
?>