<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
$db_host='localhost'; 
$db_database='bookorama'; 
$db_username='root'; 
$db_password='';
// connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database, 3308); 
if ($db->connect_errno) {
die ("Could not connect to the database: <br />". $db->connect_error);
}
function test_input ($data) {
$data = trim($data);
$data = stripslashes ($data); $data = htmlspecialchars ($data); 
return $data;
}
