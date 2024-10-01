<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
-->

<?php

session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
  exit();
}
require_once('../lib/db_login.php');
$id = $_GET['id'];

$query = "DELETE FROM customers WHERE customerid = '$id'";

$result = $db->query($query);
if(!$result){
  die("Could not query the database: <br>".$db->error.'<br>Query:'.$query);
}else{
  echo "<script>
        alert('Data has been deleted successfully');
        document.location.href='view_customer.php';
        </script>";
  $db->close();
}

?>