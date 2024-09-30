<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pembuatan   : Minggu, 22 September 2024
    Nama File           : delete_cart.php
-->

<?php
    session_start();
    
    if (isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }

    header('Location: show_cart.php');
?>