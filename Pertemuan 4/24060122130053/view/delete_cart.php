<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
//File: destroy_cart.php
//Deskripsi: untuk menghapus session cart
session_start();
if (isset($_SESSION['cart'])){ unset($_SESSION['cart']);
}
header('Location: show_cart.php');
?>