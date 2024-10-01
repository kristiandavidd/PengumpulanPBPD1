<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: logout.php
// Deskripsi: Untuk logout (menghapus sesi yang dibuat saat login)

// Mulai sesi
session_start();
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== true) {
    // Redirect ke halaman login jika tidak memiliki akses
    header("Location: login.php");
    exit;
}
// Jika variabel sesi 'username' ada, hapus dan hancurkan sesi
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}

// Redirect ke halaman login
header('Location: login.php');
?>