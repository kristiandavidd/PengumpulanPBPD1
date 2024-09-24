<!-- Nama : Muhammad Naufal Rifqi Setiawan -->
<!-- NIM : 24060122130045 -->
<!-- Tanggal : 24-09-2024 -->

<?php
    session_start();
    if (isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }

    header('Location: show_cart.php');
?>