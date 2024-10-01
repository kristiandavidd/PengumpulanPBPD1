<!-- 
Nama         : Qun Alfadrian Setyowahyu Putro
NIM          : 24060122130072
Tanggal      : 30/09/2024
File         : get_customer.php
Deskripsi    : Memberikan detail dari data pengguna yang dipilih
 -->

<?php
require_once('./lib/db_login.php');

$customerid = $_GET['id'];

$query = "SELECT * FROM customers WHERE customerid=".$customerid;
$result = $db->query($query);

if (!$result) {
    die ("Could not query the database <br>".$db->error);
}

while ($row = $result->fetch_object()) {
    echo 'Name: '.$row->name.'<br>';
    echo 'Address: '.$row->address.'<br>';
    echo 'City: '.$row->city.'<br>';
}

$result->free();
$db->close();
?>