<?php
// Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
// Tanggal Pembuatan : 20 September 2024
// File              : delete_customer.php
// Deskripsi         : untuk menghapus customer

require_once('lib/db_login.php');


$id = $_GET['id']; 

$query = "DELETE FROM customers WHERE customerid ='$id'";
mysqli_query($db, $query) or die(mysqli_error($db));


header("Location: view_customer.php");
exit();

?>
