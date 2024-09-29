<?php 
//Nama: Sarah Teguh Kinanti Situmeang
//NIM: 24060122120032
//Tanggal Pengerjaan: 24 September 2024
session_start();

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}

header('Location: login.php');
?>