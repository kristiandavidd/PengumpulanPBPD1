<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 2 Oktober 2024
Lab : PBP D1
Tugas Pertemuan 5
-->

<?php
require_once('../lib/db_login.php');
$customerid = $_GET['id'];
$query = "SELECT * FROM customers WHERE customerid =".$customerid;
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

while($row = $result->fetch_object()) {
    echo 'Name: '.$row->name.'<br>';
    echo 'Email: '.$row->address.'<br>';
    echo 'City: '.$row->city.'<br>';
}

$result->free();
$db->close();
?>