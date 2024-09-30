<!-- 
Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
Tanggal Pembuatan : 20 September 2024
File              : db_login.php
Deskripsi         : untuk menghubungkan koneksi ke database
 -->

<?php
$db_host='localhost';
$db_database='bookorama';
$db_username='root';
$db_password='';

// Connect to database
$db = new mysqli($db_host,$db_username,$db_password,$db_database);
if ($db->connect_errno){
  die("Could not connect to the database: <br/>". $db->connect_error);
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>