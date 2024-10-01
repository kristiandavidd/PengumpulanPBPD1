<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 21/09/2024
    File : delete_cart.php
 -->
<?php
session_start();
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
header('Location: show_cart.php');
?>