<?php 
//Nama: Sarah Teguh Kinanti Situmeang
//NIM: 24060122120032
//Tanggal Pengerjaan: 24 September 2024
session_start();

if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

header('Location: show_cart.php');