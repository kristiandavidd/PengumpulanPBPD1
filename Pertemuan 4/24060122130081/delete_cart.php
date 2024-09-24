<!-- Nama : Aldisar Gibran -->
<!-- NIM : 24060122130081 -->
<!-- Tanggal : 25-09-2024 -->

<?php
    session_start();
    if (isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }

    header('Location: show_cart.php');
?>