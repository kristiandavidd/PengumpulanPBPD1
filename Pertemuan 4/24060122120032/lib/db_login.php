<?php
//Nama: Sarah Teguh Kinanti Situmeang
//NIM: 24060122120032
//Tanggal Pengerjaan: 22 September 2024
$db_host='localhost';
$db_database='bookdb';
$db_username='root';
$db_password='';

//connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno){
    die ("could not connect to the database: <br />". $db->connect_error);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>