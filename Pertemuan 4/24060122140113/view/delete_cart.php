<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: delete_cart.php
// Deskripsi: Menghapus pilihan dari cart
session_start();
if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}
header('Location: show_cart.php');
?>


