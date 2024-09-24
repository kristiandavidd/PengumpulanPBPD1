<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pembuatan   : Minggu, 22 September 2024
    Nama File           : logout.php
-->

<?php
    session_start();

    if (isset($_SESSION['username'])){
        unset($_SESSION['username']);
        session_destroy();
    }
    
    header('Location: login.php');
?>