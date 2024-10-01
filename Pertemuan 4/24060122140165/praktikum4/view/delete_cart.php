<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<?php
// File         : delete_cart.php
// Deskripsi    : untuk menghapus session

// TODO 1: Inisialisasi data session
session_start();

// TODO 2: Hapus session
// Menghapus semua variabel session
session_unset();

// Menghancurkan session
session_destroy();

// TODO 3: Redirect ke halaman show_cart.php
header("Location: show_cart.php");
exit;
?>
