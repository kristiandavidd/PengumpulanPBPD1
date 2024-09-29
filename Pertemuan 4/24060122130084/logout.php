<?php 
// Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
// Tanggal Pembuatan : 20 September 2024
// File              : logout.php
// Deskripsi         : untuk menghapus session

session_start();

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();    
}
header('Location: index.php');
?>