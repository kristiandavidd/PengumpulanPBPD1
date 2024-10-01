<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 2 Oktober 2024
Lab : PBP D1
Tugas Pertemuan 5
-->

<?php
//File: logout.php
//Deskripsi untuk logout (menghapus session yang dibuat saat login)
session_start();
if (isset($_SESSION['username'])) {
    unset ($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>