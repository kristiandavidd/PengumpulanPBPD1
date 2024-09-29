<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 21/09/2024
    File : logout.php
 -->
<?php
session_start();

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}

header('Location: login.php');
?>