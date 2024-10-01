<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<?php
session_start();

// Hapus semua session
session_unset();
session_destroy();

// Redirect ke halaman login
header('Location: login.php');
exit();
?>
