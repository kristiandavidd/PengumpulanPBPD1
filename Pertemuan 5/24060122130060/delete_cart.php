<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 24 September 2024
-->

<?php
session_start();

if (isset($_SESSION['cart'])) {
  unset($_SESSION['cart']);
}

header('Location: show_cart.php');