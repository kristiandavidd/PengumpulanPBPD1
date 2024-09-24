<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 24 September 2024 -->
<!-- Nama File: delete_cart.php -->

<?php 
    session_start();

    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }

    header('Location: show_cart.php');
?>