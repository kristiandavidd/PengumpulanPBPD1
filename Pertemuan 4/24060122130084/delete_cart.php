<?php 
// Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
// Tanggal Pembuatan : 20 September 2024
// File              : delete_cart.php
// Deskripsi         : untuk menghapus session

session_start();

if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}


header('Location: show_cart.php');
?>