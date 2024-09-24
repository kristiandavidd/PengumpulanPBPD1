<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php 
session_start();
// Menghapus data dalam keranjang
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
// Berpindah ke halaman view_books.php
header('Location: view_books.php');
exit();
?>