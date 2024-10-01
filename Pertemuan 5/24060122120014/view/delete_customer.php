<!-- 
    Nama File   : delete_customer.php
    Deskripsi   : menghapus customer
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 24 September 2024
-->

<?php
session_start();
require_once('../lib/db_login.php');

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}

$id = $_GET['id'];

$query = "DELETE FROM customers WHERE customerid = '" .$id. "'";
  $result = $db->query($query);
  if (!$result) {
    die("Could not query the database: <br />" .$db->error);
  } else {
    $db->close();
    header('Location: view_customer.php');
  }
?>