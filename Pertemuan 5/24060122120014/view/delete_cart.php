<!-- 
    Nama File   : delete_cart.php
    Deskripsi   : menghapus cart
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 24 September 2024
-->

<?php
session_start();

if (isset($_SESSION['cart'])) {
  unset($_SESSION['cart']);
}

header('Location: show_cart.php');