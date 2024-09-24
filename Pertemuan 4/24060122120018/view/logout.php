<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<?php 
session_start();
if (!isset($_SESSION['username'])){
	unset($_SESSION['username']);
	session_destroy();
}
header('Location: login.php');
 ?>